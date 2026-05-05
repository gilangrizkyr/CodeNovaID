<?php

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settingService = new \App\Libraries\SettingService();
        return $settingService->get($key, $default);
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}
