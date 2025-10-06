<?php
    session_start();
    include("header.php");
    require("PHP/database.php");
    if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles/index.css" />
</head>
<body>
    
</body>
</html>