<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<div class="box">
  <h2 class="title">Đăng nhập</h2>
  <div class="form-container">
    <div class="form-row">
      <label for="id-input" class="label">ID</label>
      <input type="text" id="id-input" class="input" value="" />
    </div>
    <div class="form-row">
      <label for="password-input" class="label">Password</label>
      <input type="password" id="password-input" class="input" value="" />
    </div>
  </div>
  <button class="button" data-el="button-1">Đăng nhập</button>
</div>

<style>
  .box {
    border-radius: 73px;
    background-color: #dbe3f4;
    align-self: center;
    display: flex;
    margin-top: 99px;
    margin-bottom: 614px;
    width: 773px;
    max-width: 100%;
    padding: 40px 20px;
    flex-direction: column;
  }

  .title {
    color: #b88e2f;
    text-align: center;
    font-family: EB Garamond, sans-serif;
    font-size: 42px;
    font-weight: 600;
    align-self: center;
    margin-top: 3px;
    margin-left: 14px;
    max-width: 417px;
  }

  .form-container {
    align-self: center;
    display: flex;
    margin-top: 57px;
    margin-left: 21px;
    margin-bottom: 31px;
    width: 462px;
    max-width: 100%;
    flex-direction: column;
  }

  .form-row {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
  }

  .label {
    color: #000;
    font-family: EB Garamond, sans-serif;
    font-size: 18px;
    font-weight: 500;
    align-self: start;
    width: 159px;
  }

  .input {
    color: #9f9f9f;
    font-family: EB Garamond, sans-serif;
    font-size: 20px;
    font-weight: 400;
    align-self: stretch;
    max-width: 324px;
    border-radius: 50px;
    border: 1px solid #9f9f9f;
    background-color: #fff;
    margin-top: 8px;
    margin-left: 2px;
    margin-right: 2px;
    padding: 17px 20px 13px;
  }

  @media (max-width: 991px) {
    .input {
      max-width: 100%;
      padding-left: 10px;
    }
  }

  .button {
    all: unset;
    display: flex;
    flex-direction: column;
    position: relative;
    margin-top: 20px;
    appearance: none;
    padding: 15px 200px;
    background-color: black;
    color: white;
    border-radius: 4px;
    text-align: center;
    cursor: pointer;
    margin-left: -4px;
    margin-right: -1px;
  }
</style>

<script>
  (() => {
    const state = {};
    let context = null;
    let nodesToDestroy = [];
    let pendingUpdate = false;

    function destroyAnyNodes() {
      // destroy current view template refs before rendering again
      nodesToDestroy.forEach((el) => el.remove());
      nodesToDestroy = [];
    }

    // Function to update data bindings and loops
    // call update() when you mutate state and need the updates to reflect
    // in the dom
    function update() {
      if (pendingUpdate === true) {
        return;
      }
      pendingUpdate = true;

      document.querySelectorAll("[data-el='button-1']").forEach((el) => {
        el.setAttribute("openLinkInNewTab", false);
      });

      destroyAnyNodes();

      pendingUpdate = false;
    }

    // Update with initial state on first load
    update();
  })();
</script>

<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="input" type="input" name="user_name"><br><br>
			<input id="input" type="input" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

		</form>
	</div>

</body>
</html>