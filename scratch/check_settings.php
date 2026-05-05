<?php
require 'app/Config/Database.php';
$db = \Config\Database::connect();
$groups = $db->table('site_settings')->select('group_name')->distinct()->get()->getResultArray();
echo "Groups in DB: " . implode(', ', array_column($groups, 'group_name')) . "\n";

$settingsCount = $db->table('site_settings')->countAllResults();
echo "Total Settings: " . $settingsCount . "\n";
