<?php
    session_start();
    include("header.php");
    
    if (!isset($_SESSION['first_name'])) {
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
    <link rel="stylesheet" href="styles/verifysectionStyle.css" />
    
</head>
<body>
    <div class="loanIndicator">
        <p>Next loan due date: 12/30/2025</p>
    </div>

    <div class="instruction" style="margin-left: auto; margin-right: auto; font-size: xx-large;">
        <strong>Upload Image of Loan Usage</strong>
    </div>
    <div class="drop-zone">
        <p>Drop images here or click to upload</p>
    </div>

    <button type="submit" class="submit-btn">Submit Photo</button>

</body>
</html>