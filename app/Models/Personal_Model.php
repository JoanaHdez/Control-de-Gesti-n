<?php

namespace App\Models;

use CodeIgniter\Model;

class Personal_Model extends Model{

    protected $table = 'personal';
    protected $primaryKey = 'folio_personal';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nombre_responsable',
        'folio_seccion'
    ];

}