    <!-- Header -->
     <link rel="stylesheet" href="styles/header.css" >
    <header>
        <div class="logo-container">
            <a href="index.php"><img src="https://www.cardmri.com/rbi/wp-content/uploads/2020/01/CMRBI-1.png" alt="CARD RBI Logo" class="card-logo" /></aa>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                    if(!empty($_SESSION["role"])) {
                        $firstName = $_SESSION['first_name'];
                        $lastName = $_SESSION['last_name'];
                        echo "<li><a href=\"PHP/logout.php\">Logout</a></li>";
                        echo "<li><a href=\"#\"> Hello $firstName $lastName</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
