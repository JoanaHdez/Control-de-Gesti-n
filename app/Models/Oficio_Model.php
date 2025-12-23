<?php

namespace App\Models;

use CodeIgniter\Model;

class Oficio_Model extends Model{

    protected $table =  'oficio';
    protected $primaryKey = 'id_folio';

    protected $allowedFields = [
        'folio_registro',
        'folio_remitente',
        'folio_solicitud',
        'folio_atencion',
        'folio_estado',
        'folio_archivado',
        'folio_personal',
        'folio_seccion',
        'folio_pr'
    ];

    public function getOficiosConDatos(){
        return $this->select([
            'oficio.id_folio',
            'oficio.folio_registro',

            't.nombre_titular',

            's.solicitud',

            'da.asunto',
            'da.fecha_contestacion',

            'e.estado',

            'pr.ponencia',
            'pr.reunion',
        ])

        ->join('titular t', 'oficio.folio_remitente = t.folio_titular')
        ->join('solicitud s', 'oficio.folio_solicitud = s.folio_solicitud')
        ->join('descripcion_atencion da', 'oficio.folio_atencion = da.folio_atencion')
        ->join('estado e', 'oficio.folio_estado = e.folio_estado')
        ->join('ponencia_reunion pr', 'oficio.folio_pr = pr.folio_pr', 'left')
        ->orderBy('oficio.id_folio', 'DESC')
        ->findAll();
    }
}
