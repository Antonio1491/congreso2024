<?php
session_start();

require_once __DIR__ . '/funciones.php';
require_once __DIR__ . '/classPoster.php';

$evento = isset($_SESSION['evento']) ? (int)$_SESSION['evento'] : 2;

$posters = new Posters();
$posters->getPosters($evento);