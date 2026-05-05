<?php
require 'vendor/autoload.php';
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();
$settings = $db->table('site_settings')->get()->getResult();

foreach ($settings as $s) {
    echo "{$s->setting_key}: {$s->setting_value}\n";
}
