<?php
session_start();
include("header.php");
require("PHP/database.php");
if (!isset($_SESSION['first_name']) || $_SESSION['role'] != "admin") {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD RBI - Sign Up</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Reuse account.css (same as login page) -->
    <link rel="stylesheet" href="styles/accountRegister.css">
</head>

<body>

    <form method="post">
        <h2 style="text-align:center; color:#111;">Add Staff/Manager</h2>
        <?php if (!empty($msg)) echo "<p style='color:green; text-align:center;'>$msg</p>"; ?>
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Full Name</label>
        <input type="text" name="full_name">
        <label>Email</label>
        <input type="email" name="email">
        <label>Role</label>
        <select name="role">
            <option value="staff">Staff</option>
            <option value="manager">Manager</option>
        </select>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit" class="btn">Create</button>
    </form>

    <form method="POST" action="PHP/signup.php">
        <!-- First Name -->
        <div class="form-group">
            <label for="first_name">First Name</label>
            <div class="input-wrapper">
                <input type="text" id="first_name" name="first_name" required>
            </div>
        </div>

        <!-- Last Name -->

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <div class="input-wrapper">
                <input type="text" id="last_name" name="last_name" required>
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-wrapper">
                <input type="email" id="email" name="email" required>
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye-slash icon password-toggle" id="togglePasswordIcon" style="cursor:pointer;"></i>
            </div>
            <small>Use 8 or more characters.</small>
        </div>


        <div class="form-group">
            <label for="role">Role</label>
            <div class="input-wrapper">
                <select id="role" name="role" required style="width:100%;padding:12px;border:1px solid var(--border-color);border-radius:8px;">
                    <option value="Loan Officer">Loan Officer</option>
                    <option value="Manager">Manager</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="branch">Branch</label>
            <div class="input-wrapper">
                <input type="text" id="branch" name="branch" required>
            </div>
        </div>
    </form>

</body>

</html>