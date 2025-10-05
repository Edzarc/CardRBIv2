<?php
    session_start();
    if (isset($_SESSION['first_name'])) {
        header("Location: verifySection.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD RBI - Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/account.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="login-container">
        <div class="login-form-column">
            <div class="logo-section">
                <div class="logo-card-rbi">
                    <a href="index.php"><img src="https://www.cardmri.com/rbi/wp-content/uploads/2020/01/CMRBI-1.png" alt="CARD RBI Logo"> </a>
                </div>
            </div>

            <h2>Sign in to CARD RBI</h2>
            <p>Enter your details to access our services.</p>

            <form action="PHP/login.php" method="POST" id="loginForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="password"  placeholder="Enter your password" required>
                        <i class="fas fa-eye-slash icon password-toggle" id="togglePasswordIcon" style="cursor:pointer;"></i>
                    </div>
                </div>
                <button type="submit" name="login" class="btn-primary">Sign in</button>
            </form>

            <?php
                if (!empty($_SESSION["error_message"])){
                    echo $_SESSION["error_message"];
                }
            ?>
            
            <div class="signup-link">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>
            
        </div>
        <div class="welcome-column">
            <div class="background-shape-1"></div>
            <div class="background-shape-2"></div>
            <div class="welcome-card">
                <div class="icon-illustration">
                    <i class="fas fa-car"></i>
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Welcome to CARD RBI</h3>
                <p>Empowering communities through microfinance: supporting families, small businesses, and brighter futures.</p>
                <a href="index.php" class="btn-secondary">Learn More</a>
            </div>
        </div>
    </div>

    <script>
        // Redirect to index.html after login
        /*
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            window.location.href = 'verifySection.php';
        });
        */

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