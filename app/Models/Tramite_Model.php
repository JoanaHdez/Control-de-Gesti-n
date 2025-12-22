<?php

namespace App\Models;

use CodeIgniter\Model;

class Tramite_Model extends Model{

    protected $table = 'tramite';
    protected $primaryKey = 'folio_tramite';

    protected $allowedFields = [
        'tramite'
    ];

    protected $returnType = 'array';
}