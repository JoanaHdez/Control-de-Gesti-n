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
        $rules = [
            'folio_registro'   => 'required|min_length[3]|max_length[150]',
            'fecha_oficio'     => 'required|valid_date',
            'referencia'       => 'required|max_length[150]',
            'fecha_recepcion'  => 'required|valid_date',
            'folio_remitente'  => 'required|integer',
            'folio_tramite'    => 'required|integer',
            'solicitud'        => 'required|min_length[5]',
            'oficio_contestacion' => 'permit_empty|max_length[150]',
            'fecha_contestacion'  => 'permit_empty|valid_date',
            'asunto'             => 'permit_empty',
            'folio_archivado'     => 'permit_empty|integer',
            'folio_sec_resp'      => 'permit_empty|integer',
            'ponencia'           => 'permit_empty|max_length[150]',
            'reunion'            => 'permit_empty|max_length[150]',
            'folio_estado'       => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = Database::connect();
        $db->transStart();

        $folio_registro = $this->request->getPost('folio_registro');

        // Verificar si el registro ya existe
        $existe = $db->table('oficio')->where('folio_registro', $folio_registro)->countAllResults(false);

        // ---------- SOLICITUD ----------
        $folio_solicitud = $this->request->getPost('folio_solicitud'); // Para edición, mandamos el id oculto
        $solicitudData = [
            'folio_tramite' => $this->request->getPost('folio_tramite'),
            'solicitud'     => $this->request->getPost('solicitud'),
        ];

        if ($folio_solicitud) {
            $db->table('solicitud')->where('folio_solicitud', $folio_solicitud)->update($solicitudData);
        } else {
            $db->table('solicitud')->insert($solicitudData);
            $folio_solicitud = $db->insertID();
        }

        // ---------- REGISTRO OFICIO ----------
        $registroData = [
            'fecha_oficio'    => $this->request->getPost('fecha_oficio'),
            'referencia'      => $this->request->getPost('referencia'),
            'fecha_recepcion' => $this->request->getPost('fecha_recepcion'),
        ];

        if ($existe) {
            $db->table('registro_oficio')->where('folio_registro', $folio_registro)->update($registroData);
        } else {
            $db->table('registro_oficio')->insert(array_merge(['folio_registro' => $folio_registro], $registroData));
        }

        // ---------- DESCRIPCIÓN ATENCIÓN ----------
        $folio_atencion = $this->request->getPost('folio_atencion');
        $descripcionData = [
            'oficio_contestacion' => $this->request->getPost('oficio_contestacion') ?: null,
            'fecha_contestacion'  => $this->request->getPost('fecha_contestacion') ?: null,
            'asunto'              => $this->request->getPost('asunto') ?: null,
        ];

        if ($folio_atencion) {
            $db->table('descripcion_atencion')->where('folio_atencion', $folio_atencion)->update($descripcionData);
        } elseif ($descripcionData['oficio_contestacion'] || $descripcionData['fecha_contestacion'] || $descripcionData['asunto']) {
            $db->table('descripcion_atencion')->insert($descripcionData);
            $folio_atencion = $db->insertID();
        }

        // ---------- PONENCIA / REUNION ----------
        $folio_pr = $this->request->getPost('folio_pr');
        $ponenciaData = [
            'ponencia' => $this->request->getPost('ponencia') ?: null,
            'reunion'  => $this->request->getPost('reunion') ?: null,
        ];

        if ($folio_pr) {
            $db->table('ponencia_reunion')->where('folio_pr', $folio_pr)->update($ponenciaData);
        } elseif ($ponenciaData['ponencia'] || $ponenciaData['reunion']) {
            $db->table('ponencia_reunion')->insert($ponenciaData);
            $folio_pr = $db->insertID();
        }

        // ---------- OFICIO ----------
        $oficioData = [
            'folio_remitente' => $this->request->getPost('folio_remitente'),
            'folio_solicitud' => $folio_solicitud,
            'folio_atencion'  => $folio_atencion,
            'folio_pr'        => $folio_pr,
            'folio_sec_resp'  => $this->request->getPost('folio_sec_resp') ?: null,
            'folio_estado'    => $this->request->getPost('folio_estado'),
            /*             'folio_archivado' => $this->request->getPost('folio_archivado') ?: null,
 */
        ];

        if ($existe) {
            $db->table('oficio')->where('folio_registro', $folio_registro)->update($oficioData);
        } else {
            $db->table('oficio')->insert(array_merge(['folio_registro' => $folio_registro], $oficioData));
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Error al guardar el oficio');
        }

        $msg = $existe ? 'Oficio actualizado correctamente' : 'Oficio guardado correctamente';
        return redirect()->to('/oficios/crear')->with('success', $msg);
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
}
