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

                <div class="tab-content">

                    <!-- ----------------------------------------------------------------------- SECCION 1 REGISTRO ----------------------------------------------------------------------- -->

                    <div class="tab-pane fade show active" id="registro">
                        <div class="Registro">
                            <!-- ------------------------- DATOS DEL OFICIO ------------------------- -->

                            <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Datos del Oficio
                            </h5>
                            <div class="d-flex justify-content-center pt-3">
                                <div class="SPD-line-1 border-top border-4 border-muted"></div>
                            </div>

                            <div class="Formulario container-fluid pt-5">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="">Número de Oficio</label>
                                        <input type="text" name="num_oficio" class="form-control pill-input"
                                            placeholder="Folio">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fecha del Oficio</label>
                                        <input type="date" name="fecha_oficio" class="form-control pill-input"
                                            placeholder="Fecha">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Referencia</label>
                                        <input type="text" name="num_referencia_oficio" class="form-control pill-input"
                                            placeholder="Número de Oficio">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fecha de Recepción</label>
                                        <input type="date" name="fecha_recepcion" class="form-control pill-input"
                                            placeholder="Fecha de recepción">
                                    </div>
                                </div>


                                <!-- ------------------------- SOLICITANTE/REMITENTE ------------------------- -->

                                <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Solicitante /
                                    Remitente
                                </h5>

                                <div class="d-flex justify-content-center pt-3">
                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-3">
                                        <label for="">Titular</label>
                                        <input type="text" name="titular" class="form-control pill-input"
                                            placeholder="Titular">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Cargo</label>
                                        <input type="text" name="cargo" class="form-control pill-input"
                                            placeholder="Cargo">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tipo de área</label>
                                        <select name="tipo_area" class="form-select pill-select" required>
                                            <option value="">Selección</option>
                                            <option value="interna">Interna</option>
                                            <option value="externa">Externa</option>
                                        </select>
                                    </div>

                                </div>

                                <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Solicitud /
                                    Información
                                </h5>

                                <div class="d-flex justify-content-center pt-3">
                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-3">
                                        <label>Tipo de Tramite</label>
                                        <select name="tipo_archivo" class="form-select pill-select">
                                            <option value="">Selección</option>
                                            <option value="atencion_t_t">Atención</option>
                                            <option value="aten_sol_inf_t_t">Atención a Solicitud de Información
                                            </option>
                                            <option value="conocimiento_t_t">Conocimiento</option>
                                            <option value="tramite_t_t">Trámite</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9 mt-3">
                                        <label for="">Solicitud</label>
                                        <textarea name="solicitud" class="form-control pill-textarea" rows="4"
                                            placeholder="Solicitud/Información"></textarea>
                                    </div>
                                </div>

                                <!-- ------------------------- DESCRIPCIÓN DE LA ATENCIÓN ------------------------- -->

                                <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Descripción
                                    de la
                                    Atención</h5>

                                <div class="d-flex justify-content-center pt-3">
                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-3">
                                        <div class="row g-3">
                                            <label for="">Número de Oficio</label>
                                            <div class="col-12">
                                                <input type="text" name="num_oficio_2" class="form-control pill-input"
                                                    placeholder="Número de Oficio">
                                            </div>
                                            <label for="">Fecha de Contestación</label>
                                            <div class="col-12">
                                                <input type="date" name="fecha_contestacion"
                                                    class="form-control pill-input" placeholder="Fecha de contestación">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="">Asunto</label>
                                        <textarea name="asunto" class="form-control pill-textarea h-100" rows="4"
                                            placeholder="Asunto"></textarea>
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
                                        <select name="archivado" class="form-select pill-select">
                                            <option value="">Selección</option>
                                            <option value="acciones_humanitarias">Acciones Humanitarias</option>
                                            <option value="comite_seguridad_publica_inegi">
                                                Actividades del Comité Técnico Especializado de Informática de Seguridad
                                                Pública
                                                (Inegi)
                                            </option>
                                            <option value="comite_seguridad_publica_inegi">
                                                Actividades del Comité Técnico Especializado de Informática de Seguridad
                                                Pública
                                            </option>
                                            <option value="coordinacion_secretaria_tecnica">
                                                Actividades en Coordinación con la Secretaría Técnica del Consejo
                                                Municipal de
                                                Seguridad Pública
                                            </option>
                                            <option value="coordinacion_emergencias">
                                                Actividades en Coordinación con los Cuerpos de Emergencia
                                            </option>
                                            <option value="atencion">Atención</option>
                                            <option value="bitacora_vuelos">Bitácora de Vuelos</option>
                                            <option value="contraloria">Contraloría</option>
                                            <option value="control_recursos_unidad">Control de Recursos Asignados a la
                                                Unidad
                                            </option>
                                            <option value="convenios_sector_social_privado">
                                                Convenios de Concentración con el Sector Social o Privado
                                            </option>
                                            <option value="convocatorias_buenas_practicas">Convocatorias (Buenas
                                                Prácticas)
                                            </option>
                                            <option value="coordinacion_institucional">Coordinación Institucional
                                            </option>
                                            <option value="datos_personales">Datos Personales</option>
                                            <option value="ejercicio_presupuestal_2025_2027">Ejercicio Presupuestal
                                                2025–2027
                                            </option>
                                            <option value="estimulos_recompensas_2025_i">Estímulos y Recompensas 2025 I
                                            </option>
                                            <option value="expediente_laboral_personal">Expediente Laboral Personal
                                            </option>
                                            <option value="guia_consultiva_desempeno">Guía Consultiva de Desempeño
                                                Municipal
                                            </option>
                                            <option value="inegi">Inegi</option>
                                            <option value="informe_actividades">Informe de Actividades</option>
                                            <option value="ipomex">Ipomex</option>
                                            <option value="mapas_georreferenciales">Mapas Georreferenciales</option>
                                            <option value="matriz_riesgos">Matriz de Riesgos</option>
                                            <option value="mejora_regulatoria">Mejora Regulatoria</option>
                                            <option value="permisos_escolares">Permisos Escolares</option>
                                            <option value="planes_programas_seguridad">Planes y Programas de Seguridad
                                                Ciudadana
                                            </option>
                                            <option value="ponencias_foros_conferencias">
                                                Ponencias, Foros y Conferencias acerca del Modelo de Seguridad Ciudadana
                                            </option>
                                            <option value="pbr_municipal">Presupuesto Basado en Resultados Municipal
                                            </option>
                                            <option value="programa_guia_consultiva">Programa Guía Consultiva de
                                                Desempeño
                                                Municipal</option>
                                            <option value="programa_control_interno">Programa Municipal de Control
                                                Interno
                                            </option>
                                            <option value="programa_operativo_anual">Programa Operativo Anual</option>
                                            <option value="redatosem">Redatosem</option>
                                            <option value="registros_administrativos_igecem">
                                                Registros Administrativos Municipales (Igecem)
                                            </option>
                                            <option value="reingenieria">Reingeniería</option>
                                            <option value="reingenieria_iii">Reingeniería III</option>
                                            <option value="reportes_avances_metas">Reportes de Avances de Metas Físicas
                                                por
                                                Proyecto Presupuestario</option>
                                            <option value="reporte_estado_fuerza">Reporte Estado de Fuerza</option>
                                            <option value="reportes_trimestrales">Reportes Trimestrales</option>
                                            <option value="sarcoem">Sarcoem</option>
                                            <option value="turnado_analisis_contexto">Se Turnó a Análisis y Contexto
                                            </option>
                                            <option value="turnado_spc">Se Turnó a Servicio Profesional de Carrera
                                            </option>
                                            <option value="turnado_spcp">Se Turnó a Servicio Profesional de Carrera
                                                Policial
                                            </option>
                                            <option value="spcp">Servicio Profesional de Carrera Policial</option>
                                            <option value="spc">Servicio Profesional de Carrera</option>
                                            <option value="solicitudes_busqueda_localizacion">
                                                Solicitudes de Búsqueda y Localización de Personas
                                            </option>
                                            <option value="solicitudes_info_procedimientos">
                                                Solicitudes de Información para la Sustentación de Procedimientos
                                                Administrativos y/o Judiciales
                                            </option>
                                            <option value="solicitudes_diversas">Solicitudes Diversas</option>
                                            <option value="tarjetas_informativas">Tarjetas Informativas</option>
                                            <option value="unidad_transparencia">Unidad de Transparencia y Acceso a la
                                                Información</option>
                                            <option value="unidad_transparencia_i">Unidad de Transparencia y Acceso a la
                                                Información I</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Estatus</label>
                                        <select name="estatus" class="form-select pill-select">
                                            <option value="">Selección</option>
                                            <option value="archivado">Archivado</option>
                                            <option value="en_tramite">En Trámite</option>
                                            <option value="pendiente">Pendiente</option>
                                        </select>
                                    </div>

                                    <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                    <div class="col-md-3">
                                        <label>Atendido por</label>
                                        <select name="atendido" class="form-select pill-select">
                                            <option value="">Selección</option>
                                            <option value="nombre_1">Andrés Barragán Corona</option>
                                            <option value="nombre_2">Armando García Meza</option>
                                            <option value="nombre_3">Brenda Castro Yescas</option>
                                            <option value="nombre_4">Efrén Jiménez Chávez</option>
                                            <option value="nombre_5">Emilia Maribel Corona Hernández
                                            </option>
                                            <option value="nombre_6">Ing. Miriam López Pérez</option>
                                            <option value="nombre_7">Tlahuiz Cuevas</option>
                                            <option value="nombre_8">Monserrath Cervantes Guillén</option>
                                            <option value="seccion_2">Sección 2</option>
                                            <option value="nombre_9">Sergio Iván Méndez Torres</option>
                                            <option value="nombre_10">Teresa Gabriela Ramírez Márquez
                                            </option>
                                            <option value="nombre_11">Claudia Rojas</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Sección Responsable</label>
                                        <select name="seccion" class="form-select pill-select">
                                            <option value="">Selección</option>
                                            <option value="geomatica">Geomática</option>
                                            <option value="jefatura_departamento_spc">Jefatura de Departamento del
                                                Servicio
                                                Profesional de Carrera</option>
                                            <option value="jefatura_spc">Jefatura del Servicio Profesional de Carrera
                                            </option>
                                            <option value="seccion_1_desarrollo_organizacional_transparencia">
                                                Sección 1. Desarrollo Organizacional y Transparencia
                                            </option>
                                            <option value="seccion_2_planeacion_control">Sección 2. Planeación y Control
                                            </option>
                                            <option value="seccion_3_procesos_informacion">Sección 3. Procesos de
                                                Información
                                            </option>
                                            <option value="seccion_4_mapas_analisis">
                                                Sección 4. Mapas Georreferenciales y Análisis Estadístico
                                            </option>
                                            <option value="seccion_5_procesos_informacion">Sección 5. Procesos de
                                                Información
                                            </option>
                                            <option value="servicio_profesional_carrera">Servicio Profesional de Carrera
                                            </option>
                                            <option value="unidad_analisis_contexto">Unidad de Análisis y Contexto
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">Ponencia /
                                    Reunión
                                </h5>

                                <div class="d-flex justify-content-center pt-3">
                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-3">
                                        <label for="">Ponencia</label>
                                        <input type="text" name="ponencia" class="form-control pill-input"
                                            placeholder="Ponencia">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Reunión de coordinación</label>
                                        <input type="text" name="coordinacion" class="form-control pill-input"
                                            placeholder="Reunion de coordinación">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <button class="btn btn-submit">
                                        Submit Button
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------- SECCION 2 GENERAL ----------------------------------------------------------------------- -->

                    <div class="tab-pane fade" id="general">
                        <div class="General container-fluid">
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
                                            <tr>
                                                <td>1080</td>
                                                <td>9/12/2025</td>
                                                <td>SA/9672/2025</td>
                                                <td>Conocimiento</td>
                                                <td>EN ATENCION AL OFICIO 233001003A00000/704/2025 ENVIADO A LA SRIA.
                                                    GRAL. DE
                                                    GOBIERNO DEL EDO. MEX. EN EL CUAL SE INDICAN LAS NECESIDADES DE
                                                    CAPACITACION
                                                    IDENTIFICADAS POR LOS MUNICIPIOS, SE RECIBE RESPUESTA CON PROPUESTAS
                                                    DE
                                                    CAPACITACIONES DE ENERO DE 2026 A JUNIO DE 2027, BAJO EL CALENDARIO
                                                    REMITIDO.</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1079</td>
                                                <td>11/12/2025</td>
                                                <td>CGSC/12/606/2025</td>
                                                <td>Conocimiento</td>
                                                <td>INFORMA QUE EL DIA 04 DE DICIEMBRE DE LOS CORRIENTES LOS TRIPUANTES
                                                    DE LAS
                                                    UNIDADES V-123 Y V-124 BRINDARON UN APOYO DEL CUAL SE GENERO UNA
                                                    DETENCION
                                                    POR FEMINICIDIO, POR LO QUE SOLICITA SE TOME EN CUENTA PARA QUE SEAN
                                                    ACREEDORES A UN ASCENSO, ASI COMO ESTIMULOS Y RECOMPENSAS.</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1078</td>
                                                <td>10/12/2025</td>
                                                <td>CIRCULAR 55</td>
                                                <td>Conocimiento</td>
                                                <td>SE INFORMAN LAS FECHAS Y HORARIOS EN QUE SE DARAN A FIRMAR LOS
                                                    RECIBOS DE
                                                    NOMINA CORRESPONDIENTES A LA 2A QUINCENA DE DICIEMBRE, EL JUEVES 11
                                                    DE
                                                    DICIEMBRE DE 08:00 A 18:00 HRS Y VIERNES 12 DE 08:00 A 10:OO HRS EN
                                                    EL
                                                    AGRUPAMIENTO TITANES</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                        fill="currentColor" class="bi bi-person-circle"
                                                        viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                        <path fill-rule="evenodd"
                                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                    </svg>
                                                </td>
                                                <td>
                                                    <p>Andrés Barragán Corona</p>
                                                    <p>Área</p>
                                                </td>
                                                <td>1080</td>
                                                <td>9/12/2025</td>
                                                <td>SA/9672/2025</td>
                                                <td>EN ATENCION AL OFICIO 233001003A00000/704/2025 ENVIADO A LA SRIA.
                                                    GRAL. DE
                                                    GOBIERNO DEL EDO. MEX. EN EL CUAL SE INDICAN LAS NECESIDADES DE
                                                    CAPACITACION
                                                    IDENTIFICADAS POR LOS MUNICIPIOS, SE RECIBE RESPUESTA CON PROPUESTAS
                                                    DE
                                                    CAPACITACIONES DE ENERO DE 2026 A JUNIO DE 2027, BAJO EL CALENDARIO
                                                    REMITIDO.</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                        fill="currentColor" class="bi bi-person-circle"
                                                        viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                        <path fill-rule="evenodd"
                                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                    </svg>
                                                </td>
                                                <td>
                                                    <p>Brenda Castro Yescas</p>
                                                    <p>Área</p>
                                                </td>
                                                <td>1079</td>
                                                <td>11/12/2025</td>
                                                <td>CGSC/12/606/2025</td>
                                                <td>INFORMA QUE EL DIA 04 DE DICIEMBRE DE LOS CORRIENTES LOS TRIPUANTES
                                                    DE LAS
                                                    UNIDADES V-123 Y V-124 BRINDARON UN APOYO DEL CUAL SE GENERO UNA
                                                    DETENCION
                                                    POR FEMINICIDIO, POR LO QUE SOLICITA SE TOME EN CUENTA PARA QUE SEAN
                                                    ACREEDORES A UN ASCENSO, ASI COMO ESTIMULOS Y RECOMPENSAS.</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                        fill="currentColor" class="bi bi-person-circle"
                                                        viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                        <path fill-rule="evenodd"
                                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                    </svg>
                                                </td>
                                                <td>
                                                    <p>Emilia Maribel Corona Hernández</p>
                                                    <p>Área</p>
                                                </td>
                                                <td>1078</td>
                                                <td>10/12/2025</td>
                                                <td>CIRCULAR 55</td>
                                                <td>SE INFORMAN LAS FECHAS Y HORARIOS EN QUE SE DARAN A FIRMAR LOS
                                                    RECIBOS DE
                                                    NOMINA CORRESPONDIENTES A LA 2A QUINCENA DE DICIEMBRE, EL JUEVES 11
                                                    DE
                                                    DICIEMBRE DE 08:00 A 18:00 HRS Y VIERNES 12 DE 08:00 A 10:OO HRS EN
                                                    EL
                                                    AGRUPAMIENTO TITANES</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-3">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                            data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor"
                                                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                                                <path
                                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                    <div class="Formulario container-fluid pt-5">
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <label for="">Número de Oficio</label>
                                                <input type="text" name="num_oficio" class="form-control pill-input"
                                                    placeholder="Folio">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Fecha del Oficio</label>
                                                <input type="date" name="fecha_oficio" class="form-control pill-input"
                                                    placeholder="Fecha">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Referencia</label>
                                                <input type="text" name="num_referencia_oficio"
                                                    class="form-control pill-input" placeholder="Número de Oficio">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Fecha de Recepción</label>
                                                <input type="date" name="fecha_recepcion"
                                                    class="form-control pill-input" placeholder="Fecha de recepción">
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
                                                <label for="">Titular</label>
                                                <input type="text" name="titular" class="form-control pill-input"
                                                    placeholder="Titular">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Cargo</label>
                                                <input type="text" name="cargo" class="form-control pill-input"
                                                    placeholder="Cargo">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Tipo de área</label>
                                                <select name="tipo_area" class="form-select pill-select" required>
                                                    <option value="">Selección</option>
                                                    <option value="interna">Interna</option>
                                                    <option value="externa">Externa</option>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                        <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                            Solicitud /
                                            Información
                                        </h5>

                                        <div class="d-flex justify-content-center pt-3">
                                            <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                        </div>

                                        <div class="row g-3 mt-3">
                                            <div class="col-md-3">
                                                <label>Tipo de Tramite</label>
                                                <select name="tipo_archivo" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="atencion_t_t">Atención</option>
                                                    <option value="aten_sol_inf_t_t">Atención a Solicitud de Información
                                                    </option>
                                                    <option value="conocimiento_t_t">Conocimiento</option>
                                                    <option value="tramite_t_t">Trámite</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9 mt-3">
                                                <label for="">Solicitud</label>
                                                <textarea name="solicitud" class="form-control pill-textarea" rows="4"
                                                    placeholder="Solicitud/Información"></textarea>
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
                                                    <label for="">Número de Oficio</label>
                                                    <div class="col-12">
                                                        <input type="text" name="num_oficio_2"
                                                            class="form-control pill-input"
                                                            placeholder="Número de Oficio">
                                                    </div>
                                                    <label for="">Fecha de Contestación</label>
                                                    <div class="col-12">
                                                        <input type="date" name="fecha_contestacion"
                                                            class="form-control pill-input"
                                                            placeholder="Fecha de contestación">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <label for="">Asunto</label>
                                                <textarea name="asunto" class="form-control pill-textarea h-100"
                                                    rows="4" placeholder="Asunto"></textarea>
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
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
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
                                                <select name="archivado" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="acciones_humanitarias">Acciones Humanitarias</option>
                                                    <option value="comite_seguridad_publica_inegi">
                                                        Actividades del Comité Técnico Especializado de Informática de
                                                        Seguridad
                                                        Pública
                                                        (Inegi)
                                                    </option>
                                                    <option value="comite_seguridad_publica_inegi">
                                                        Actividades del Comité Técnico Especializado de Informática de
                                                        Seguridad
                                                        Pública
                                                    </option>
                                                    <option value="coordinacion_secretaria_tecnica">
                                                        Actividades en Coordinación con la Secretaría Técnica del
                                                        Consejo
                                                        Municipal de
                                                        Seguridad Pública
                                                    </option>
                                                    <option value="coordinacion_emergencias">
                                                        Actividades en Coordinación con los Cuerpos de Emergencia
                                                    </option>
                                                    <option value="atencion">Atención</option>
                                                    <option value="bitacora_vuelos">Bitácora de Vuelos</option>
                                                    <option value="contraloria">Contraloría</option>
                                                    <option value="control_recursos_unidad">Control de Recursos
                                                        Asignados a la
                                                        Unidad
                                                    </option>
                                                    <option value="convenios_sector_social_privado">
                                                        Convenios de Concentración con el Sector Social o Privado
                                                    </option>
                                                    <option value="convocatorias_buenas_practicas">Convocatorias (Buenas
                                                        Prácticas)
                                                    </option>
                                                    <option value="coordinacion_institucional">Coordinación
                                                        Institucional
                                                    </option>
                                                    <option value="datos_personales">Datos Personales</option>
                                                    <option value="ejercicio_presupuestal_2025_2027">Ejercicio
                                                        Presupuestal
                                                        2025–2027
                                                    </option>
                                                    <option value="estimulos_recompensas_2025_i">Estímulos y Recompensas
                                                        2025 I
                                                    </option>
                                                    <option value="expediente_laboral_personal">Expediente Laboral
                                                        Personal
                                                    </option>
                                                    <option value="guia_consultiva_desempeno">Guía Consultiva de
                                                        Desempeño
                                                        Municipal
                                                    </option>
                                                    <option value="inegi">Inegi</option>
                                                    <option value="informe_actividades">Informe de Actividades</option>
                                                    <option value="ipomex">Ipomex</option>
                                                    <option value="mapas_georreferenciales">Mapas Georreferenciales
                                                    </option>
                                                    <option value="matriz_riesgos">Matriz de Riesgos</option>
                                                    <option value="mejora_regulatoria">Mejora Regulatoria</option>
                                                    <option value="permisos_escolares">Permisos Escolares</option>
                                                    <option value="planes_programas_seguridad">Planes y Programas de
                                                        Seguridad
                                                        Ciudadana
                                                    </option>
                                                    <option value="ponencias_foros_conferencias">
                                                        Ponencias, Foros y Conferencias acerca del Modelo de Seguridad
                                                        Ciudadana
                                                    </option>
                                                    <option value="pbr_municipal">Presupuesto Basado en Resultados
                                                        Municipal
                                                    </option>
                                                    <option value="programa_guia_consultiva">Programa Guía Consultiva de
                                                        Desempeño
                                                        Municipal</option>
                                                    <option value="programa_control_interno">Programa Municipal de
                                                        Control
                                                        Interno
                                                    </option>
                                                    <option value="programa_operativo_anual">Programa Operativo Anual
                                                    </option>
                                                    <option value="redatosem">Redatosem</option>
                                                    <option value="registros_administrativos_igecem">
                                                        Registros Administrativos Municipales (Igecem)
                                                    </option>
                                                    <option value="reingenieria">Reingeniería</option>
                                                    <option value="reingenieria_iii">Reingeniería III</option>
                                                    <option value="reportes_avances_metas">Reportes de Avances de Metas
                                                        Físicas
                                                        por
                                                        Proyecto Presupuestario</option>
                                                    <option value="reporte_estado_fuerza">Reporte Estado de Fuerza
                                                    </option>
                                                    <option value="reportes_trimestrales">Reportes Trimestrales</option>
                                                    <option value="sarcoem">Sarcoem</option>
                                                    <option value="turnado_analisis_contexto">Se Turnó a Análisis y
                                                        Contexto
                                                    </option>
                                                    <option value="turnado_spc">Se Turnó a Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="turnado_spcp">Se Turnó a Servicio Profesional de
                                                        Carrera
                                                        Policial
                                                    </option>
                                                    <option value="spcp">Servicio Profesional de Carrera Policial
                                                    </option>
                                                    <option value="spc">Servicio Profesional de Carrera</option>
                                                    <option value="solicitudes_busqueda_localizacion">
                                                        Solicitudes de Búsqueda y Localización de Personas
                                                    </option>
                                                    <option value="solicitudes_info_procedimientos">
                                                        Solicitudes de Información para la Sustentación de
                                                        Procedimientos
                                                        Administrativos y/o Judiciales
                                                    </option>
                                                    <option value="solicitudes_diversas">Solicitudes Diversas</option>
                                                    <option value="tarjetas_informativas">Tarjetas Informativas</option>
                                                    <option value="unidad_transparencia">Unidad de Transparencia y
                                                        Acceso a la
                                                        Información</option>
                                                    <option value="unidad_transparencia_i">Unidad de Transparencia y
                                                        Acceso a la
                                                        Información I</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Estatus</label>
                                                <select name="estatus" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="archivado">Archivado</option>
                                                    <option value="en_tramite">En Trámite</option>
                                                    <option value="pendiente">Pendiente</option>
                                                </select>
                                            </div>

                                            <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                            <div class="col-md-3">
                                                <label>Atendido por</label>
                                                <select name="atendido" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="nombre_1">Andrés Barragán Corona</option>
                                                    <option value="nombre_2">Armando García Meza</option>
                                                    <option value="nombre_3">Brenda Castro Yescas</option>
                                                    <option value="nombre_4">Efrén Jiménez Chávez</option>
                                                    <option value="nombre_5">Emilia Maribel Corona Hernández
                                                    </option>
                                                    <option value="nombre_6">Ing. Miriam López Pérez</option>
                                                    <option value="nombre_7">Tlahuiz Cuevas</option>
                                                    <option value="nombre_8">Monserrath Cervantes Guillén</option>
                                                    <option value="seccion_2">Sección 2</option>
                                                    <option value="nombre_9">Sergio Iván Méndez Torres</option>
                                                    <option value="nombre_10">Teresa Gabriela Ramírez Márquez
                                                    </option>
                                                    <option value="nombre_11">Claudia Rojas</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Sección Responsable</label>
                                                <select name="seccion" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="geomatica">Geomática</option>
                                                    <option value="jefatura_departamento_spc">Jefatura de Departamento
                                                        del
                                                        Servicio
                                                        Profesional de Carrera</option>
                                                    <option value="jefatura_spc">Jefatura del Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="seccion_1_desarrollo_organizacional_transparencia">
                                                        Sección 1. Desarrollo Organizacional y Transparencia
                                                    </option>
                                                    <option value="seccion_2_planeacion_control">Sección 2. Planeación y
                                                        Control
                                                    </option>
                                                    <option value="seccion_3_procesos_informacion">Sección 3. Procesos
                                                        de
                                                        Información
                                                    </option>
                                                    <option value="seccion_4_mapas_analisis">
                                                        Sección 4. Mapas Georreferenciales y Análisis Estadístico
                                                    </option>
                                                    <option value="seccion_5_procesos_informacion">Sección 5. Procesos
                                                        de
                                                        Información
                                                    </option>
                                                    <option value="servicio_profesional_carrera">Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="unidad_analisis_contexto">Unidad de Análisis y
                                                        Contexto
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                        <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                            Ponencia /
                                            Reunión
                                        </h5>

                                        <div class="d-flex justify-content-center pt-3">
                                            <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                        </div>

                                        <div class="row g-3 mt-3">
                                            <div class="col-md-3">
                                                <label for="">Ponencia</label>
                                                <input type="text" name="ponencia" class="form-control pill-input"
                                                    placeholder="Ponencia">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Reunión de coordinación</label>
                                                <input type="text" name="coordinacion" class="form-control pill-input"
                                                    placeholder="Reunion de coordinación">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </div>
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
                                    <div class="Formulario container-fluid pt-5">
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <label for="">Número de Oficio</label>
                                                <input type="text" name="num_oficio" class="form-control pill-input"
                                                    placeholder="Folio">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Fecha del Oficio</label>
                                                <input type="date" name="fecha_oficio" class="form-control pill-input"
                                                    placeholder="Fecha">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Referencia</label>
                                                <input type="text" name="num_referencia_oficio"
                                                    class="form-control pill-input" placeholder="Número de Oficio">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Fecha de Recepción</label>
                                                <input type="date" name="fecha_recepcion"
                                                    class="form-control pill-input" placeholder="Fecha de recepción">
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
                                                <label for="">Titular</label>
                                                <input type="text" name="titular" class="form-control pill-input"
                                                    placeholder="Titular">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Cargo</label>
                                                <input type="text" name="cargo" class="form-control pill-input"
                                                    placeholder="Cargo">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Tipo de área</label>
                                                <select name="tipo_area" class="form-select pill-select" required>
                                                    <option value="">Selección</option>
                                                    <option value="interna">Interna</option>
                                                    <option value="externa">Externa</option>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- ------------------------- SOLICITUD/INFORMACIÓN ------------------------- -->

                                        <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                            Solicitud /
                                            Información
                                        </h5>

                                        <div class="d-flex justify-content-center pt-3">
                                            <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                        </div>

                                        <div class="row g-3 mt-3">
                                            <div class="col-md-3">
                                                <label>Tipo de Tramite</label>
                                                <select name="tipo_archivo" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="atencion_t_t">Atención</option>
                                                    <option value="aten_sol_inf_t_t">Atención a Solicitud de Información
                                                    </option>
                                                    <option value="conocimiento_t_t">Conocimiento</option>
                                                    <option value="tramite_t_t">Trámite</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9 mt-3">
                                                <label for="">Solicitud</label>
                                                <textarea name="solicitud" class="form-control pill-textarea" rows="4"
                                                    placeholder="Solicitud/Información"></textarea>
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
                                                    <label for="">Número de Oficio</label>
                                                    <div class="col-12">
                                                        <input type="text" name="num_oficio_2"
                                                            class="form-control pill-input"
                                                            placeholder="Número de Oficio">
                                                    </div>
                                                    <label for="">Fecha de Contestación</label>
                                                    <div class="col-12">
                                                        <input type="date" name="fecha_contestacion"
                                                            class="form-control pill-input"
                                                            placeholder="Fecha de contestación">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <label for="">Asunto</label>
                                                <textarea name="asunto" class="form-control pill-textarea h-100"
                                                    rows="4" placeholder="Asunto"></textarea>
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
                                                    <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5
                                                    class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-3">
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
                                                <select name="archivado" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="acciones_humanitarias">Acciones Humanitarias</option>
                                                    <option value="comite_seguridad_publica_inegi">
                                                        Actividades del Comité Técnico Especializado de Informática de
                                                        Seguridad
                                                        Pública
                                                        (Inegi)
                                                    </option>
                                                    <option value="comite_seguridad_publica_inegi">
                                                        Actividades del Comité Técnico Especializado de Informática de
                                                        Seguridad
                                                        Pública
                                                    </option>
                                                    <option value="coordinacion_secretaria_tecnica">
                                                        Actividades en Coordinación con la Secretaría Técnica del
                                                        Consejo
                                                        Municipal de
                                                        Seguridad Pública
                                                    </option>
                                                    <option value="coordinacion_emergencias">
                                                        Actividades en Coordinación con los Cuerpos de Emergencia
                                                    </option>
                                                    <option value="atencion">Atención</option>
                                                    <option value="bitacora_vuelos">Bitácora de Vuelos</option>
                                                    <option value="contraloria">Contraloría</option>
                                                    <option value="control_recursos_unidad">Control de Recursos
                                                        Asignados a la
                                                        Unidad
                                                    </option>
                                                    <option value="convenios_sector_social_privado">
                                                        Convenios de Concentración con el Sector Social o Privado
                                                    </option>
                                                    <option value="convocatorias_buenas_practicas">Convocatorias (Buenas
                                                        Prácticas)
                                                    </option>
                                                    <option value="coordinacion_institucional">Coordinación
                                                        Institucional
                                                    </option>
                                                    <option value="datos_personales">Datos Personales</option>
                                                    <option value="ejercicio_presupuestal_2025_2027">Ejercicio
                                                        Presupuestal
                                                        2025–2027
                                                    </option>
                                                    <option value="estimulos_recompensas_2025_i">Estímulos y Recompensas
                                                        2025 I
                                                    </option>
                                                    <option value="expediente_laboral_personal">Expediente Laboral
                                                        Personal
                                                    </option>
                                                    <option value="guia_consultiva_desempeno">Guía Consultiva de
                                                        Desempeño
                                                        Municipal
                                                    </option>
                                                    <option value="inegi">Inegi</option>
                                                    <option value="informe_actividades">Informe de Actividades</option>
                                                    <option value="ipomex">Ipomex</option>
                                                    <option value="mapas_georreferenciales">Mapas Georreferenciales
                                                    </option>
                                                    <option value="matriz_riesgos">Matriz de Riesgos</option>
                                                    <option value="mejora_regulatoria">Mejora Regulatoria</option>
                                                    <option value="permisos_escolares">Permisos Escolares</option>
                                                    <option value="planes_programas_seguridad">Planes y Programas de
                                                        Seguridad
                                                        Ciudadana
                                                    </option>
                                                    <option value="ponencias_foros_conferencias">
                                                        Ponencias, Foros y Conferencias acerca del Modelo de Seguridad
                                                        Ciudadana
                                                    </option>
                                                    <option value="pbr_municipal">Presupuesto Basado en Resultados
                                                        Municipal
                                                    </option>
                                                    <option value="programa_guia_consultiva">Programa Guía Consultiva de
                                                        Desempeño
                                                        Municipal</option>
                                                    <option value="programa_control_interno">Programa Municipal de
                                                        Control
                                                        Interno
                                                    </option>
                                                    <option value="programa_operativo_anual">Programa Operativo Anual
                                                    </option>
                                                    <option value="redatosem">Redatosem</option>
                                                    <option value="registros_administrativos_igecem">
                                                        Registros Administrativos Municipales (Igecem)
                                                    </option>
                                                    <option value="reingenieria">Reingeniería</option>
                                                    <option value="reingenieria_iii">Reingeniería III</option>
                                                    <option value="reportes_avances_metas">Reportes de Avances de Metas
                                                        Físicas
                                                        por
                                                        Proyecto Presupuestario</option>
                                                    <option value="reporte_estado_fuerza">Reporte Estado de Fuerza
                                                    </option>
                                                    <option value="reportes_trimestrales">Reportes Trimestrales</option>
                                                    <option value="sarcoem">Sarcoem</option>
                                                    <option value="turnado_analisis_contexto">Se Turnó a Análisis y
                                                        Contexto
                                                    </option>
                                                    <option value="turnado_spc">Se Turnó a Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="turnado_spcp">Se Turnó a Servicio Profesional de
                                                        Carrera
                                                        Policial
                                                    </option>
                                                    <option value="spcp">Servicio Profesional de Carrera Policial
                                                    </option>
                                                    <option value="spc">Servicio Profesional de Carrera</option>
                                                    <option value="solicitudes_busqueda_localizacion">
                                                        Solicitudes de Búsqueda y Localización de Personas
                                                    </option>
                                                    <option value="solicitudes_info_procedimientos">
                                                        Solicitudes de Información para la Sustentación de
                                                        Procedimientos
                                                        Administrativos y/o Judiciales
                                                    </option>
                                                    <option value="solicitudes_diversas">Solicitudes Diversas</option>
                                                    <option value="tarjetas_informativas">Tarjetas Informativas</option>
                                                    <option value="unidad_transparencia">Unidad de Transparencia y
                                                        Acceso a la
                                                        Información</option>
                                                    <option value="unidad_transparencia_i">Unidad de Transparencia y
                                                        Acceso a la
                                                        Información I</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Estatus</label>
                                                <select name="estatus" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="archivado">Archivado</option>
                                                    <option value="en_tramite">En Trámite</option>
                                                    <option value="pendiente">Pendiente</option>
                                                </select>
                                            </div>

                                            <!-- ------------------------- SECCION QUE ATENDIO ------------------------- -->

                                            <div class="col-md-3">
                                                <label>Atendido por</label>
                                                <select name="atendido" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="nombre_1">Andrés Barragán Corona</option>
                                                    <option value="nombre_2">Armando García Meza</option>
                                                    <option value="nombre_3">Brenda Castro Yescas</option>
                                                    <option value="nombre_4">Efrén Jiménez Chávez</option>
                                                    <option value="nombre_5">Emilia Maribel Corona Hernández
                                                    </option>
                                                    <option value="nombre_6">Ing. Miriam López Pérez</option>
                                                    <option value="nombre_7">Tlahuiz Cuevas</option>
                                                    <option value="nombre_8">Monserrath Cervantes Guillén</option>
                                                    <option value="seccion_2">Sección 2</option>
                                                    <option value="nombre_9">Sergio Iván Méndez Torres</option>
                                                    <option value="nombre_10">Teresa Gabriela Ramírez Márquez
                                                    </option>
                                                    <option value="nombre_11">Claudia Rojas</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Sección Responsable</label>
                                                <select name="seccion" class="form-select pill-select">
                                                    <option value="">Selección</option>
                                                    <option value="geomatica">Geomática</option>
                                                    <option value="jefatura_departamento_spc">Jefatura de Departamento
                                                        del
                                                        Servicio
                                                        Profesional de Carrera</option>
                                                    <option value="jefatura_spc">Jefatura del Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="seccion_1_desarrollo_organizacional_transparencia">
                                                        Sección 1. Desarrollo Organizacional y Transparencia
                                                    </option>
                                                    <option value="seccion_2_planeacion_control">Sección 2. Planeación y
                                                        Control
                                                    </option>
                                                    <option value="seccion_3_procesos_informacion">Sección 3. Procesos
                                                        de
                                                        Información
                                                    </option>
                                                    <option value="seccion_4_mapas_analisis">
                                                        Sección 4. Mapas Georreferenciales y Análisis Estadístico
                                                    </option>
                                                    <option value="seccion_5_procesos_informacion">Sección 5. Procesos
                                                        de
                                                        Información
                                                    </option>
                                                    <option value="servicio_profesional_carrera">Servicio Profesional de
                                                        Carrera
                                                    </option>
                                                    <option value="unidad_analisis_contexto">Unidad de Análisis y
                                                        Contexto
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <!-- ------------------------- PONENCIA/REUNION ------------------------- -->

                                        <h5 class="CF-sub-1 d-flex justify-content-center fw-bold text-muted pt-5">
                                            Ponencia /
                                            Reunión
                                        </h5>

                                        <div class="d-flex justify-content-center pt-3">
                                            <div class="SPD-line-1 border-top border-4 border-muted"></div>
                                        </div>

                                        <div class="row g-3 mt-3">
                                            <div class="col-md-3">
                                                <label for="">Ponencia</label>
                                                <input type="text" name="ponencia" class="form-control pill-input"
                                                    placeholder="Ponencia">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Reunión de coordinación</label>
                                                <input type="text" name="coordinacion" class="form-control pill-input"
                                                    placeholder="Reunion de coordinación">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------- DASHBOARD ----------------------------------------------------------------------- -->

                    <!-- <div class="tab-pane fade" id="dashboard">
                        <div class="container-fluid mt-4">
                            <div class="row text-center">
                                <div class="col-md-3">
                                    <div class="card p-3">
                                        <h6>Pendientes</h6>
                                        <h3 id="kpiPendientes">0</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card p-3">
                                        <h6>Atendidos</h6>
                                        <h3 id="kpiAtendidos">0</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card p-3">
                                        <h6>Sección 2</h6>
                                        <h3 id="kpiSeccion2">0</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card p-3">
                                        <h6>Internos / Externos</h6>
                                        <h3>
                                            <span id="kpiInternos">0</span> /
                                            <span id="kpiExternos">0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card p-3">
                                        <h5 class="text-center">Pendientes por persona</h5>
                                        <canvas id="pendientesPorPersona"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card p-3">
                                        <h5 class="text-center">Internos vs Externos</h5>
                                        <canvas id="internosExternos"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Oficios atendidos por mes</h5>

                                            <select id="filtroAnio" class="form-select w-auto">
                                                <option value="2025">2025</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>

                                        <canvas id="atendidosPorMes"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card p-3">
                                        <h5 class="text-center">Oficios registrados por área</h5>
                                        <canvas id="oficiosPorArea"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card p-3">
                                        <h5 class="text-center">Tipos de trámite</h5>
                                        <canvas id="tramitesPorTipo"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="tab-pane fade" id="dashboard">
                        <div class="dashboard-bg container-fluid py-4">

                            <!-- ===== KPIs ===== -->
                            <div class="row g-4 mb-4">

                                <div class="col-md-4">
                                    <div class="kpi-gradient kpi-orange">
                                        <div>
                                            <h2 id="kpiPendientes">1256</h2>
                                            <p>Pendientes</p>
                                        </div>
                                        <div class="kpi-icon">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="kpi-gradient kpi-purple">
                                        <div>
                                            <h2 id="kpiAtendidos">102</h2>
                                            <p>Atendidos</p>
                                        </div>
                                        <div class="kpi-icon">
                                            <i class="bi bi-check2-circle"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="kpi-gradient kpi-blue">
                                        <div>
                                            <h2 id="kpiSeccion2">102</h2>
                                            <p>Sección 2</p>
                                        </div>
                                        <div class="kpi-icon">
                                            <i class="bi bi-diagram-3"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ===== FILA PRINCIPAL ===== -->
                            <div class="row g-4 mb-4">

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="mb-0">Oficios atendidos</h5>

                                    <select id="filtroAnio" class="form-select form-select-sm w-auto">
                                        <option value="2025">2025</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>

                                <canvas id="atendidosPorMes"></canvas>


                                <div class="col-md-4">
                                    <div class="card dashboard-card">
                                        <h5 class="mb-3">Internos vs Externos</h5>
                                        <canvas id="internosExternos"></canvas>
                                    </div>
                                </div>

                            </div>

                            <!-- ===== FILA INFERIOR ===== -->
                            <div class="row g-4">

                                <div class="col-md-8">
                                    <div class="card dashboard-card">
                                        <h5 class="mb-3">Oficios por área</h5>
                                        <canvas id="oficiosPorArea"></canvas>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card dashboard-card">
                                        <h5 class="mb-3">Tipos de trámite</h5>
                                        <canvas id="tramitesPorTipo"></canvas>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="<?= base_url('/asset/js/Registro.js') ?>"></script>
</body>

</html>