<?php 
session_start();

include("connection.php");
include("functions.php");

$error_message = ""; // Initialize error message variable

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)) {
        //read from database
        $query = "select * from signin where username = '$username' limit 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: navi.html");
                exit;
            } else {
                // Password doesn't match
                $error_message = "Invalid username or password";
            }
        } else {
            // Username doesn't exist
            $error_message = "Invalid username or password";
        }
    } else {
        // Invalid username or password format
        $error_message = "Please enter both username and password";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: #537C50;
		width: 300px;
		padding: 20px;
		top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%, -50%);
	
	}
	.error-box {
            border: 1px solid #ff0000;
            background-color: #ffe6e6;
            color: #ff0000;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
	</style>

	<div id="box">
    <?php 
    if($error_message !== "") {
        echo '<div class="error-box">' . $error_message . '</div>';
    }
    ?>
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            <label for="username">username</label>
			<input id="text" type="text" name="username"><br><br>
			<label for="password">password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>