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
