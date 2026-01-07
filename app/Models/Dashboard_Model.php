<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_Model extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function totalAtendidos()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            WHERE e.estado = 'Archivado'
        ")->getRow()->total ?? 0;
    }

    public function atendidosPorPersona()
    {
        return $this->db->query("
            SELECT p.nombre_responsable, COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            WHERE e.estado = 'Archivado'
            GROUP BY p.nombre_responsable
        ")->getResultArray();
    }

    public function totalTramite()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            WHERE e.estado = 'Tramite'
        ")->getRow()->total ?? 0;
    }

    public function tramitePorPersona()
    {
        return $this->db->query("
            SELECT p.nombre_responsable, COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            WHERE e.estado = 'Tramite'
            GROUP BY p.nombre_responsable
        ")->getResultArray();
    }

    public function totalPendientes()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            WHERE e.estado = 'Pendiente'
        ")->getRow()->total ?? 0;
    }

    public function pendientesPorPersona()
    {
        return $this->db->query("
            SELECT p.nombre_responsable, COUNT(*) AS total
            FROM oficio o
            JOIN estado e ON o.folio_estado = e.folio_estado
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            WHERE e.estado = 'Pendiente'
            GROUP BY p.nombre_responsable
        ")->getResultArray();
    }

    public function oficiosPorMes()
    {
        return $this->db->query("
            SELECT DATE_FORMAT(ro.fecha_recepcion, '%Y-%m') AS mes, COUNT(*) AS total
            FROM oficio o
            JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
            GROUP BY mes
            ORDER BY mes
        ")->getResultArray();
    }

    /* public function oficiosPorMesPorPersona()
    {
        return $this->db->query("
            SELECT DATE_FORMAT(ro.fecha_recepcion, '%Y-%m') AS mes, p.nombre_responsable, COUNT(*) AS total
            FROM oficio o
            JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            GROUP BY mes, p.nombre_responsable
            ORDER BY mes
        ")->getResultArray();
    } */

    public function oficiosPorPersonaAnioMes()
{
    return $this->db->query("
        SELECT 
            p.nombre_responsable,
            YEAR(ro.fecha_recepcion) AS anio,
            MONTH(ro.fecha_recepcion) AS mes_num,
            DATE_FORMAT(MIN(ro.fecha_recepcion), '%M') AS mes_nombre,
            COUNT(*) AS total
        FROM oficio o
        JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
        JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
        JOIN personal p ON sr.folio_personal = p.folio_personal
        GROUP BY 
            p.nombre_responsable,
            anio,
            mes_num
        ORDER BY 
            p.nombre_responsable,
            anio DESC,
            mes_num
    ")->getResultArray();
}


    public function totalInternos()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN remitente r ON o.folio_remitente = r.folio_remitente
            JOIN titular t ON r.folio_titular = t.folio_titular
            JOIN tipo_area ta ON t.folio_area = ta.folio_area
            WHERE ta.nombre_area = 'Interna'
        ")->getRow()->total ?? 0;
    }

    public function internosPorArea()
    {
        return $this->db->query("
            SELECT s.nombre_seccion, COUNT(*) AS total
            FROM oficio o
            JOIN remitente r ON o.folio_remitente = r.folio_remitente
            JOIN titular t ON r.folio_titular = t.folio_titular
            JOIN tipo_area ta ON t.folio_area = ta.folio_area
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            JOIN seccion s ON p.folio_seccion = s.folio_seccion
            WHERE ta.nombre_area = 'Interna'
            GROUP BY s.nombre_seccion
        ")->getResultArray();
    }

    public function totalExternos()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN remitente r ON o.folio_remitente = r.folio_remitente
            JOIN titular t ON r.folio_titular = t.folio_titular
            JOIN tipo_area ta ON t.folio_area = ta.folio_area
            WHERE ta.nombre_area = 'Externa'
        ")->getRow()->total ?? 0;
    }

    public function externosPorArea()
    {
        return $this->db->query("
            SELECT s.nombre_seccion, COUNT(*) AS total
            FROM oficio o
            JOIN remitente r ON o.folio_remitente = r.folio_remitente
            JOIN titular t ON r.folio_titular = t.folio_titular
            JOIN tipo_area ta ON t.folio_area = ta.folio_area
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            JOIN seccion s ON p.folio_seccion = s.folio_seccion
            WHERE ta.nombre_area = 'Externa'
            GROUP BY s.nombre_seccion
        ")->getResultArray();
    }

    public function totalSeccion2()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM oficio o
            JOIN seccion_responsable sr ON o.folio_sec_resp = sr.folio_sec_resp
            JOIN personal p ON sr.folio_personal = p.folio_personal
            JOIN seccion s ON p.folio_seccion = s.folio_seccion
            WHERE s.nombre_seccion = 'Sección II'
        ")->getRow()->total ?? 0;
    }

    public function totalPorSolicitud()
    {
        return $this->db->query("
            SELECT 
              CASE
                WHEN LOWER(s.solicitud) LIKE '%enlace%' 
                  OR LOWER(s.solicitud) LIKE '%vincul%' 
                  OR LOWER(s.solicitud) LIKE '%coordina%' 
                  THEN 'Enlaces'

                WHEN LOWER(s.solicitud) LIKE '%capacit%' 
                  OR LOWER(s.solicitud) LIKE '%taller%' 
                  OR LOWER(s.solicitud) LIKE '%adiestra%' 
                  THEN 'Capacitaciones'

                WHEN LOWER(s.solicitud) LIKE '%curso%' 
                  OR LOWER(s.solicitud) LIKE '%seminar%' 
                  THEN 'Cursos'

                WHEN LOWER(s.solicitud) LIKE '%reunion%' 
                  OR LOWER(s.solicitud) LIKE '%reunión%' 
                  OR LOWER(s.solicitud) LIKE '%junta%' 
                  OR LOWER(s.solicitud) LIKE '%sesion%' 
                  OR LOWER(s.solicitud) LIKE '%sesión%' 
                  THEN 'Reuniones'

                WHEN LOWER(s.solicitud) LIKE '%mesa%' 
                  OR LOWER(s.solicitud) LIKE '%foro%' 
                  OR LOWER(s.solicitud) LIKE '%encuentro%' 
                  THEN 'Mesas de trabajo'

                ELSE 'Otros'
              END AS categoria,
              COUNT(*) AS total
            FROM oficio o
            JOIN solicitud s ON o.folio_solicitud = s.folio_solicitud
            GROUP BY categoria
            ORDER BY total DESC
        ")->getResultArray();
    }
}
