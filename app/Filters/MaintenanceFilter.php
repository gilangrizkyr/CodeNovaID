<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $db = Database::connect();
        $setting = $db->table('site_settings')
                      ->where('setting_key', 'maintenance_mode')
                      ->get()
                      ->getRow();

        if ($setting && $setting->setting_value == '1') {
            // Check if IP is allowed
            $allowedIpsSetting = $db->table('site_settings')
                                    ->where('setting_key', 'maintenance_allowed_ips')
                                    ->get()
                                    ->getRow();
            
            $allowedIps = $allowedIpsSetting ? explode(',', $allowedIpsSetting->setting_value) : ['127.0.0.1'];
            $currentIp = $request->getIPAddress();

            if (!in_array($currentIp, $allowedIps) && !str_contains($request->getUri()->getPath(), 'maintenance')) {
                // Also allow admin routes to be accessed even in maintenance
                if (!str_contains($request->getUri()->getPath(), 'admin')) {
                    return redirect()->to(base_url('maintenance'));
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
