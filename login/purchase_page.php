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
			background-color: #f4f4f4;
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
        .content {
            width: 80%; /* Adjust as needed */
            margin-top: 20px; /* Adds some space above the content */
            text-align: center; /* Centers the text */
        }
        .content a {
            display: inline-block; /* Allows for padding */
            padding: 10px; /* Adds some space around the links */
            margin-top: 20px; /* Adds some space above the links */
            background-color: #343a40; /* Adjust as needed */
            color: #f8f9fa; /* Adjust as needed */
            text-decoration: none; /* Removes underline */
            border-radius: 5px; /* Adjust as needed */
        }
        img {
            width: 200px; /* You can change this as needed */
            height: auto; /* Maintains aspect ratio */
            margin-top: 20px; /* Adds some space above the image */
        }
        form {
            width: 100%; /* Makes the form wider */
            display: flex; /* Arranges the form elements horizontally */
            justify-content: center; /* Centers the form elements */
            align-items: center; /* Centers the form elements vertically */
            flex-wrap: wrap; /* Allows the form elements to wrap to a new line if necessary */
        }
        input[type="number"], input[type="submit"] {
            margin-top: 20px; /* Adds some space above the form elements */
            padding: 10px; /* Adds some space inside the form elements */
            font-size: 16px; /* Increases the font size in the form elements */
        }
        input[type="submit"] {
            background-color: #343a40; /* Adjust as needed */
            color: #f8f9fa; /* Adjust as needed */
            border-radius: 5px; /* Adjust as needed */
        }
        h2 {
            font-size: 24px; /* Makes the text bigger */
            font-weight: bold; /* Makes the text bolder */
        }
	</style>
</head>
<body>
	<div class="header">
		<a href="info.php">Quay về Tài khoản</a>
	</div>

    <div class="content">
        <h2>Nhập số trang in muốn mua</h2>
        <form method="post">
            <input type="number" name="pages" required>
            <br>
            <input type="submit" value="Thanh toán qua BKPay">
        </form>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $pages = $_POST['pages'];
            if ($pages > 0) {
                $query = "update users set user_page_left = user_page_left + '$pages' where user_id = '".$user_data['user_id']."' limit 1";
                mysqli_query($con, $query);
                //change time zone
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                //get current time
                $date = date('d-m-Y, H:i:s');
                $query = "update users set user_purchase_history = concat(user_purchase_history, '[$date] Đã mua $pages trang <br>\n') where user_id = '".$user_data['user_id']."' limit 1";
                mysqli_query($con, $query);
                header("Location: info.php");
                die;
            } else {
                echo "Invalid number of pages";
            }
        }
    ?>
    </div>
</body>
</html>
