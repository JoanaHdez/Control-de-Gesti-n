<?php

namespace App\Models;

use CodeIgniter\Model;

class Area_Model extends Model{
    protected $table = 'area';
    protected $primaryKey = 'folio_area';

    protected$allowedFields = [
        'area'
    ];

    protected $returnType = 'array';
 }