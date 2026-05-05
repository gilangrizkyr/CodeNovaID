<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model
{
    protected $table            = 'media_library';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['filename', 'file_type', 'file_size', 'file_path', 'thumb_path', 'alt_text'];

    protected $useTimestamps = true;
}
