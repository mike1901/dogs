<?php

define('DIR', __DIR__);
define('APP', DIR . '/src');

require_once APP . '/app.php';
\app\Application::init();

/**
 * Загрузка из CSV
 */
$client = \app\Application::run(new \providers\DogCsv(DIR . '/src/runtime/files/dogs.csv'));
$client->fill();
$client->render();
$client->saveOnBase();

/**
 * Загрузка из XML
 */
$client = \app\Application::run(new \providers\DogXml(DIR . '/src/runtime/files/dogs.xml'));
$client->fill();
$client->render();
$client->saveOnBase();