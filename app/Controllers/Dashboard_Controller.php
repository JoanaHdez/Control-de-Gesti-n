<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dashboard_Model;

class Dashboard_Controller extends BaseController
{
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new Dashboard_Model();
    }

    /**
     * Este método SOLO devuelve el contenido del dashboard
     * para ser cargado dentro de un modal vía AJAX
     */
    public function modal()
{
    $data = [];

    try {
        $data['total_atendidos'] = $this->dashboardModel->totalAtendidos() ?? 0;
        $data['atendidos_por_persona'] = $this->dashboardModel->atendidosPorPersona() ?? [];
        $data['total_tramite'] = $this->dashboardModel->totalTramite() ?? 0;
        $data['tramite_por_persona'] = $this->dashboardModel->tramitePorPersona() ?? [];
        $data['total_pendientes'] = $this->dashboardModel->totalPendientes() ?? 0;
        $data['pendientes_por_persona'] = $this->dashboardModel->pendientesPorPersona() ?? [];
        $data['oficios_por_mes'] = $this->dashboardModel->oficiosPorMes() ?? [];
        $data['oficios_por_mes_persona'] = $this->dashboardModel->oficiosPorMesPorPersona() ?? [];
        $data['total_internos'] = $this->dashboardModel->totalInternos() ?? 0;
        $data['internos_por_area'] = $this->dashboardModel->internosPorArea() ?? [];
        $data['total_externos'] = $this->dashboardModel->totalExternos() ?? 0;
        $data['externos_por_area'] = $this->dashboardModel->externosPorArea() ?? [];
        $data['total_seccion_2'] = $this->dashboardModel->totalSeccion2() ?? 0;
        $data['total_por_solicitud'] = $this->dashboardModel->totalPorSolicitud() ?? [];

    } catch (\Throwable $e) {
        return "Error en Dashboard_Model o SQL: " . $e->getMessage();
    }

    // Depuración de vista
    if (!is_file(APPPATH . 'Views/Dashboard.php')) {
        return "La vista Dashboard no existe";
    }

    return view('Dashboard', $data);
}


}
