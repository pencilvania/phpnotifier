<?php

$db = new PDO(
    "pgsql:dbname=postgres host=localhost port=5432", 'postgres', 'postgres', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

$db->exec('LISTEN "firstEvent"');
while (true)
{
    $result = $db->pgsqlGetNotify(PDO::FETCH_ASSOC, 30000);
    echo json_encode($result) . PHP_EOL;
}