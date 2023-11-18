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
		#myImage {
            position: absolute;
            left: 0px;
            transition: left 2s;
        }
	</style>
</head>
<body>
	<div class="header">
		<a href="index.php">Trang chủ</a>
		<a href="info.php">Tài khoản</a>
	</div>

    <a class="logout" href="logout.php">Đăng xuất</a>

    <h1>Xin chào, <?php echo $user_data['user_name']; ?>!</h1>
	<a href="choose_a_printer.php"><img src="print_image.jpg" alt="Printing History"></a>
	
</script>
</body>
</html>