<?php 
/*Pradedama sesija*/
ob_start();
session_start();

/*Įtraukiami du .php failiukai prisijungimui prie DB ir tikrinimo funkcijos*/
include("db.php");
include("funkcijos.php");
?>