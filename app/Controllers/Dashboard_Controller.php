<?php

namespace App\Controllers;

use App\Models\Dashboard_Model;

class Dashboard_Controller extends BaseController
{
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new Dashboard_Model();
    }

    public function index()
    {
        $data = [
            'total_atendidos'            => $this->dashboardModel->totalAtendidos(),
            'atendidos_por_persona'      => $this->dashboardModel->atendidosPorPersona(),

            'total_tramite'              => $this->dashboardModel->totalTramite(),
            'tramite_por_persona'        => $this->dashboardModel->tramitePorPersona(),

            'total_pendientes'           => $this->dashboardModel->totalPendientes(),
            'pendientes_por_persona'     => $this->dashboardModel->pendientesPorPersona(),

            'oficios_por_mes'             => $this->dashboardModel->oficiosPorMes(),
            'oficios_por_mes_persona'     => $this->dashboardModel->oficiosPorMesPorPersona(),

            'total_internos'             => $this->dashboardModel->totalInternos(),
            'internos_por_area'          => $this->dashboardModel->internosPorArea(),

            'total_externos'             => $this->dashboardModel->totalExternos(),
            'externos_por_area'          => $this->dashboardModel->externosPorArea(),

            'total_seccion_2'            => $this->dashboardModel->totalSeccion2(),

            'total_por_solicitud'        => $this->dashboardModel->totalPorSolicitud()
        ];

        return view('dashboard', $data);
    }
}
