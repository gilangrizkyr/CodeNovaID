<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteSettingModel extends Model
{
    protected $table            = 'site_settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'group_name', 'setting_key', 'setting_value', 'setting_type', 'label', 'options'
    ];

    protected $useTimestamps = false;

    /**
     * Get unique groups from the database.
     */
    public function getGroups()
    {
        return $this->select('group_name')
                    ->distinct()
                    ->orderBy('group_name', 'ASC')
                    ->findAll();
    }
}
