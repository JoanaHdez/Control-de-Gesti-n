<?php

namespace App\Models;

use CodeIgniter\Model;

class Tramite_Model extends Model{

    protected $table = 'tipo_tramite';
    protected $primaryKey = 'folio_tramite';
    protected $returnType = 'array';

    protected $allowedFields = [
        'tramite'
    ];

}