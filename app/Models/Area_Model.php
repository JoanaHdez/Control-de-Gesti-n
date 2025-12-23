<?php

namespace App\Models;

use CodeIgniter\Model;

class Area_Model extends Model{
    protected $table = 'tipo_area';
    protected $primaryKey = 'folio_area';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nombre_area'
    ];

 }