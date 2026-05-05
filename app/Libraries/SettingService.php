<?php

namespace App\Libraries;

use Config\Database;
use Config\Services;

class SettingService
{
    protected $db;
    protected $cache;
    protected $cachePrefix = 'site_settings_';

    public function __construct()
    {
        $this->db = Database::connect();
        $this->cache = Services::cache();
    }

    public function get($key, $default = null)
    {
        $cacheKey = $this->cachePrefix . $key;
        
        if ($cached = $this->cache->get($cacheKey)) {
            return $cached;
        }

        $setting = $this->db->table('site_settings')
                            ->where('setting_key', $key)
                            ->get()
                            ->getRow();

        if ($setting) {
            $value = $setting->setting_value;
            // Handle boolean type
            if ($setting->setting_type === 'boolean') {
                $value = (bool) $value;
            }
            // Handle JSON type
            if ($setting->setting_type === 'json' && !empty($value)) {
                $value = json_decode($value, true);
            }

            $this->cache->save($cacheKey, $value, 3600); // Cache for 1 hour
            return $value;
        }

        return $default;
    }

    public function getAll($group = null)
    {
        $builder = $this->db->table('site_settings');
        if ($group) {
            $builder->where('group_name', $group);
        }
        
        $settings = $builder->get()->getResult();
        $result = [];
        foreach ($settings as $s) {
            $value = $s->setting_value;
            if ($s->setting_type === 'boolean') $value = (bool) $value;
            if ($s->setting_type === 'json' && !empty($value)) $value = json_decode($value, true);
            $result[$s->setting_key] = $value;
        }
        return $result;
    }

    public function clearCache()
    {
        // Simple way is to just delete all prefixed
        // but CI4 cache doesn't support deleteByPrefix easily across all handlers.
        // For production, we'd iterate or use a specific tag.
        // For now, we'll just clear the whole cache if needed or let it expire.
        return $this->cache->clean();
    }
}
