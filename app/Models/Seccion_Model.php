<?php

namespace App\Models;

use CodeIgniter\Model;

class Seccion_Model extends Model{

    protected $table = 'seccion';
    protected $primaryKey = 'folio_seccion';

    protected $allowedFields = [
        'seccion'
    ];

    protected $returnType = 'array';
}