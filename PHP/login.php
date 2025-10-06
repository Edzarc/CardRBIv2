<?php
// login.php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'database.php';

if (isset($_SESSION['role'])) {
    header('Location: verifySection.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['id'] = $user['id'];
            

                if ($user['role'] === 'admin') {
                    $_SESSION['role'] = "admin";
                    header("Location: http://localhost/CardRBIv2/index.php");
                    exit;
                }
                else{
                    $_SESSION['role'] = "client";
                }

                header("Location: http://localhost/CardRBIv2/verifySection.php");
                exit;
            } else {
                $error = "Invalid email or password!";
                $_SESSION['error_message'] = $error;
                header("Location: http://localhost/CardRBIv2/login.php");
            }
        } catch (PDOException $e) {
            // Handle database errors
            $error = "An error occurred. Please try again later.";
            $_SESSION['error_message'] = $error;
            header("Location: http://localhost/CardRBIv2/login.php");
        }
    } else {
        $error = "Please enter a valid email and password.";
        $_SESSION['error_message'] = $error;
        header("Location: http://localhost/CardRBIv2/login.php");
    }
}
?>

