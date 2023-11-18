<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #ffffff;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.header {
			width: 100%;
			height: 60px;
			background-color: #343a40;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		.header a {
			text-decoration: none;
			color: #f8f9fa;
			font-size: 20px;
		}
        .logout {
            position: absolute;
            top: 70px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            padding: 10px 20px; /* Adjust as needed */
            background-color: #343a40; /* Adjust as needed */
            color: #f8f9fa; /* Adjust as needed */
            text-decoration: none; /* Removes underline */
            border-radius: 5px; /* Adjust as needed */
        }
		h1 {
			text-align: center;
			color: #343a40;
			padding-top: 20px;
		}
        img {
            width: 200px; /* You can change this as needed */
            height: auto; /* Maintains aspect ratio */
            margin-top: 20px; /* Adds some space above the image */
        }
        .history {
            width: 95%; /* Adjust as needed */
            margin-top: 20px; /* Adds some space above the content */
            padding: 20px; /* Adds some space inside the content */
            border-radius: 5px; /* Rounds the corners of the content */
            background-color: #f8f9fa; /* A light grey background color */
        }
        .history h2 {
            font-size: 24px; /* Makes the text bigger */
            font-weight: bold; /* Makes the text bolder */
        }
        .log {
            border-bottom: 1px solid #343a40; /* Adds a bottom border to each log entry */
            padding-bottom: 10px; /* Adds some space below each log entry */
            margin-bottom: 10px; /* Adds some space below each log entry */
        }
	</style>
</head>
<body>
	<div class="header">
		<a href="info.php">Quay về Tài khoản</a>
	</div>

    <div class="content">
        <div class="history">
            <h2>History:</h2>
            <br>
            <?php 
                if ($user_data['user_purchase_history'] == "") {
                    echo "No purchase history";
                } else {
                    $logs = explode("\n", $user_data['user_purchase_history']);
                    foreach ($logs as $log) {
                        echo "<div class='log'>" . $log . "</div>";
                    }
                } 
            ?>
        </div>
    </div>

</body>
</html>