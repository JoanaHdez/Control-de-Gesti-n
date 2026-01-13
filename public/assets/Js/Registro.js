let estadoOriginal = null;
let modalArchivo = null;
let archivoTarget = null;

/*--------------------------------------- REMITENTE --------------------------------------- */

document.addEventListener("DOMContentLoaded", function () {
  const selectRemitente = document.getElementById("folio_remitente");
  const inputCargo = document.getElementById("folio_cargo"); // coincide con tu HTML
  const inputArea = document.getElementById("folio_area"); // coincide con tu HTML

  selectRemitente.addEventListener("change", function () {
    const selected = selectRemitente.options[selectRemitente.selectedIndex];
    inputCargo.value = selected.dataset.cargo || "";
    inputArea.value = selected.dataset.area || "";
  });
});

// PRINCIPAL
/* document.getElementById('archivo_pdf_main')?.addEventListener('change', function () {
    if (this.files.length > 0) {
        document.getElementById('nombreArchivoPdfMain').textContent = this.files[0].name;
    }
});
 */

/* --------------------------------------- MODAL --------------------------------------- */

document.addEventListener("DOMContentLoaded", function () {
  const modalElement = document.getElementById("modalArchivoEstado");
  if (modalElement) {
    modalArchivo = new bootstrap.Modal(modalElement);
  }

  const btnConfirmar = document.getElementById("btnConfirmarArchivo");

  if (btnConfirmar) {
    btnConfirmar.addEventListener("click", function () {
      if (archivoTarget) {
        archivoTarget.click(); // 👈 ABRE EL EXPLORADOR DE ARCHIVOS
        modalArchivo.hide(); // 👈 CIERRA EL MODAL
      }
    });
  }
});

/* --------------------------------------- BUSCADOR --------------------------------------- */

document.addEventListener("input", function (e) {
  if (e.target.id === "buscadorGeneral") {
    const filtro = e.target.value.toLowerCase();
    const filas = document.querySelectorAll(".tbody-scroll tbody tr");

    filas.forEach(function (fila) {
      const textoFila = fila.textContent.toLowerCase();

      if (textoFila.includes(filtro)) {
        fila.style.display = "";
      } else {
        fila.style.display = "none";
      }
    });
  }
});

/* --------------------------------------- DETALLES --------------------------------------- */

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".btn-detalles").forEach((btn) => {
    btn.addEventListener("click", () => {
      // 🔥 AQUÍ ESTABA EL ERROR
      const folio = btn.dataset.folio.trim();

      fetch(BASE_URL_DETALLES + encodeURIComponent(folio))
        .then((r) => {
          if (!r.ok) throw new Error();
          return r.json();
        })
        .then((d) => {
          console.log("DETALLES: ", d);
          document.getElementById("folio_registro").value = d.folio_registro;
          document.getElementById("fecha_oficio").value = d.fecha_oficio;
          document.getElementById("referencia").value = d.referencia;
          document.getElementById("fecha_recepcion").value = d.fecha_recepcion;

          document.getElementById("nombre_titular").value = d.nombre_titular;
          document.getElementById("nombre_cargo").value = d.nombre_cargo;
          document.getElementById("nombre_area").value = d.nombre_area;

          document.getElementById("tramite").value = d.tramite;
          document.getElementById("solicitud").value = d.solicitud;

          document.getElementById("oficio_contestacion").value =
            d.oficio_contestacion ?? "";
          document.getElementById("fecha_contestacion").value =
            d.fecha_contestacion ?? "";
          document.getElementById("asunto").value = d.asunto ?? "";

          document.getElementById("archivado").value =
            d.archivado_nombre ?? "Sin asignar";
          document.getElementById("estado").value = d.estado;

          document.getElementById("nombre_responsable").value =
            d.nombre_responsable;
          document.getElementById("nombre_seccion").value = d.nombre_seccion;
        })
        .catch(() => {
          alert("No se pudieron cargar los datos del oficio");
        });
    });
  });
});

/* --------------------------------------- DETECCION DE CAMBIO DE ESTADO --------------------------------------- */

