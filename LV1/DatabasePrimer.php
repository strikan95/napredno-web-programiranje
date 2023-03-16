<?php

namespace LV1;

use Exception;
use PDO;

/*$db = new \PDO('sqlite:host=localhost;dbname=test;', 'root');
var_dump($db);*/

try {
    $db = new PDO("sqlite:".__DIR__."/lv1.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch (Exception $e) {
    echo "Unable to connect";
    echo $e->getMessage();
    exit;
}

$statement = '
    CREATE TABLE papers(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(2048),
        content VARCHAR(2048),
        url VARCHAR(2048),
        oib VARCHAR(2048)
     )';

$db->exec($statement);
