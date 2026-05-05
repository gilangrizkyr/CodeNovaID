<?php
define('FCPATH', __DIR__ . '/public/');
require_once 'app/Config/Paths.php';
$paths = new Config\Paths();
require_once 'system/Test/bootstrap.php';

$db = \Config\Database::connect();
$settings = $db->table('site_settings')->get()->getResult();

echo "KEY | VALUE | GROUP\n";
echo "--------------------\n";
foreach ($settings as $s) {
    echo "{$s->setting_key} | {$s->setting_value} | {$s->group_name}\n";
}
