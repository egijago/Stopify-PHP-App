<?php
require_once(PROJECT_ROOT_PATH . "/src/utils/EnvLoader.php");
$env = new EnvLoader(PROJECT_ROOT_PATH . "/.env");
$env->load();