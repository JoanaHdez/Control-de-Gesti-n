<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cargo_Model;
use App\Models\Area_Model;
use App\Models\Estado_Model;
use App\Models\Tramite_Model;
use App\Models\Archivado_Model;
use App\Models\Personal_Model;
use App\Models\Seccion_Model;
use App\Models\Remitente_Model;
use App\Models\Seccion_Responsable_Model;
use App\Models\Oficio_Model;


class Registros_Controller extends BaseController
{

    public function index()
    {
        return redirect()->to('/oficios/crear');
    }

    public function crear()
    {
        $cargoModel = new Cargo_Model();
        $areaModel    = new Area_Model();
        $estadoModel  = new Estado_Model();
        $tramiteModel = new Tramite_Model();
        $archivadoModel = new Archivado_Model();
        $personalModel = new Personal_Model();
        $seccionModel = new Seccion_Model();
        $remitenteModel = new Remitente_Model();
        $seccionresponsableModel = new Seccion_Responsable_Model();
        $oficioModel = new Oficio_Model();

        $remitentes = $remitenteModel
            ->select('remitente.folio_remitente, titular.nombre_titular, cargo.nombre_cargo, tipo_area.nombre_area')
            ->join('titular', 'titular.folio_titular = remitente.folio_titular')
            ->join('cargo', 'cargo.folio_cargo = titular.folio_cargo')
            ->join('tipo_area', 'tipo_area.folio_area = titular.folio_area')
            ->findAll();

        $seccion_responsable = $seccionresponsableModel->getSeccionesResponsables();

        $data = [
            'cargos'   => $cargoModel->findAll(),
            'areas'    => $areaModel->findAll(),
            'estados'  => $estadoModel->findAll(),
            'tramites' => $tramiteModel->findAll(),
            'archivado' => $archivadoModel->findAll(),
            'personal' => $personalModel->findAll(),
            'seccion' => $seccionModel->findAll(),
            'remitentes' => $remitentes,
            'seccion_responsable' => $seccionresponsableModel->getSeccionesResponsables(),

            'general' => $oficioModel->getGeneral(),
            'pendientes' => $oficioModel->getPendientes(),
        ];

        $css = [
            'style' => 'assets/css/Registros.css'
        ];
        return view('head', $css)
            . view('Registros', $data);
    }
}
