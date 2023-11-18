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
        h1 {
			text-align: center;
			color: #343a40;
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<div class="header">
		<a href="index.php"> Quay về Trang chủ</a>
	</div>

    <h1>
    Thông tin tài khoản
    </h1>

    ID: <?php echo $user_data['user_name']; ?><br>
    Số trang in còn lại: <?php echo $user_data['user_page_left']; ?><br>

    <div class="content">

        <a href="print_history.php"><img src="print_history_image.jpg" alt="Printing History"></a>
        <a href="purchase_page.php"><img src="purchase_page_image.jpg" alt="Purchase Page"></a> 
        <a href="purchase_history.php"><img src="purchase_history_image.jpg" alt="Purchase History"></a> 

    </div>

</body>
</html>


