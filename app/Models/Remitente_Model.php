<?php

namespace App\Models;

use CodeIgniter\Model;

class Remitente_Model extends Model
{
    protected $table      = 'remitente';       // Tabla principal
    protected $primaryKey = 'folio_remitente'; // PK de la tabla

    protected $allowedFields = ['folio_titular']; // Campos que se pueden insertar/actualizar
}
