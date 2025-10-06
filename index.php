<?php
    session_start();
    include("header.php");
    require("PHP/database.php");

    $payments = null;

    if(isset($_SESSION["id"])){
        try {
            $stmt = $pdo->prepare("SELECT p.payment_date, p.amount, p.method FROM payments p
                                          JOIN loans l ON p.loan_id = l.loan_id WHERE l.member_id = ? 
                                          ORDER BY p.payment_date DESC");//LIMIT 10??
            $stmt->execute([$_SESSION['id']]);
            $payments = $stmt->fetchAll();
        }
        catch (PDOException $e) {
            echo $e->getMessage();  //CHANGE THIS
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CARD RBI - Microfinance Services</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles/index.css" />

</head>
<body>

    <!-- Loan Payments -->
    <?php if (isset($_SESSION['id'])): ?>
        <div class="loan_historytb">
        <h3>Loan Payments History</h3>
        <table>
            <tr><th>Date</th><th>Amount</th><th>Method</th></tr>
            <?php if ($payments): ?>
            <?php foreach ($payments as $p): ?>
                <tr>
                <td><?= htmlspecialchars($p['payment_date']) ?></td>
                <td>₱<?= number_format($p['amount'],2) ?></td>
                <td><?= htmlspecialchars($p['method']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="3">No payments yet.</td></tr>
            <?php endif; ?>
        </table>
        </div>
    <?php endif; ?>

    <!--PAYMENT-->
    <?php if (isset($_SESSION['id'])): ?>
        <section class="action">
            <div>
                <p>Make Payment: </p><br>
                <a href="payLoan.php"><button class="upload">Pay Loan</button></a>
            </div>
        </section>
    <?php endif; ?>

    <!--ADMIN PAGE-->
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <section class="action">
            <div>
                <p>Go to admin page: </p><br>
                <a href="admin.php"><button class="upload">Admin Page</button></a>
            </div>
        </section>
    <?php endif; ?>
    
    <!--IMAGE PROOF OF LOAN-->
    <section class="action">
        <div>
            <p>Upload An Image Proof Of Your Loan Usage: </p><br>
            <a href="login.php"><button class="upload">Loan Verification</button></a>
        </div>
    </section>
    
    <!-- Hero Section -->
    <section class="hero" id="about">
        <div class="hero-content">
            <h1>Welcome to <span class="brand-highlight">CARD RBI Microfinance</span></h1>
            <p>Empowering communities through accessible and sustainable financial solutions.<br>Join us in making a difference in the lives of millions.</p>
        </div>
    </section>

    <!-- Features / Services -->
    <section class="features" id="features">
        <div class="card">
            <h3>Microloans</h3>
            <p>Affordable loan options tailored for small businesses and entrepreneurs to kickstart or expand their ventures.</p>
        </div>
        <div class="card">
            <h3>Financial Education</h3>
            <p>Empowering clients with knowledge to manage finances effectively and sustainably.</p>
        </div>
        <div class="card">
            <h3>Community Development</h3>
            <p>Partnering with communities to foster growth, resilience, and shared prosperity.</p>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta" id="contact">
        <h2>Ready to Grow Your Business?</h2>
        <p>Contact us today and let us help you achieve your financial goals.</p>
        <a href="#" class="btn">Get Started</a>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-info">
            <p><strong>CARD RBI</strong></p>
            <p>Address: P. Guevarra St., Corner Aguirre St., Brgy. Poblacion II, Sta. Cruz, Laguna</p>
            <p>Telephone Number: (049) 523-1047</p>
            <p>Email: info@cardrbi.com</p>
        </div>
        <div class="social-icons">
            <a href="https://www.facebook.com/CMRBofficial" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        </div>
    </footer>

</body>
</html>