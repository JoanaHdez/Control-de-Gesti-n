<body>
    <main class="container-fluid">
        <section>
            <div>
                <!-- ----------------------------------------------------------------------- MENU ----------------------------------------------------------------------- -->

                <div class="container-fluid">
                    <div class="dashboard-bg container-fluid py-4">

                        <div class="container-fluid py-4">

                            <h1 class="mb-4">📊 Dashboard de Oficios</h1>

                            <!-- =========================
                                    CARDS PRINCIPALES
                                ========================= -->
                            <div class="row mb-4">

                                <div class="col-md-3">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body text-center">
                                            <h5>Atendidos</h5>
                                            <h2><?= $total_atendidos ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card text-dark bg-warning shadow">
                                        <div class="card-body text-center">
                                            <h5>En trámite</h5>
                                            <h2><?= $total_tramite ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card text-white bg-danger shadow">
                                        <div class="card-body text-center">
                                            <h5>Pendientes</h5>
                                            <h2><?= $total_pendientes ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body text-center">
                                            <h5>Sección II</h5>
                                            <h2><?= $total_seccion_2 ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- =========================
                                    ATENDIDOS / TRÁMITE / PENDIENTES POR PERSONA
                                ========================= -->
                            <div class="row mb-4">

                                <div class="col-md-4">
                                    <div class="card shadow">
                                        <div class="card-header bg-success text-white">Atendidos por persona</div>
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
                                    <div class="card shadow">
                                        <div class="card-header bg-warning">En trámite por persona</div>
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
                                    <div class="card shadow">
                                        <div class="card-header bg-danger text-white">Pendientes por persona</div>
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

                            <!-- =========================
                                    INTERNOS / EXTERNOS
                                ========================= -->
                            <div class="row mb-4">

                                <div class="col-md-6">
                                    <div class="card shadow">
                                        <div class="card-header bg-info text-white">Internos por sección</div>
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
                                    <div class="card shadow">
                                        <div class="card-header bg-secondary text-white">Externos por sección</div>
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
                            <div class="row mb-4">

                                <div class="col-md-6">
                                    <div class="card shadow">
                                        <div class="card-header bg-dark text-white">Oficios por mes</div>
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
                                    <div class="card shadow">
                                        <div class="card-header bg-primary text-white">Oficios por mes y persona
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($oficios_por_mes_persona as $row): ?>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <?= esc($row['mes']) ?> - <?= esc($row['nombre_responsable']) ?>
                                                <span class="badge bg-primary"><?= $row['total'] ?></span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <!-- =========================
                                    POR SOLICITUD (CATEGORÍAS)
                                ========================= -->
                            <div class="row mb-4">

                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-header bg-success text-white">Solicitudes por categoría
                                        </div>
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
                </div>
            </div>
        </section>
    </main>

    <script>
    const BASE_URL_DETALLES = "<?= base_url('oficios/detalles/') ?>";
    const BASE_URL_EDITAR = "<?= base_url('oficios/editar/') ?>";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="<?= base_url('/assets/js/Registro.js') ?>"></script>
</body>

</html>