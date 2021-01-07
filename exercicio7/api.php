<?php
# === constants
# ==================================================
define("_APP", dirname(__FILE__) . '/app');

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

# === slim
# ==================================================
require 'vendor/autoload.php';
$app = new \Slim\App($configuration);

# === models
# ==================================================
require_once _APP . "/models/usuarioModel.php";

# === controllers
# ==================================================
require_once _APP . "/controllers/usuarioController.php";

# === run slim
$app->run();