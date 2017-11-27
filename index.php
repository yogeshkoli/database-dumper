<?php

require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__ . '/');
$dotenv->load();

$file_name = getenv('BACKUP_PATH') . getenv('DB_DATABASE') . date('d_m_Y', time()) . '.sql';

Spatie\DbDumper\Databases\MySql::create()
    ->setDbName(getenv('DB_DATABASE'))
    ->setUserName(getenv('DB_USERNAME'))
    ->setPassword(getenv('DB_PASSWORD'))
    ->dumpToFile($file_name);