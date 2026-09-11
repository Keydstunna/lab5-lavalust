<?php

require_once __DIR__ . '/../helpers/app_url_helper.php';

class AuthController extends Controller
{
    // Show login form
    public function login()
    {
        session_start();
        if (isset($_SESSION['logged_in'])) {
            header('Location: ' . app_url('/products'));
            exit;
        }

        $error = isset($_GET['error']) ? 'Invalid username or password.' : null;
        $this->call->view('login_view', ['error' => $error]);
    }

    // Handle login form submission
    public function authenticate()
    {
        session_start();

        // Simple hardcoded credentials for this exercise
        $valid_username = 'admin';
        $valid_password = 'admin123';

        if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $_POST['username'];
            header('Location: ' . app_url('/products'));    
            exit;
        }

        header('Location: ' . app_url('/login?error=1'));
        exit;
    }

    // Logout
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ' . app_url('/login'));
        exit;
    }
}