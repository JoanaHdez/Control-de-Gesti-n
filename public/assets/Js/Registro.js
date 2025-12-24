document.addEventListener("DOMContentLoaded", () => {

    const dashboardData = {
        pendientesTotal: 3,
        atendidosTotal: 12,
        seccion2Total: 5,
        internos: 8,
        externos: 4,

        atendidosPorMes: {
            2024: {
                "Enero": 1,
                "Febrero": 2,
                "Marzo": 3,
                "Abril": 2,
                "Mayo": 1
            },
            2025: {
                "Enero": 2,
                "Febrero": 3,
                "Marzo": 4,
                "Abril": 3,
                "Mayo": 2
            }
        },

        oficiosPorArea: {
            "Jurídico": 5,
            "Operativo": 7,
            "Administrativo": 3,
            "K9": 2,
            "Protección Animal": 4
        },

        tramitesPorTipo: {
            "Atención": 6,
            "Conocimiento": 5,
            "Trámite": 3,
            "Solicitud de Información": 2
        }
    };

    // ===== KPIs =====
    document.getElementById("kpiPendientes").textContent = dashboardData.pendientesTotal;
    document.getElementById("kpiAtendidos").textContent = dashboardData.atendidosTotal;
    document.getElementById("kpiSeccion2").textContent = dashboardData.seccion2Total;

    // ===== Internos vs Externos =====
    new Chart(document.getElementById('internosExternos'), {
        type: 'doughnut',
        data: {
            labels: ['Internos', 'Externos'],
            datasets: [{
                data: [dashboardData.internos, dashboardData.externos]
            }]
        }
    });

    // ===== Oficios por área =====
    new Chart(document.getElementById('oficiosPorArea'), {
        type: 'bar',
        data: {
            labels: Object.keys(dashboardData.oficiosPorArea),
            datasets: [{
                data: Object.values(dashboardData.oficiosPorArea)
            }]
        }
    });

    // ===== Tipos de trámite =====
    new Chart(document.getElementById('tramitesPorTipo'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(dashboardData.tramitesPorTipo),
            datasets: [{
                data: Object.values(dashboardData.tramitesPorTipo)
            }]
        }
    });

    // ===== Atendidos por mes (CON FILTRO DE AÑO) =====
    let chartAtendidosMes;

    function renderAtendidosPorMes(anio) {
        const dataMeses = dashboardData.atendidosPorMes[anio];

        if (chartAtendidosMes) {
            chartAtendidosMes.destroy();
        }

        chartAtendidosMes = new Chart(
            document.getElementById('atendidosPorMes'),
            {
                type: 'line',
                data: {
                    labels: Object.keys(dataMeses),
                    datasets: [{
                        label: `Atendidos ${anio}`,
                        data: Object.values(dataMeses),
                        tension: 0.3
                    }]
                }
            }
        );
    }

    const selectAnio = document.getElementById('filtroAnio');
    renderAtendidosPorMes(selectAnio.value);

    selectAnio.addEventListener('change', function () {
        renderAtendidosPorMes(this.value);
    });

});

document.addEventListener('DOMContentLoaded', function() {
    const selectRemitente = document.getElementById('folio_remitente');
    const inputCargo = document.getElementById('folio_cargo'); // coincide con tu HTML
    const inputArea = document.getElementById('folio_area');   // coincide con tu HTML

    selectRemitente.addEventListener('change', function() {
        const selected = selectRemitente.options[selectRemitente.selectedIndex];
        inputCargo.value = selected.dataset.cargo || '';
        inputArea.value = selected.dataset.area || '';
    });
});

document.getElementById('folio_sec_resp').addEventListener('change', function() {
    let selected = this.options[this.selectedIndex];
    document.getElementById('folio_seccion').value = selected.dataset.seccion || '';
});
