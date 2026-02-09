<?php
session_start();
require_once 'config/Database.php';
require_once 'controllers/AuthController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Verificar si el usuario está logueado
$isLoggedIn = isset($_SESSION['user_id']);

if (!$isLoggedIn && in_array($page, ['dashboard', 'referrals', 'profile'])) {
    header('Location: ?page=login');
    exit;
}

if ($isLoggedIn && in_array($page, ['login', 'register'])) {
    header('Location: ?page=dashboard');
    exit;
}

switch ($page) {
    case 'login':
        include 'views/login.php';
        break;
    case 'register':
        include 'views/register.php';
        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    case 'referrals':
        include 'views/referrals.php';
        break;
    case 'profile':
        include 'views/profile.php';
        break;
    case 'logout':
        session_destroy();
        header('Location: ?page=home');
        exit;
    default:
        include 'views/home.php';
}
?>