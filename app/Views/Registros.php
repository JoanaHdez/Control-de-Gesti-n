<body>
    <main class="container-fluid">
        <section>
            <div>
                <!-- ----------------------------------------------------------------------- MENU ----------------------------------------------------------------------- -->

                <div class="container-fluid">
                    <div class="fondo-1">
                        <h1 class="fw-bold mb-1 text-white">Coordinación de Estudio, Planeación y Control</h1>
                        <div class="border-start border-4 border-primary ps-3">
                            <h5 class="text-muted mb-0">
                                Comisaría General de Seguridad Ciudadana
                            </h5>
                        </div>
                    </div>
                    <div class="container-fluid pt-5">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#registro">
                                    Registro
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#general">
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#pendientes">
                                    Pendientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#dashboard">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content mt-3">
                    <!-- ----------------------------------------------------------------------- SECCION 1 REGISTRO ----------------------------------------------------------------------- -->

                    <div class="tab-pane fade show active" id="registro">
                        <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('oficios/guardar') ?>"> <?= csrf_field() ?>

                            <div class="Registro">
                                <!-- ------------------------- DATOS DEL OFICIO ------------------------- -->

                                <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Datos del
                                    Oficio
                                </h5>
                                <div class="d-flex justify-content-center pt-3">
                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                </div>

                                <div class="Formulario container-fluid pt-5">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label>Folio de Oficio</label>
                                            <input type="text" name="folio_registro"
                                                class="form-control pill-input <?= session()->getFlashdata('error') ? 'is-invalid' : '' ?>"
                                                required>
                                            <?php if (session()->getFlashdata('error')): ?>
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Fecha del Oficio</label>
                                            <input type="date" name="fecha_oficio" class="form-control pill-input"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Referencia</label>
                                            <input type="text" name="referencia" class="form-control pill-input"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Fecha de Recepción</label>
                                            <input type="date" name="fecha_recepcion" class="form-control pill-input"
                                                required>
                                        </div>
                                    </div>

                                    <!-- ------------------------- SOLICITANTE/REMITENTE ------------------------- -->

                                    <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                        Solicitante /
                                        Remitente
                                    </h5>

                                    <div class="d-flex justify-content-center pt-3">
                                        <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                    </div>

                                    <div class="row g-3 mt-3">
                                        <div class="col-md-3">
                                            <label>Titular</label>
                                            <select name="folio_remitente" id="folio_remitente"
                                                class="form-select pill-select" required>
                                                <option value="">Seleccione</option>

                                                <?php foreach ($remitentes as $remitente): ?>
                                                <option value="<?= $remitente['folio_remitente'] ?>"
                                                    data-cargo="<?= esc($remitente['nombre_cargo']) ?>"
                                                    data-area="<?= esc($remitente['nombre_area']) ?>">
                                                    <?= esc($remitente['nombre_titular']) ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Cargo</label>
                                            <input type="text" id="folio_cargo" class="form-control pill-input"
                                                readonly>

                                        </div>
                                        <div class="col-md-3">
                                            <label>Área</label>
                                            <input type="text" id="folio_area" class="form-control pill-input" readonly>

                                        </div>

                                    </div>


                                    <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                    <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Solicitud
                                        /
                                        Información
                                    </h5>

                                    <div class="d-flex justify-content-center pt-3">
                                        <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                    </div>

                                    <div class="row g-3 mt-3">
                                        <div class="col-md-3">
                                            <label>Tipo de Tramite</label>
                                            <select name="folio_tramite" class="form-select pill-select" required>
                                                <option value=""> Seleccione</option>

                                                <?php foreach ($tramites as $tramite): ?>
                                                <option value="<?= $tramite['folio_tramite'] ?>">
                                                    <?= esc($tramite['tramite']) ?>
                                                </option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="col-md-9 mt-3">
                                            <label for="">Solicitud</label>
                                            <textarea name="solicitud" class="form-control pill-textarea" rows="4"
                                                required></textarea>
                                        </div>
                                    </div>

                                    <!-- ------------------------- DESCRIPCIÓN DE LA ATENCIÓN ------------------------- -->

                                    <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                        Descripción
                                        de la
                                        Atención</h5>

                                    <div class="d-flex justify-content-center pt-3">
                                        <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                    </div>

                                    <div class="row g-3 mt-3">
                                        <div class="col-md-3">
                                            <div class="row g-3">
                                                <label>Folio de contestación de Oficio</label>
                                                <div class="col-12">
                                                    <input type="text" name="oficio_contestacion"
                                                        class="form-control pill-input">
                                                </div>
                                                <label for="">Fecha de Contestación</label>
                                                <div class="col-12">
                                                    <input type="date" name="fecha_contestacion"
                                                        class="form-control pill-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label>Asunto</label>
                                            <textarea name="asunto" class="form-control pill-textarea h-100"
                                                rows="4"></textarea>
                                        </div>
                                    </div>

                                    <!-- ------------------------- ESTADO DEL ARCHIVO/SECCION QUE ATENDIO ------------------------- -->

                                    <div class="row g-3 mt-5">
                                        <div class="col-md-6">
                                            <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                Estado del
                                                Archivo</h5>

                                            <div class="d-flex justify-content-center pt-3">
                                                <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                Seccion que
                                                Atendio</h5>

                                            <div class="d-flex justify-content-center pt-3">
                                                <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ------------------------- ESTADO DEL ARCHIVO ------------------------- -->

                                    <div class="row g-3 mt-4">
                                        <div class="col-md-3">
                                            <label>Archivado en</label>
                                            <select name="folio_archivado" class="form-select pill-select">
                                                <option value="">Selección</option>

                                                <?php foreach ($archivado as $archivado): ?>
                                                <option value="<?= $archivado['folio_archivado'] ?>">
                                                    <?= esc($archivado['archivado']) ?>
                                                </option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Estatus</label>
                                            <select name="folio_estado" class="form-select pill-select" required>
                                                <option value="">Selección</option>

                                                <?php foreach ($estados as $estado): ?>
                                                <option value="<?= $estado['folio_estado'] ?>">
                                                    <?= esc($estado['estado']) ?>
                                                </option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>

                                        <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                        <div class="col-md-3">
                                            <label>Atendido por</label>
                                            <select name="folio_sec_resp" id="folio_sec_resp"
                                                class="form-select pill-select">
                                                <option value="">Selección</option>

                                                <?php foreach ($seccion_responsable as $sr): ?>
                                                <option value="<?= $sr['folio_sec_resp'] ?>"
                                                    data-seccion="<?= esc($sr['nombre_seccion']) ?>">
                                                    <?= esc($sr['nombre_responsable']) ?>

                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sección Responsable</label>
                                            <input type="text" id="folio_seccion" class="form-control pill-input"
                                                readonly>
                                        </div>
                                    </div>

                                    <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                    <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Ponencia
                                        /
                                        Reunión
                                    </h5>

                                    <div class="d-flex justify-content-center pt-3">
                                        <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                    </div>

                                    <div class="row g-3 mt-3">
                                        <div class="col-md-3">
                                            <label>Ponencia</label>
                                            <input type="text" name="ponencia" class="form-control pill-input">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Reunión de coordinación</label>
                                            <input type="text" name="reunion" class="form-control pill-input">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5">
                                        <button type="submit" class="btn btn-submit">
                                            Guardar Oficio
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ----------------------------------------------------------------------- SECCION 2 GENERAL ----------------------------------------------------------------------- -->

                    <div class="tab-pane fade" id="general">
                        <div class="General container-fluid">
                            <nav class="nav-2 navbar">
                                <div class="container-fluid">
                                    <form class="d-flex w-50 mt-3">
                                        <input class="form-control me-3 flex-grow-1" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                            <div class="container-fluid pt-5">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <colgroup>
                                            <col style="width: 3%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                            <col style="width: 40%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                        </colgroup>
                                        <thead class="table-1 text-center">
                                            <tr>
                                                <th>Folio</th>
                                                <th>Fecha de Oficio</th>
                                                <th>Referencia</th>
                                                <th>Tipo de Tramite</th>
                                                <th>Solicitud</th>
                                                <th>Estatus</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center align-middle">

                                            <?php if (!empty($general)): ?>
                                            <?php foreach ($general as $row): ?>
                                            <tr>
                                                <!-- Folio -->
                                                <td><?= esc($row['folio_registro']) ?></td>

                                                <!-- Fecha -->
                                                <td><?= date('d/m/Y', strtotime($row['fecha_oficio'])) ?></td>

                                                <!-- Referencia -->
                                                <td><?= esc($row['referencia']) ?></td>

                                                <!-- Trámite -->
                                                <td><?= esc($row['tramite']) ?></td>

                                                <!-- Solicitud -->
                                                <td><?= esc($row['solicitud']) ?></td>

                                                <!-- Estado -->
                                                <td>
                                                    <?php
                                                            $estado = strtolower($row['estado']);
                                                            $clase = '';

                                                            switch ($estado) {
                                                                case 'archivado':
                                                                    $clase = 'bg-success'; // verde
                                                                    break;
                                                                case 'tramite':
                                                                    $clase = 'bg-warning text-dark'; // amarillo
                                                                    break;
                                                                case 'pendiente':
                                                                    $clase = 'bg-danger'; // rojo
                                                                    break;
                                                                default:
                                                                    $clase = 'bg-secondary';
                                                            }
                                                            ?>

                                                    <span class="badge <?= $clase ?> d-inline-block text-center"
                                                        style="width:80px;">
                                                        <?= esc($row['estado']) ?>
                                                    </span>
                                                </td>

                                                <!-- Acciones -->
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning btn-editar"
                                                            data-folio="<?= esc($row['folio_registro']) ?>">
                                                            ✏️
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-detalles"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles"
                                                            data-folio="<?= esc($row['folio_registro']) ?>">
                                                            📄
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="10">No hay oficios pendientes</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------- SECCION 3 PENDIENTES ----------------------------------------------------------------------- -->

                    <div class="tab-pane fade" id="pendientes">
                        <div class="Pendientes container-fluid">
                            <nav class="nav-2 navbar">
                                <div class="container-fluid">
                                    <form class="d-flex w-50 pt-5">
                                        <input class="form-control me-3 flex-grow-1" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                            <div class="container-fluid pt-5">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <colgroup>
                                            <col style="width: 3%;">
                                            <col style="width: 15%;">
                                            <col style="width: 5%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                            <col style="width: 40%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                        </colgroup>

                                        <thead class="table-1 text-center">
                                            <tr>
                                                <th></th>
                                                <th>Nombre</th>
                                                <th>Folio</th>
                                                <th>Fecha de Oficio</th>
                                                <th>Referencia</th>
                                                <th>Solicitud</th>
                                                <th>Estatus</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center align-middle">

                                            <?php if (!empty($pendientes)): ?>
                                            <?php foreach ($pendientes as $row): ?>
                                            <tr>

                                                <!-- Ícono -->
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                        fill="currentColor" class="bi bi-person-circle"
                                                        viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                        <path fill-rule="evenodd"
                                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8" />
                                                    </svg>
                                                </td>

                                                <!-- Responsable -->
                                                <td><?= esc($row['responsable'] ?? 'Sin asignar') ?></td>

                                                <!-- Folio -->
                                                <td><?= esc($row['folio_registro']) ?></td>

                                                <!-- Fecha -->
                                                <td><?= date('d/m/Y', strtotime($row['fecha_oficio'])) ?></td>

                                                <!-- Referencia -->
                                                <td><?= esc($row['referencia']) ?></td>

                                                <!-- Solicitud -->
                                                <td><?= esc($row['solicitud']) ?></td>

                                                <!-- Estado -->
                                                <td>
                                                    <?php
                                                            $estado = strtolower($row['estado']);
                                                            $clase = '';

                                                            switch ($estado) {
                                                                case 'archivado':
                                                                    $clase = 'bg-success'; // verde
                                                                    break;
                                                                case 'tramite':
                                                                    $clase = 'bg-warning text-dark'; // amarillo
                                                                    break;
                                                                case 'pendiente':
                                                                    $clase = 'bg-danger'; // rojo
                                                                    break;
                                                                default:
                                                                    $clase = 'bg-secondary';
                                                            }
                                                            ?>
                                                    <span class="badge <?= $clase ?> d-inline-block text-center"
                                                        style="width:80px;">
                                                        <?= esc($row['estado']) ?>
                                                    </span>
                                                </td>

                                                <!-- Acciones -->
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning btn-editar"
                                                            data-folio="<?= esc($row['folio_registro']) ?>">
                                                            ✏️
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-detalles"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles"
                                                            data-folio="<?= esc($row['folio_registro']) ?>">
                                                            📄
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="8">No hay oficios registrados</td>
                                            </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------- MODAL DETALLES ----------------------------------------------------------------------- -->

                    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Registro de Oficio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?= base_url('oficios/guardar') ?>"> <?= csrf_field() ?>

                                        <div class="Registro">
                                            <!-- ------------------------- DATOS DEL OFICIO ------------------------- -->

                                            <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                Datos del
                                                Oficio
                                            </h5>
                                            <div class="d-flex justify-content-center pt-3">
                                                <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                            </div>

                                            <div class="Formulario container-fluid pt-5">
                                                <div class="row g-3">
                                                    <div class="col-md-3">
                                                        <label>Folio de Oficio</label>
                                                        <input type="text" id="folio_registro"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Fecha del Oficio</label>
                                                        <input type="date" id="fecha_oficio"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Referencia</label>
                                                        <input type="text" id="referencia"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Fecha de Recepción</label>
                                                        <input type="date" id="fecha_recepcion"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                </div>



                                                <!-- ------------------------- SOLICITANTE/REMITENTE ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Solicitante /
                                                    Remitente
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Titular</label>
                                                        <input id="nombre_titular" class="form-select pill-select"
                                                            readonly>
                                                        </input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Cargo</label>
                                                        <input type="text" id="nombre_cargo"
                                                            class="form-control pill-input" readonly>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Área</label>
                                                        <input type="text" id="nombre_area"
                                                            class="form-control pill-input" readonly>

                                                    </div>

                                                </div>


                                                <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Solicitud
                                                    /
                                                    Información
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Tipo de Tramite</label>
                                                        <input id="tramite" class="form-select pill-select" readonly>
                                                        </input>
                                                    </div>
                                                    <div class="col-md-9 mt-3">
                                                        <label for="">Solicitud</label>
                                                        <textarea id="solicitud" class="form-control pill-textarea"
                                                            rows="4" readonly></textarea>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- DESCRIPCIÓN DE LA ATENCIÓN ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Descripción
                                                    de la
                                                    Atención</h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <div class="row g-3">
                                                            <label>Folio de contestación de Oficio</label>
                                                            <div class="col-12">
                                                                <input type="text" id="oficio_contestacion"
                                                                    name="oficio_contestacion"
                                                                    class="form-control pill-input" readonly>
                                                            </div>
                                                            <label for="">Fecha de Contestación</label>
                                                            <div class="col-12">
                                                                <input type="date" id="fecha_contestacion"
                                                                    name="fecha_contestacion"
                                                                    class="form-control pill-input" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label>Asunto</label>
                                                        <textarea id="asunto" name="asunto"
                                                            class="form-control pill-textarea h-100" rows="4"
                                                            readonly></textarea>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- ESTADO DEL ARCHIVO/SECCION QUE ATENDIO ------------------------- -->

                                                <div class="row g-3 mt-5">
                                                    <div class="col-md-6">
                                                        <h5
                                                            class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                            Estado del
                                                            Archivo</h5>

                                                        <div class="d-flex justify-content-center pt-3">
                                                            <div class="SPD-line-1 border-top border-4 border-muted">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5
                                                            class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                            Seccion que
                                                            Atendio</h5>

                                                        <div class="d-flex justify-content-center pt-3">
                                                            <div class="SPD-line-1 border-top border-4 border-muted">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- ESTADO DEL ARCHIVO ------------------------- -->

                                                <div class="row g-3 mt-4">
                                                    <div class="col-md-3">
                                                        <label>Archivado en</label>
                                                        <input id="archivado" class="form-select pill-select" readonly>
                                                        </input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Estatus</label>
                                                        <input id="estado" class="form-select pill-select" readonly>
                                                        </input>
                                                    </div>

                                                    <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                                    <div class="col-md-3">
                                                        <label>Atendido por</label>
                                                        <input id="nombre_responsable" class="form-select pill-select"
                                                            readonly>
                                                        </input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Sección Responsable</label>
                                                        <input type="text" id="nombre_seccion"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Ponencia
                                                    /
                                                    Reunión
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Ponencia</label>
                                                        <input type="text" id="ponencia" class="form-control pill-input"
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Reunión de coordinación</label>
                                                        <input type="text" id="reunion" class="form-control pill-input"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button type="submit" class="btn btn-submit">
                                                        Guardar Oficio
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------- MODAL EDITAR ----------------------------------------------------------------------- -->

                    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Registro de Oficio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">

                                    <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('error') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php endif; ?>

                                    <form method="post" action="<?= base_url('oficios/guardar') ?>"> <?= csrf_field() ?>
                                        <input type="hidden" id="folio_original" name="folio_original">

                                        <div class="Registro">
                                            <!-- ------------------------- DATOS DEL OFICIO ------------------------- -->

                                            <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                Datos del
                                                Oficio
                                            </h5>
                                            <div class="d-flex justify-content-center pt-3">
                                                <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                            </div>

                                            <div class="Formulario container-fluid pt-5">
                                                <div class="row g-3">
                                                    <div class="col-md-3">
                                                        <label>Folio de Oficio</label>
                                                        <input type="text" id="folio_registro_edit"
                                                            name="folio_registro" class="form-control pill-input<?= session()->getFlashdata('error') ? 'is-invalid' : '' ?>"
                                                required>
                                            <?php if (session()->getFlashdata('error')): ?>
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                            <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Fecha del Oficio</label>
                                                        <input type="date" id="fecha_oficio_edit" name="fecha_oficio"
                                                            class="form-control pill-input">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Referencia</label>
                                                        <input type="text" id="referencia_edit" name="referencia"
                                                            class="form-control pill-input">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Fecha de Recepción</label>
                                                        <input type="date" id="fecha_recepcion_edit"
                                                            name="fecha_recepcion" class="form-control pill-input">
                                                    </div>
                                                </div>



                                                <!-- ------------------------- SOLICITANTE/REMITENTE ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Solicitante /
                                                    Remitente
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Titular</label>
                                                        <select name="folio_remitente" id="folio_remitente_edit"
                                                            class="form-select pill-select" required>
                                                            <option value="">Seleccione</option>
                                                            <?php if (!empty($remitentes) && is_array($estados)): ?>
                                                            <?php foreach ($remitentes as $remitente): ?>
                                                            <option value="<?= $remitente['folio_remitente'] ?>"
                                                                data-cargo="<?= esc($remitente['nombre_cargo']) ?>"
                                                                data-area="<?= esc($remitente['nombre_area']) ?>">
                                                                <?= esc($remitente['nombre_titular']) ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Cargo</label>
                                                        <input type="text" id="folio_cargo_edit"
                                                            class="form-control pill-input" readonly>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Área</label>
                                                        <input type="text" id="folio_area_edit"
                                                            class="form-control pill-input" readonly>

                                                    </div>

                                                </div>


                                                <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Solicitud
                                                    /
                                                    Información
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Tipo de Tramite</label>
                                                        <select name="folio_tramite" id="tramite_edit"
                                                            class="form-select pill-select" required>
                                                            <option value="">Seleccione</option>
                                                            <?php if (!empty($tramites) && is_array($estados)): ?>
                                                            <?php foreach ($tramites as $tramite): ?>
                                                            <option value="<?= $tramite['folio_tramite'] ?>">
                                                                <?= esc($tramite['tramite']) ?></option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-9 mt-3">
                                                        <label for="">Solicitud</label>
                                                        <textarea id="solicitud_edit" name="solicitud"
                                                            class="form-control pill-textarea" rows="4"
                                                            required></textarea>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- DESCRIPCIÓN DE LA ATENCIÓN ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Descripción
                                                    de la
                                                    Atención</h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <div class="row g-3">
                                                            <label>Folio de contestación de Oficio</label>
                                                            <div class="col-12">
                                                                <input type="text" id="oficio_contestacion_edit"
                                                                    name="oficio_contestacion"
                                                                    class="form-control pill-input" required>
                                                            </div>
                                                            <label for="">Fecha de Contestación</label>
                                                            <div class="col-12">
                                                                <input type="date" id="fecha_contestacion_edit"
                                                                    name="fecha_contestacion"
                                                                    class="form-control pill-input" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label>Asunto</label>
                                                        <textarea id="asunto_edit" name="asunto"
                                                            class="form-control pill-textarea h-100"
                                                            rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- ESTADO DEL ARCHIVO/SECCION QUE ATENDIO ------------------------- -->

                                                <div class="row g-3 mt-5">
                                                    <div class="col-md-6">
                                                        <h5
                                                            class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                            Estado del
                                                            Archivo</h5>

                                                        <div class="d-flex justify-content-center pt-3">
                                                            <div class="SPD-line-1 border-top border-4 border-muted">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5
                                                            class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
                                                            Seccion que
                                                            Atendio</h5>

                                                        <div class="d-flex justify-content-center pt-3">
                                                            <div class="SPD-line-1 border-top border-4 border-muted">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- ESTADO DEL ARCHIVO ------------------------- -->

                                                <div class="row g-3 mt-4">
                                                    <div class="col-md-3">
                                                        <label>Archivado en</label>
                                                        <input id="archivado" class="form-select pill-select" readonly>
                                                        </input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Estatus</label>
                                                        <select id="estado_edit" name="folio_estado"
                                                            class="form-select pill-select" required>
                                                            <option value="">Seleccione</option>
                                                            <?php if (!empty($estados) && is_array($estados)): ?>
                                                            <?php foreach ($estados as $estado): ?>
                                                            <option value="<?= $estado['folio_estado'] ?>">
                                                                <?= esc($estado['estado']) ?></option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                                    <div class="col-md-3">
                                                        <label>Atendido por</label>
                                                        <select id="folio_sec_resp_edit" name="folio_sec_resp"
                                                            class="form-select pill-select">
                                                            <option value="">Seleccione</option>
                                                            <?php if (!empty($seccion_responsable) && is_array($estados)): ?>
                                                            <?php foreach ($seccion_responsable as $sr): ?>
                                                            <option value="<?= $sr['folio_sec_resp'] ?>"
                                                                data-seccion="<?= esc($sr['nombre_seccion']) ?>">
                                                                <?= esc($sr['nombre_responsable']) ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Sección Responsable</label>
                                                        <input type="text" id="folio_seccion_edit"
                                                            class="form-control pill-input" readonly>
                                                    </div>
                                                </div>

                                                <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                                    Ponencia
                                                    /
                                                    Reunión
                                                </h5>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>

                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-3">
                                                        <label>Ponencia</label>
                                                        <input type="text" id="ponencia_edit" name="ponencia"
                                                            class="form-control pill-input" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Reunión de coordinación</label>
                                                        <input type="text" id="reunion_edit" name="reunion"
                                                            class="form-control pill-input" required>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button type="submit" class="btn btn-submit btn-edit">
                                                        Guardar Cambios
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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