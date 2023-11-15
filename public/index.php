<?php 
require_once __DIR__ . "/../inc/bootstrap.php";
require_once PROJECT_ROOT_PATH . "/src/router/PageRouter.class.php";
session_start();

// Set refresh header to reload the page every minute
// header("refresh:60;url=http://localhost:8000/polling");

$page = new PageRouter($_SERVER['REQUEST_URI']);
$page->getPage();