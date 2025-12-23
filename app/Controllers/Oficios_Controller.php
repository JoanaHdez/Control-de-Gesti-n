<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

use App\Models\Oficio_Model;
use App\Models\DescripcionAtencion_Model;
use App\Models\PonenciaReunion_Model;

class Oficios_Controller extends BaseController
{

    public function listar()
    {
        $oficioModel = new Oficio_Model();
        $data['oficios'] = $oficioModel->getOficiosConDatos();

        echo '<pre>';
        print_r($data['oficios']);
        echo '</pre>';
        die();
    }

    public function guardar()
    {
        // ================= VALIDACIONES =================

        $rules = [
            'folio_registro'   => 'required|min_length[3]|max_length[150]',
            'fecha_oficio'     => 'required|valid_date',
            'referencia'       => 'required|max_length[150]',
            'fecha_recepcion'  => 'required|valid_date',

            'nombre_titular'   => 'required|min_length[3]',
            'folio_cargo'      => 'required|integer',
            'folio_area'       => 'required|integer',

            'folio_tramite'    => 'required|integer',
            'solicitud'        => 'required|min_length[5]',

            'oficio_contestacion' => 'permit_empty|max_length[150]',
            'fecha_contestacion' => 'permit_empty|valid_date',
            'asunto'             => 'permit_empty',

            'folio_archivado' => 'permit_empty|integer',
            'folio_personal'  => 'permit_empty|integer',
            'folio_seccion'   => 'permit_empty|integer',

            'ponencia'        => 'permit_empty|max_length[150]',
            'reunion'         => 'permit_empty|max_length[150]',

            'folio_estado'    => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // ================= BD =================

        $db = Database::connect();
        $db->transStart();

        // ---------- TITULAR ----------

        $db->table('titular')->insert([
            'nombre_titular' => $this->request->getPost('nombre_titular'),
            'folio_cargo'    => $this->request->getPost('folio_cargo'),
            'folio_area'     => $this->request->getPost('folio_area'),
        ]);
        $folio_remitente = $db->insertID();

        // ---------- SOLICITUD ----------

        $db->table('solicitud')->insert([
            'folio_tramite' => $this->request->getPost('folio_tramite'),
            'solicitud'     => $this->request->getPost('solicitud'),
        ]);
        $folio_solicitud = $db->insertID();

        // ---------- REGISTRO OFICIO ----------

        $db->table('registro_oficio')->insert([
            'folio_registro'  => $this->request->getPost('folio_registro'),
            'fecha_oficio'    => $this->request->getPost('fecha_oficio'),
            'referencia'      => $this->request->getPost('referencia'),
            'fecha_recepcion' => $this->request->getPost('fecha_recepcion'),
        ]);


        // ---------- DESCRIPCIÓN ATENCIÓN ----------

        $folio_atencion = null;

        if (
            $this->request->getPost('oficio_contestacion') ||
            $this->request->getPost('fecha_contestacion') ||
            $this->request->getPost('asunto')
        ) {
            $db->table('descripcion_atencion')->insert([
                'oficio_contestacion' => $this->request->getPost('oficio_contestacion') ?: null,
                'fecha_contestacion' => $this->request->getPost('fecha_contestacion') ?: null,
                'asunto'             => $this->request->getPost('asunto') ?: null,
            ]);
            $folio_atencion = $db->insertID();
        }

        // ---------- PONENCIA / REUNION ----------

        $folio_pr = null;

        if ($this->request->getPost('ponencia') || $this->request->getPost('reunion')) {
            $db->table('ponencia_reunion')->insert([
                'ponencia' => $this->request->getPost('ponencia') ?: null,
                'reunion'  => $this->request->getPost('reunion') ?: null,
            ]);

            $folio_pr = $db->insertID();
        }

        // ---------- OFICIO (RELACIÓN) ----------

        // ========= DATOS POST =========

        $folioRegistro   = $this->request->getPost('folio_registro');
        $folioEstado     = $this->request->getPost('folio_estado');
        $folioArchivado  = $this->request->getPost('folio_archivado') ?: null;
        $folioPersonal   = $this->request->getPost('folio_personal') ?: null;
        $folioSeccion    = $this->request->getPost('folio_seccion') ?: null;

        // ========= INSERT OFICIO =========

        $db->table('oficio')->insert([
            'folio_registro'  => $folioRegistro,
            'folio_remitente' => $folio_remitente,
            'folio_solicitud' => $folio_solicitud,
            'folio_atencion'  => $folio_atencion,
            'folio_estado'    => $folioEstado,
            'folio_archivado' => $folioArchivado,
            'folio_personal'  => $folioPersonal,
            'folio_seccion'   => $folioSeccion,
            'folio_pr'        => $folio_pr,
        ]);

        $db->transComplete();


        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Error al guardar el oficio');
        }

        return redirect()->to('/oficios')->with('success', 'Oficio guardado correctamente');
    }
}
