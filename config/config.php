<?php

$pdo = new PDO("mysql:host=localhost;dbname=shop;charset=utf8", "shop", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
