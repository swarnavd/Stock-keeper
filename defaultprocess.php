<?php

require_once __DIR__ . '/Query.php';

$ob = new Query();
$stocks = $ob->fetchAll();
