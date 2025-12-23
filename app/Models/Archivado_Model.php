<?php

namespace App\Models;

use CodeIgniter\Model;

class Archivado_Model extends Model{

    protected $table = 'archivado';
    protected $primaryKey = 'folio_archivado';
    protected $returnType = 'array';

    protected $allowedFields = [
        'archivado'
    ];

}