// Cuando cambias estado en NUEVO
document
  .getElementById("folio_estado")
  ?.addEventListener("change", function () {
    const ID_ARCHIVADO = "1";
    if (this.value === ID_ARCHIVADO) {
      archivoTarget = document.getElementById("archivo_pdf_main"); // input del NUEVO
      modalArchivo?.show();
    }
  });

// Cuando cambias estado en EDITAR
document.getElementById("estado_edit")?.addEventListener("change", function () {
  const ID_ARCHIVADO = "1";
  if (this.value === ID_ARCHIVADO) {
    archivoTarget = document.getElementById("archivo_pdf_edit"); // input del EDITAR
    modalArchivo?.show();
  }
});

/* --------------------------------------- VALIDACION ANTES DE ENVIAR FORMULARIO --------------------------------------- */

/* document.querySelectorAll("form").forEach((form) => {
  form.addEventListener("submit", function (e) {
    let estado, archivoInput;

    // Detectar si es formulario NUEVO o EDITAR
    if (form.querySelector("#folio_estado")) {
      estado = form.querySelector("#folio_estado").value;
      archivoInput = form.querySelector("#archivo_pdf_main");
    } else if (form.querySelector("#estado_edit")) {
      estado = form.querySelector("#estado_edit").value;
      archivoInput = form.querySelector("#archivo_pdf_edit");
    }

    const ID_ARCHIVADO = "1";

    if (estado === ID_ARCHIVADO && archivoInput && archivoInput.files.length === 0) {
      e.preventDefault();  
      if (modalArchivo && archivoInput) {
        archivoTarget = archivoInput;  
        modalArchivo.show();
      }
      return false;
    }
  });
}); */

/* --------------------------------------- MOSTRAR NOMBRE DEL ARCHIVO --------------------------------------- */

document
  .getElementById("archivo_pdf_main")
  ?.addEventListener("change", function () {
    if (this.files.length > 0) {
      document.getElementById("nombreArchivoPdfMain").textContent =
        this.files[0].name;
    }
  });

document
  .getElementById("archivo_pdf_edit")
  ?.addEventListener("change", function () {
    if (this.files.length > 0) {
      document.getElementById("nombreArchivoPdfEdit").textContent =
        this.files[0].name;
    }
  });

/* --------------------------------------- EDITAR --------------------------------------- */

console.log("Registro.js cargado correctamente");

document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-editar");
  if (!btn) return;

  const folio = btn.dataset.folio.trim();
  console.log("FOLIO:", folio);

  fetch(BASE_URL_EDITAR + encodeURIComponent(folio))
    .then((response) => {
      console.log("STATUS:", response.status);

      if (!response.ok) throw new Error("Error en la respuesta");

      return response.json();
    })
    .then((d) => {
      console.log("Datos recibidos:", d);

      // ================= DATOS GENERALES =================
      document.getElementById("folio_original").value = d.folio_registro;

      console.log(
        "folio_original:",
        document.getElementById("folio_original").value
      );

      document.getElementById("folio_registro_edit").value =
        d.folio_registro ?? "";
      document.getElementById("fecha_oficio_edit").value = d.fecha_oficio ?? "";
      document.getElementById("referencia_edit").value = d.referencia ?? "";
      document.getElementById("fecha_recepcion_edit").value =
        d.fecha_recepcion ?? "";

      // ================= REMITENTE =================
      const remitenteSelect = document.getElementById("folio_remitente_edit");
      remitenteSelect.value = d.folio_remitente ?? "";
      remitenteSelect.dispatchEvent(new Event("change")); // 👈 CLAVE

      // ================= TRÁMITE =================
      document.getElementById("tramite_edit").value = d.folio_tramite ?? "";
      document.getElementById("solicitud_edit").value = d.solicitud ?? "";

      // ================= DESCRIPCIÓN =================
      document.getElementById("oficio_contestacion_edit").value =
        d.oficio_contestacion ?? "";
      document.getElementById("fecha_contestacion_edit").value =
        d.fecha_contestacion ?? "";
      document.getElementById("asunto_edit").value = d.asunto ?? "";

      // ================= ESTADO =================

      document.getElementById("folio_archivado_edit").value =
        d.folio_archivado ?? "";
      document.getElementById("estado_edit").value = d.folio_estado ?? "";

      // Guardamos estado original
      estadoOriginal = d.folio_estado ?? "";

      // Limpiamos archivo
      document.getElementById("archivo_pdf_edit").value = "";
      document.getElementById("nombreArchivoPdfEdit").textContent = "";

      // ================= SECCIÓN RESPONSABLE =================

      const secRespSelect = document.getElementById("folio_sec_resp_edit");
      secRespSelect.value = d.folio_sec_resp ?? "";
      secRespSelect.dispatchEvent(new Event("change")); // 👈 CLAVE

      // ================= ABRIR MODAL =================

      const modal = new bootstrap.Modal(document.getElementById("modalEditar"));
      modal.show();
    })
    .catch((err) => {
      console.error("ERROR:", err);
      alert("No se pudieron cargar los datos");
    });
});

