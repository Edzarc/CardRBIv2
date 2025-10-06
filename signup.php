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
  <link rel="stylesheet" href="styles/account.css">
</head>
<body>

  <div class="login-container">
    <!-- Left Column - Sign Up Form -->
    <div class="login-form-column">
      <div class="logo-section">
        <div class="logo-card-rbi">
          <a href="index.php"><img src="https://www.cardmri.com/rbi/wp-content/uploads/2020/01/CMRBI-1.png" alt="CARD RBI Logo"></a>
        </div>
      </div>

      <h2>Create an Account</h2>
      <p>Fill in your details to get started.</p>

      <form method="POST" action="PHP/signup.php">
        <!-- First Name -->
        <div class="form-group">
          <label for="first_name">First Name</label>
          <div class="input-wrapper">
            <i class="fas fa-user icon"></i>
            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
          </div>
        </div>

        <!-- Last Name -->
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <div class="input-wrapper">
            <i class="fas fa-user icon"></i>
            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope icon"></i>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
        </div>

        <!-- Password -->
        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock icon"></i>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
            <i class="fas fa-eye-slash icon password-toggle" id="togglePasswordIcon" style="cursor:pointer;"></i>
          </div>
          <small>Use 8 or more characters.</small>
        </div>
        
        <button type="submit" name="signup" class="btn-primary">Sign Up</button>
      </form>

      <div class="signup-link">
        Already have an account? <a href="login.php">Sign in</a>
      </div>
    </div>

    <!-- Right Column - Welcome -->
    <div class="welcome-column">
      <div class="background-shape-1"></div>
      <div class="background-shape-2"></div>
      <div class="welcome-card">
        <div class="icon-illustration">
          <i class="fas fa-users"></i>
        </div>
        <h3>Join CARD RBI</h3>
        <p>Be part of our mission to empower communities through microfinance services.</p>
        <a href="index.php" class="btn-secondary">Back to Home</a>
      </div>
    </div>
  </div>

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

