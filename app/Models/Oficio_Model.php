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
}
