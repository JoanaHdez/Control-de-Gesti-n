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

class Registros_Controller extends BaseController
{

    public function crear()
    {
        $cargoModel = new Cargo_Model();
        $areaModel    = new Area_Model();
        $estadoModel  = new Estado_Model();
        $tramiteModel = new Tramite_Model();
        $archivadoModel = new Archivado_Model();
        $personalModel = new Personal_Model();
        $seccionModel = new Seccion_Model();

        $data = [
            'cargos'   => $cargoModel->findAll(),
            'areas'    => $areaModel->findAll(),
            'estados'  => $estadoModel->findAll(),
            'tramites' => $tramiteModel->findAll(),
            'archivado' => $archivadoModel->findAll(),
            'personal' => $personalModel->findAll(),
            'seccion' => $seccionModel->findAll(),
        ];

        $css = [
            'style'=>'assets/css/Registros.css'
        ];
        return view('head', $css)
          . view('Registros', $data);
   }
}