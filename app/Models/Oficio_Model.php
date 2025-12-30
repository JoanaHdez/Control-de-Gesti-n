<?php

namespace App\Models;

use CodeIgniter\Model;

class Oficio_Model extends Model
{

    protected $table      = 'oficio';
    protected $primaryKey = 'folio_registro';


    protected $allowedFields = [
        'folio_registro',
        'folio_remitente',
        'folio_solicitud',
        'folio_atencion',
        'folio_estado',
        'folio_pr',
        'folio_sec_resp'
    ];

    public function getGeneral()
    {
        return $this->select([
            'ro.folio_registro',
            'ro.fecha_oficio',
            'ro.referencia',
            'tt.tramite AS tramite',
            's.solicitud',
            'e.estado'
        ])
            ->join('registro_oficio ro', 'ro.folio_registro = oficio.folio_registro')
            ->join('solicitud s', 's.folio_solicitud = oficio.folio_solicitud')
            ->join('tipo_tramite tt', 'tt.folio_tramite = s.folio_tramite') // 👈 nombre real
            ->join('estado e', 'e.folio_estado = oficio.folio_estado')
            ->orderBy('ro.folio_registro', 'DESC')
            ->findAll();
    }

    public function getPendientes()
    {
        return $this->select([
            'p.nombre_responsable AS responsable',
            'ro.folio_registro',
            'ro.fecha_oficio',
            'ro.referencia',
            's.solicitud',
            'e.estado'
        ])
            ->join('seccion_responsable sr', 'sr.folio_sec_resp = oficio.folio_sec_resp')
            ->join('personal p', 'p.folio_personal = sr.folio_personal', 'left')
            ->join('registro_oficio ro', 'ro.folio_registro = oficio.folio_registro')
            ->join('solicitud s', 's.folio_solicitud = oficio.folio_solicitud')
            ->join('estado e', 'e.folio_estado = oficio.folio_estado')
            ->orderBy('ro.folio_registro', 'DESC')
            ->findAll();
    }

    public function obtenerDetallesPorFolio($folio)
    {
        return $this->db->table('oficio o')
            ->select('
            ro.folio_registro,
            ro.fecha_oficio,
            ro.referencia,
            ro.fecha_recepcion,

            t.nombre_titular,
            c.nombre_cargo,
            a.nombre_area,

            tt.tramite,
            s.solicitud,

            da.oficio_contestacion,
            da.fecha_contestacion,
            da.asunto,

            e.estado,

            p.nombre_responsable,
            sec.nombre_seccion,

            pr.ponencia,
            pr.reunion
        ')

            /* ===== REGISTRO ===== */
            ->join('registro_oficio ro', 'ro.folio_registro = o.folio_registro')

            /* ===== REMITENTE ===== */
            ->join('remitente r', 'r.folio_remitente = o.folio_remitente')
            ->join('titular t', 't.folio_titular = r.folio_titular')
            ->join('cargo c', 'c.folio_cargo = t.folio_cargo')
            ->join('tipo_area a', 'a.folio_area = t.folio_area')

            /* ===== SOLICITUD ===== */
            ->join('solicitud s', 's.folio_solicitud = o.folio_solicitud')
            ->join('tipo_tramite tt', 'tt.folio_tramite = s.folio_tramite')

            /* ===== DESCRIPCIÓN ===== */
            ->join('descripcion_atencion da', 'da.folio_atencion = o.folio_atencion', 'left')

            /* ===== ESTADO ===== */
            ->join('estado e', 'e.folio_estado = o.folio_estado')

            /* ===== SECCIÓN ===== */
            ->join('seccion_responsable sr', 'sr.folio_sec_resp = o.folio_sec_resp', 'left')
            ->join('personal p', 'p.folio_personal = sr.folio_personal', 'left')
            ->join('seccion sec', 'sec.folio_seccion = p.folio_seccion', 'left')

            /* ===== PONENCIA ===== */
            ->join('ponencia_reunion pr', 'pr.folio_pr = o.folio_pr', 'left')

            ->where('o.folio_registro', $folio)
            ->get()
            ->getRowArray();
    }

    public function obtenerDetallesParaEditar($folio)
{
    return $this->db->table('oficio o')
        ->select('
            o.folio_registro,
            ro.fecha_oficio,
            ro.referencia,
            ro.fecha_recepcion,

            r.folio_remitente,
            t.nombre_titular,
            c.nombre_cargo,
            a.nombre_area,

            s.folio_solicitud,
            tt.folio_tramite,
            tt.tramite,
            s.solicitud,

            da.folio_atencion,
            da.oficio_contestacion,
            da.fecha_contestacion,
            da.asunto,

            e.folio_estado,
            e.estado,

            sr.folio_sec_resp,
            sec.nombre_seccion,

            pr.folio_pr,
            pr.ponencia,
            pr.reunion
        ')
        ->join('registro_oficio ro', 'ro.folio_registro = o.folio_registro')
        ->join('remitente r', 'r.folio_remitente = o.folio_remitente')
        ->join('titular t', 't.folio_titular = r.folio_titular')
        ->join('cargo c', 'c.folio_cargo = t.folio_cargo')
        ->join('tipo_area a', 'a.folio_area = t.folio_area')

        ->join('solicitud s', 's.folio_solicitud = o.folio_solicitud')
        ->join('tipo_tramite tt', 'tt.folio_tramite = s.folio_tramite')

        ->join('descripcion_atencion da', 'da.folio_atencion = o.folio_atencion', 'left')
        ->join('estado e', 'e.folio_estado = o.folio_estado')

        ->join('seccion_responsable sr', 'sr.folio_sec_resp = o.folio_sec_resp', 'left')
        ->join('personal p', 'p.folio_personal = sr.folio_personal', 'left')
        ->join('seccion sec', 'sec.folio_seccion = p.folio_seccion', 'left')

        ->join('ponencia_reunion pr', 'pr.folio_pr = o.folio_pr', 'left')

        ->where('o.folio_registro', $folio)
        ->get()
        ->getRowArray();
}


}
