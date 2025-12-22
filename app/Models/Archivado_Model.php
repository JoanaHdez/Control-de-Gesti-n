<?php

namespace App\Models;

use CodeIgniter\Model;

class Archivado_Model extends Model{

    protected $table = 'archivo';
    protected $primaryKey = 'folio_archivo';

    protected$allowedFields = [
        'archivo'
    ];

    protected$returnType = 'array';
}