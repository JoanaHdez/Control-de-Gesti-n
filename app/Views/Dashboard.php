
<?php
$estructura = [];

foreach ($oficios_persona_anio_mes as $row) {
    $persona = $row['nombre_responsable'];
    $anio = $row['anio'];
    $mes = $row['mes_nombre'];
    $total = $row['total'];

    if (!isset($estructura[$persona])) {
        $estructura[$persona] = [
            'total' => 0,
            'anios' => []
        ];
    }

    if (!isset($estructura[$persona]['anios'][$anio])) {
        $estructura[$persona]['anios'][$anio] = [];
    }

    $estructura[$persona]['anios'][$anio][$mes] = $total;
    $estructura[$persona]['total'] += $total;
}
?>

<div class="container-fluid">
    <div class="container-fluid py-4 dashboard-bg">

        <h2 class="mb-4 fw-bold">📊 Dashboard de Oficios</h2>

        <!-- FILA 1 - KPIs -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="kpi-card kpi-green">
                    <div class="kpi-title">Archivados</div>
                    <div class="kpi-value"><?= $total_atendidos ?></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="kpi-card kpi-yellow">
                    <div class="kpi-title">En trámite</div>
                    <div class="kpi-value"><?= $total_tramite ?></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="kpi-card kpi-red">
                    <div class="kpi-title">Pendientes</div>
                    <div class="kpi-value"><?= $total_pendientes ?></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="kpi-card kpi-blue">
                    <div class="kpi-title">Sección II</div>
                    <div class="kpi-value"><?= $total_seccion_2 ?></div>
                </div>
            </div>
        </div>

        <!-- FILA 2 - POR PERSONA -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="panel-card">
                    <div class="panel-title">Atendidos por persona</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($atendidos_por_persona as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['nombre_responsable']) ?>
                            <span class="badge bg-success"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel-card">
                    <div class="panel-title">Trámite por persona</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($tramite_por_persona as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['nombre_responsable']) ?>
                            <span class="badge bg-warning text-dark"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel-card">
                    <div class="panel-title">Pendientes por persona</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($pendientes_por_persona as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['nombre_responsable']) ?>
                            <span class="badge bg-danger"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>

        <!-- FILA 3 - INTERNOS / EXTERNOS -->

        <div class="row g-3 mb-4">

            <div class="col-md-6">
                <div class="panel-card">
                    <div class="panel-title">Internos por sección</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($internos_por_area as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['nombre_seccion']) ?>
                            <span class="badge bg-info"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="card-footer text-end">
                        Total Internos: <strong><?= $total_internos ?></strong>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-card">
                    <div class="panel-title">Externos por sección</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($externos_por_area as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['nombre_seccion']) ?>
                            <span class="badge bg-secondary"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="card-footer text-end">
                        Total Externos: <strong><?= $total_externos ?></strong>
                    </div>
                </div>
            </div>

        </div>

        <!-- =========================
                                    OFICIOS POR MES
                                ========================= -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="panel-card">
                    <div class="panel-title">Oficios por mes</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($oficios_por_mes as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['mes']) ?>
                            <span class="badge bg-dark"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
    <div class="panel-card">
        <div class="panel-title">📂 Oficios por persona / año / mes</div>

        <ul class="list-group list-group-flush">

            <?php foreach ($estructura as $persona => $dataPersona): ?>
                <li class="list-group-item">
                    <button class="btn btn-link fw-bold toggle-persona">
                        <?= esc($persona) ?> 
                        <span class="badge bg-primary ms-2"><?= $dataPersona['total'] ?></span>
                    </button>

                    <div class="ms-3 d-none persona-content">

                        <?php foreach ($dataPersona['anios'] as $anio => $meses): ?>
                            <div class="mb-2">
                                <button class="btn btn-sm btn-outline-secondary toggle-anio">
                                    <?= $anio ?>
                                </button>

                                <ul class="list-group list-group-flush ms-3 mt-2 d-none anio-content">
                                    <?php foreach ($meses as $mes => $totalMes): ?>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <?= esc($mes) ?>
                                            <span class="badge bg-success"><?= $totalMes ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>


        </div>

        <!-- =========================
                                    POR SOLICITUD (CATEGORÍAS)
                                ========================= -->

        <div class="row g-3 mb-4">

            <div class="col-md-6">
                <div class="panel-card">
                    <div class="panel-title">Solicitudes por categoría</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($total_por_solicitud as $row): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= esc($row['categoria']) ?>
                            <span class="badge bg-success"><?= $row['total'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>