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
</head>
<body>
    <h1>This is the printing page</h1>
    <br>
    <a href="index.php">Back</a>
    <br>
    <form method="post">
        <input type="number" name="pages" placeholder="Number of pages" required>
        <br>
        <input type="submit" value="Print">
    </form>
    <br>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            //something was posted
            $pages = $_POST['pages'];
            if($pages > $user_data['user_page_left']){
                echo "You don't have enough pages";
                //suggest to buy more pages
                echo "<br>";
                echo "<a href='purchase_page.php'>Buy more pages ?</a>";
            } else {
                if ($pages > 0) {
                    $query = "update users set user_page_left = user_page_left - '$pages' where user_id = '".$user_data['user_id']."' limit 1";
                    mysqli_query($con, $query);
                    $query = "update users set user_print_history = concat(user_print_history, 'Printed $pages pages <br>\n') where user_id = '".$user_data['user_id']."' limit 1";
                    mysqli_query($con, $query);
                    header("Location: info.php");
                    die;
                } else {
                    echo "Invalid number of pages";
                }
            }
        }
    ?>
    <br>
</body>
</html>