// ================= DEPENDENCIAS =================

// Cargo / Área desde Remitente
document
  .getElementById("folio_remitente_edit")
  .addEventListener("change", function () {
    const selected = this.selectedOptions[0];
    document.getElementById("folio_cargo_edit").value =
      selected?.dataset.cargo || "";
    document.getElementById("folio_area_edit").value =
      selected?.dataset.area || "";
  });

// Sección desde Responsable
document
  .getElementById("folio_sec_resp_edit")
  .addEventListener("change", function () {
    const selected = this.selectedOptions[0];
    document.getElementById("folio_seccion_edit").value =
      selected?.dataset.seccion || "";
  });

document
  .getElementById("folio_sec_resp")
  ?.addEventListener("change", function () {
    const selected = this.selectedOptions[0];
    document.getElementById("folio_seccion").value =
      selected?.dataset.seccion || "";
  });

document.addEventListener("DOMContentLoaded", function () {
  const folioInput = document.querySelector('input[name="folio_registro"]');
  const form = folioInput.closest("form");

  // ================= CAMBIO EN FOLIO =================
  folioInput.addEventListener("input", function () {
    // Quitar mensaje de error inline
    const errorDiv = form.querySelector(".invalid-feedback");
    if (errorDiv) errorDiv.remove();

    // Quitar alert de Bootstrap si existe
    const alertDiv = form.querySelector(".alert-danger");
    if (alertDiv) alertDiv.remove();

    // Quitar clase de error
    folioInput.classList.remove("is-invalid");
  });

  // ================= OPCIONAL: Si ya vino con error desde backend =================
  if (
    folioInput &&
    folioInput.value &&
    form.querySelector(".invalid-feedback")
  ) {
    folioInput.value = "";
  }
});

/* --------------------------------------- REPORTE --------------------------------------- */

document.getElementById("btnDashboard").addEventListener("click", function () {
  const url = this.dataset.url;

  fetch(url)
    .then((res) => res.text())
    .then((html) => {
      document.getElementById("dashboardContent").innerHTML = html;
      new bootstrap.Modal(document.getElementById("dashboardModal")).show();
    });
});

function initTooltips() {
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  );
  tooltipTriggerList.forEach(function (el) {
    new bootstrap.Tooltip(el);
  });
}

// Ejecutar al cargar
initTooltips();

// Y volver a ejecutar cada vez que se cargue el dashboard en modal
document.addEventListener("shown.bs.modal", function () {
  initTooltips();
});

document.addEventListener("click", function (e) {
  // PERSONA
  const btnPersona = e.target.closest(".toggle-persona");
  if (btnPersona) {
    const content = btnPersona.nextElementSibling;
    if (content) {
      content.classList.toggle("d-none");
    }
    return;
  }

  // AÑO
  const btnAnio = e.target.closest(".toggle-anio");
  if (btnAnio) {
    const content = btnAnio.nextElementSibling;
    if (content) {
      content.classList.toggle("d-none");
    }
    return;
  }
});
