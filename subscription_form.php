<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize email address
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Check if email address is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save email address to database or send to notification system
        // Here, you would insert the email address into your database or send it to your notification system
        // For demonstration purposes, let's assume we're saving it to a text file

        $file = fopen("subscribers.txt", "a"); // Open subscribers.txt file in append mode
        fwrite($file, $email . PHP_EOL); // Write email address to file
        fclose($file); // Close the file

        // Redirect to the success page
        $_SESSION["success"] = "Subscription Successful! You will receive notifications about data breaches.";
        header("Location: subscription_success.php");
        exit;
    } else {
        $_SESSION["error"] = "Invalid email address. Please enter a valid email address.";
    }
} else {
    echo "Form not submitted"; // Debugging statement
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Breach Notification System Subscription</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-position: center;
            background: url('pic17.jpg') no-repeat;
            background-size: cover;
        }

        nav {
            background-color: red;
            height: 80px;
            width: 100%;
            line-height: 75px;
            position: fixed;
        }
        nav li{
            display:inline-block;
            list-style: none;
        }
        
        nav li a{
font-size: 10px;
text-transform: uppercase;
padding:0px 0.1px;
color:blue;
        }
nav li a:hover{
    color:pink;
    transition: all 0.4s ease 1s;
}
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.3s;
        }

        nav a:hover {
            color: #0ef;
        }
   nav ul {
    float: left;
    margin-right:20px;

    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 4px;
        margin-right: 10px;
    }
   nav ul li a {
    color: white;
    font-size: 17px;
    text-transform: uppercase
    }
    .container {
        text-align: center;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        float: right;
    margin-right:20px;
    margin-top: 100px;
    padding-top: 50px;
    top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%, -50%);

    }

    h1 {
        color: blue;
    }

    p {
        color: green;
    }

    .action-steps {
        text-align: left;
        margin-top: 20px;
    }
    form {
        text-align: center;
        max-width: 600px;
        padding: 20px;
        background-color: darkgray;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        float: right;
    margin-right:20px;
    margin-top: 100px;
    padding-top: 50px;
    top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%, -50%);
    }
    </style>
</head>
<body>

     <nav>
    <ul>
    <li><a href="action.html" class="active">action</li></li>
    <li><a href="affected.html">affected</a></li>
    <li><a href="Data.html">Data</a></li>
    <li><a href="contact.html">contact</a></li>
    <li><a href="details.html">details</a></li>
    <li><a href="integ.html">integ</a></li>
    <li><a href="legal.html">legal</a></li>
    <li><a href="notification.html">notification</a></li>
    <li><a href="preventive.html">preventive</a></li>
    <li><a href="sec.html">sec</a></li>
    <li><a href="updates.html">updates</a></li>
    <li><a href="subscription_form.php">subscription</a></li>
    </ul>
</nav>
    <form action="subscription_form.php" method="post">
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
