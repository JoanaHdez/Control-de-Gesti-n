<?php

namespace App\Models;

use CodeIgniter\Model;

class Cargo_Model extends Model{

    protected $table = 'cargo';
    protected $primaryKey = 'folio_cargo';

    protected $allowedFields = [
        'cargo'
    ];

    protected $returnType = 'array';
}