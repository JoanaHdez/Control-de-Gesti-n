<?php

namespace App\Models;

use CodeIgniter\Model;

class Personal_Model extends Model{

    protected $table = 'personal';
    protected $primaryKey = 'folio_personal';

    protected $allowedFields = [
        'nombre',
        'folio_seccion'
    ];

    protected $returnType = 'array';
}