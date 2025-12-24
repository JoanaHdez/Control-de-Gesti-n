<?php

namespace App\Models;

use CodeIgniter\Model;

class Seccion_Responsable_Model extends Model
{

    protected $table = 'seccion_responsable';
    protected $primaryKey = 'folio_sec_resp';
    protected $returnType = 'array';

    protected $allowedFields = [
        'folio_personal'
    ];

    public function getSeccionesResponsables()
    {
        return $this->select('seccion_responsable.folio_sec_resp, personal.nombre_responsable, seccion.nombre_seccion')
            ->join('personal', 'personal.folio_personal = seccion_responsable.folio_personal')
            ->join('seccion', 'seccion.folio_seccion = personal.folio_seccion')
            ->findAll();
    }
}
