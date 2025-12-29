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

document
  .getElementById("folio_sec_resp")
  .addEventListener("change", function () {
    let selected = this.options[this.selectedIndex];
    document.getElementById("folio_seccion").value =
      selected.dataset.seccion || "";
  });

console.log("JS cargado");

console.log("JS cargado");

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

          document.getElementById("archivado").value = d.archivado;
          document.getElementById("estado").value = d.estado;

          document.getElementById("nombre_responsable").value =
            d.nombre_responsable;
          document.getElementById("nombre_seccion").value =
            d.nombre_seccion;

          document.getElementById("ponencia").value = d.ponencia ?? "No aplica";
          document.getElementById("reunion").value = d.reunion ?? "No aplica";
        })
        .catch(() => {
          alert("No se pudieron cargar los datos del oficio");
        });
    });
  });
});
