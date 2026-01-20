<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

use App\Models\Oficio_Model;

use App\Models\Remitente_Model;
use App\Models\Tramite_Model;
use App\Models\Archivado_Model;
use App\Models\Estado_Model;
use App\Models\Seccion_Responsable_Model;

class Oficios_Controller extends BaseController
{

    public function guardar()
    {

        /* echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";
        exit; */

        $folio_original = $this->request->getPost('folio_original');
        $esEdicion = !empty($folio_original);

        $rules = [
            'folio_registro' => 'required|integer',
            'fecha_oficio'     => 'required|valid_date',
            'referencia'       => 'required|max_length[150]',
            'fecha_recepcion'  => 'required|valid_date',
            'folio_remitente'  => 'required|integer',
            'folio_tramite'    => 'required|integer',
            'solicitud'        => 'required|min_length[5]',
            'oficio_contestacion' => 'permit_empty|max_length[150]',
            'fecha_contestacion'  => 'permit_empty|valid_date',
            'asunto'             => 'permit_empty',
            'folio_sec_resp'      => 'required|integer',
            'folio_estado'        => 'required|integer',
        ];

        if ($esEdicion) {
            $rules['folio_original'] = 'required';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = Database::connect();
        $db->transStart();

        $folio_nuevo = $this->request->getPost('folio_registro');

        $estado = (int) $this->request->getPost('folio_estado');
        $ID_ARCHIVADO = 1;

        $archivoPdf = $this->request->getFile('archivo_pdf');

        $archivoRutaFinal = null;

        if ($estado === $ID_ARCHIVADO) {

            // En edición: solo exigir archivo si antes NO estaba archivado
            if (!$archivoPdf || $archivoPdf->getError() !== UPLOAD_ERR_OK) {
                if (!$esEdicion) {
                    $db->transRollback();
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Debe subir el archivo PDF para estado ARCHIVADO');
                }
            }

            if ($archivoPdf && $archivoPdf->isValid()) {

                $extension = strtolower($archivoPdf->getExtension());
                if ($extension !== 'pdf') {
                    $db->transRollback();
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Solo se permiten archivos PDF');
                }

                $rutaBase = rtrim(env('OFICIOS_UPLOAD_PATH'), DIRECTORY_SEPARATOR);

                if (!is_dir($rutaBase)) {
                    mkdir($rutaBase, 0777, true);
                }

                $nombreFinal = 'oficio_' . $folio_nuevo . '.pdf';

                $archivoPdf->move($rutaBase, $nombreFinal, true);

                $archivoRutaFinal = rtrim(env('OFICIOS_UPLOAD_URL'), '/') . '/' . $nombreFinal;
            }
        }

        // ================= SOLO EN EDICIÓN =================
        if ($esEdicion) {
            $db->query('SET FOREIGN_KEY_CHECKS = 0');
        }

        $folio_nuevo = $this->request->getPost('folio_registro');

        // ================= VALIDAR FOLIO DUPLICADO =================
        if ($esEdicion && $folio_original !== $folio_nuevo) {
            $existe = $db->table('registro_oficio')
                ->where('folio_registro', $folio_nuevo)
                ->countAllResults();

            if ($existe > 0) {
                $db->transRollback();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'El folio ya existe');
            }
        }

        if (!$esEdicion) {
            $existe = $db->table('registro_oficio')
                ->where('folio_registro', $folio_nuevo)
                ->countAllResults();

            if ($existe > 0) {
                $db->transRollback();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'El folio ya existe');
            }
        }

        // ================= SOLICITUD =================
        $folio_solicitud = $this->request->getPost('folio_solicitud');

        $solicitudData = [
            'folio_tramite' => $this->request->getPost('folio_tramite'),
            'solicitud'     => $this->request->getPost('solicitud'),
        ];

        if ($folio_solicitud) {
            $db->table('solicitud')
                ->where('folio_solicitud', $folio_solicitud)
                ->update($solicitudData);
        } else {
            $db->table('solicitud')->insert($solicitudData);
            $folio_solicitud = $db->insertID();
        }

        // ================= DESCRIPCIÓN ATENCIÓN =================
        $folio_atencion = $this->request->getPost('folio_atencion');

        $descripcionData = [
            'oficio_contestacion' => $this->request->getPost('oficio_contestacion') ?: null,
            'fecha_contestacion'  => $this->request->getPost('fecha_contestacion') ?: null,
            'asunto'              => $this->request->getPost('asunto') ?: null,
        ];

