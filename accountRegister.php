<?php
session_start();
include("header.php");
require("PHP/database.php");
if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//SANITIZE THIS!!!!!!!!!!!!!!!!!!
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $password = $_POST['password'];


    $hash = password_hash($password, PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, password_hash, role, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $hash, $role, $email]);
        $msg = "User ($role) created successfully.";
    } catch (PDOException $e) {
        $msg = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD RBI</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Reuse account.css (same as login page) -->
    <link rel="stylesheet" href="styles/accountRegister.css">
</head>
<body>
    
    <form method="POST" action= <?php $_SERVER['PHP_SELF']?>>

        <h1>Create Staff Account</h1>

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
            <!-- <small>Use 8 or more characters.</small> -->
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

        <!-- 
        <div class="form-group"> 
            <label for="branch">Branch</label>
            <div class="input-wrapper">
                <input type="text" id="branch" name="branch" required>
            </div>
        </div>
        -->
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
        <button type="submit" name="signup" class="btn-primary">Sign Up</button>
    </form>
    
    <script>
      // Toggle password visibility
      document.getElementById('togglePasswordIcon').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          this.classList.remove('fa-eye-slash');
          this.classList.add('fa-eye');
        } else {
          passwordInput.type = 'password';
          this.classList.remove('fa-eye');
          this.classList.add('fa-eye-slash');
        }
      });
    </script>

</body>
</html>