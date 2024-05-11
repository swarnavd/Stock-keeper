<?php

require_once __DIR__ . '/Query.php';

$stocks = $ob->fetchStock($_SESSION['email']);
