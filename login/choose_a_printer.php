<?php 
session_start();

include("connection.php");
include("functions.php");
require_once 'vendor/autoload.php';

$user_data = check_login($con);

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $copies = $_POST['copies'];

    if ($file['error'] > 0) {
        echo "Error: " . $file["error"] . "<br>";
    } else {
        $filename = $file['name'];
        $filetype = $file['type'];
        $filepath = 'uploads/' . $filename;

        move_uploaded_file($file['tmp_name'], $filepath);

        if ($filetype == 'application/pdf') {
            $pdf = new \setasign\Fpdi\Fpdi();
            $pages = $pdf->setSourceFile($filepath);
        } elseif ($filetype == 'application/msword' || $filetype == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($filepath);
            $sections = $phpWord->getSections();
            $pages = count($sections);
        }

        // Multiply the number of pages by the number of copies
        $total_pages = $pages * $copies;

        if($total_pages > $user_data['user_page_left']){
            echo "Không đủ trang in";
            echo "<br>";
            echo "<a href='purchase_page.php'>Mua thêm trang in ?</a>";
            echo "<a href='index.php'>Thoát</a>";
        } else {
            if ($total_pages > 0) {
                // Update user's page left and print history
                $query = "UPDATE users SET user_page_left = user_page_left - '$total_pages' WHERE user_id = '".$user_data['user_id']."' LIMIT 1";
                mysqli_query($con, $query);
            
                // Get selected printer name and status
                if (isset($_GET['printer_name'])) {
                    list($selected_printer, $printer_status) = explode(' - ', $_GET['printer_name']);
                    if ($printer_status != 'FAILED') {
                        //change time zone
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // Get current date and time
                        $date = date('d/m/Y, H:i:s');
                        // Update print history
                        $query = "UPDATE users SET user_print_history = CONCAT(user_print_history, ' [$date] In $total_pages trang ở máy $selected_printer <br>\n') WHERE user_id = '".$user_data['user_id']."' LIMIT 1";
                        mysqli_query($con, $query);
            
                        header("Location: print_history.php");
                        die;
                    }
                }
            } else {
                echo "Invalid number of pages";
            }
        }
    }
}
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
        .content a {
            display: inline-block; /* Allows for padding */
            padding: 10px; /* Adds some space around the links */
            margin-top: 20px; /* Adds some space above the links */
            background-color: #343a40; /* Adjust as needed */
            color: #f8f9fa; /* Adjust as needed */
            text-decoration: none; /* Removes underline */
            border-radius: 5px; /* Adjust as needed */
        }
        select, input[type="submit"], input[type="file"] {
            margin-top: 20px; /* Adds some space above the form elements */
            padding: 10px; /* Adds some space inside the form elements */
            font-size: 16px; /* Increases the font size in the form elements */
        }
        .h2 {
            font-size: 24px; /* Makes the text bigger */
            font-weight: bold; /* Makes the text bolder */
        }
	</style>
</head>
<body>
	<div class="header">
		<a href="index.php">Quay về Trang chủ</a>
	</div>

    <br>

    <div class="content">
    <h2>Chọn máy in:</h2>
    <?php
    $query = "SELECT * FROM printers";
    $result = mysqli_query($con, $query);

    // Form with printer names
    echo "<form method='get' action=''>";
    echo "<select id='printer_name' name='printer_name' onchange='getSelectedValue()'>";

    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['printer_name'] . " - " . $row['printer_status'] . "'>" . $row['printer_name'] . " - " . $row['printer_status'] . "</option>";
    }

    echo "</select>";
    echo "<br>";
    echo "<input type='submit' value='Chọn'>";
    echo "</form>";

    // Get selected printer name and status
    if (isset($_GET['printer_name'])) {
        list($selected_printer, $printer_status) = explode(' - ', $_GET['printer_name']);
        if ($printer_status != 'OK') {
            echo "Không thể chọn máy in này.";
        } else {
            echo "Đã chọn: " . $selected_printer;
            echo "<br>";

        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <h2>Chọn 1 File Word hoặc PDF</h2>
        <input type="file" name="file" id="file" accept=".doc,.docx,.pdf">
        <br>
        Số lượng bản in:
        <input type="number" name="copies" id="copies" min="1" required>
        <br>
        Chọn cỡ giấy:
        <input type="radio" id="A5" name="paper_size" value="A5">
        <label for="A4">A5</label>
        <input type="radio" id="A4" name="paper_size" value="A4">
        <label for="A4">A4</label>
        <input type="radio" id="A3" name="paper_size" value="A3">
        <label for="A3">A3</label>
        <br>
        Chọn kiểu in:
        <input type="radio" id="portrait" name="orientation" value="portrait">
        <label for="portrait">Dọc</label>
        <input type="radio" id="landscape" name="orientation" value="landscape">
        <label for="landscape">Ngang</label>
        <br>
        <input type="submit" name="submit" value="Xác nhận in">

    </form>
    <br>
    <a href="customer_service.php">Gặp vấn dề?</a>
    </div>
</body>
</html>
