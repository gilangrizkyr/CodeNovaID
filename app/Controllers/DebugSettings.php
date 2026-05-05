<?php

namespace App\Controllers;

class DebugSettings extends BaseController
{
    public function index()
    {
        $keys = ['company_whatsapp', 'company_phone', 'whatsapp_business_url'];
        foreach ($keys as $key) {
            echo $key . ": " . get_setting($key, 'NOT_FOUND') . "\n";
        }
    }
}