        if ($folio_atencion) {
            $db->table('descripcion_atencion')
                ->where('folio_atencion', $folio_atencion)
                ->update($descripcionData);
        } elseif (array_filter($descripcionData)) {
            $db->table('descripcion_atencion')->insert($descripcionData);
            $folio_atencion = $db->insertID();
        }

        // ================= CREAR =================
        if (!$esEdicion) {

            $db->table('registro_oficio')->insert([
                'folio_registro' => $folio_nuevo,
                'fecha_oficio'   => $this->request->getPost('fecha_oficio'),
                'referencia'     => $this->request->getPost('referencia'),
                'fecha_recepcion' => $this->request->getPost('fecha_recepcion'),
            ]);

            $db->table('oficio')->insert([
                'folio_registro' => $folio_nuevo,
                'folio_remitente' => $this->request->getPost('folio_remitente'),
                'folio_solicitud' => $folio_solicitud,
                'folio_atencion' => $folio_atencion,
                'folio_sec_resp' => $this->request->getPost('folio_sec_resp') ?: null,
                'folio_estado'   => $this->request->getPost('folio_estado'),
                'folio_archivado' => $this->request->getPost('folio_archivado') ?: null,
                'archivo_pdf'    => $archivoRutaFinal,
            ]);
        }

        // ================= EDITAR =================
        if ($esEdicion) {

            // HIJA
            $updateData = [
                'folio_registro'   => $folio_nuevo,
                'folio_remitente'  => $this->request->getPost('folio_remitente'),
                'folio_solicitud'  => $folio_solicitud,
                'folio_atencion'   => $folio_atencion,
                'folio_sec_resp'   => $this->request->getPost('folio_sec_resp') ?: null,
                'folio_estado'     => $this->request->getPost('folio_estado'),
                'folio_archivado'  => $this->request->getPost('folio_archivado') ?: null,
            ];

            if ($archivoRutaFinal !== null) {
                $updateData['archivo_pdf'] = $archivoRutaFinal;
            }

            $db->table('oficio')
                ->where('folio_registro', $folio_original)
                ->update($updateData);


            // PADRE
            $db->table('registro_oficio')
                ->where('folio_registro', $folio_original)
                ->update([
                    'folio_registro' => $folio_nuevo,
                    'fecha_oficio'   => $this->request->getPost('fecha_oficio'),
                    'referencia'     => $this->request->getPost('referencia'),
                    'fecha_recepcion' => $this->request->getPost('fecha_recepcion'),
                ]);

            $db->query('SET FOREIGN_KEY_CHECKS = 1');
        }
        $db->transComplete();

        return redirect()->to('/oficios/crear')->with('success', 'Oficio guardado correctamente');
    }

    public function detalles($folio)
    {
        $folio = trim(urldecode($folio));

        $model = new \App\Models\Oficio_Model();
        $data = $model->obtenerDetallesPorFolio($folio);

        if (!$data) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Registro no encontrado']);
        }

        return $this->response->setJSON($data);
    }

    public function editar($folio)
    {
        $folio = trim(urldecode($folio));

        $model = new \App\Models\Oficio_Model();
        $data = $model->obtenerDetallesParaEditar($folio); // Nuevo método específico para edición

        if (!$data) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Registro no encontrado']);
        }

        return $this->response->setJSON($data);
    }






    public function guardarTitularAjax()
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $nombreTitular = trim($this->request->getPost('titular'));
        $nombreCargo   = trim($this->request->getPost('cargo'));
        $folioArea     = (int) $this->request->getPost('area');

        if (!$nombreTitular || !$nombreCargo || !$folioArea) {
            return $this->response->setStatusCode(400)
                ->setJSON(['error' => 'Datos incompletos']);
        }

        // 1️⃣ Crear cargo
        $db->table('cargo')->insert([
            'nombre_cargo' => $nombreCargo
        ]);
        $folioCargo = $db->insertID();

        // 2️⃣ Crear titular
        $db->table('titular')->insert([
            'nombre_titular' => $nombreTitular,
            'folio_cargo'    => $folioCargo,
            'folio_area'     => $folioArea
        ]);
        $folioTitular = $db->insertID();

        // 3️⃣ Crear remitente
        $db->table('remitente')->insert([
            'folio_titular' => $folioTitular
        ]);
        $folioRemitente = $db->insertID();

        $area = $db->table('tipo_area')
            ->where('folio_area', $folioArea)
            ->get()->getRowArray();

        $db->transComplete();

        return $this->response->setJSON([
            'folio_remitente' => $folioRemitente,
            'titular' => $nombreTitular,
            'cargo' => $nombreCargo,
            'area' => $area['nombre_area']
        ]);
    }
}
