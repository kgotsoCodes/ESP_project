<?php 
session_start();

//require and include all the necessarily files and classes
require 'core/connect/database.php';
require 'core/classes/uploader.php';





//instantiate class objects

$Uploader		= new Uploader($db);

$errors = array();



ob_start(); // Added to avoid a common error of 'header already sent'