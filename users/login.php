
<?php
	require_once ("functions.php");




//RESTRICTION - LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");
		
	}

	
	
	if (isset($_POST["login"])){
		
	
		//log in
		echo "Loggin in...";

		if(!empty($_POST["username"]) && !empty($_POST["password"])){

		login($_POST["username"], $_POST["password"]);

	} else {

		echo "both fields are required";
	}


		
	//sign up button clicked	
	}else if (isset($_POST["signup"])){
		//sign up
		echo "Signing up... ";
		
		//the fields are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"])){
			
			//save to db
			signup($_POST["username"], $_POST["password"], $_POST["name"]);
			
		}else{
			echo "All fields are required! ";
			
		}
		
	}
?>
<h1> Log In </h1>
<form method="POST">

		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		
		<input type="submit" name="login" value="Log In">

</form>

<h1> Sign Up </h1>
<form method="POST">

		<input type="text" placeholder="username" name="username">
		<input type="text" placeholder="name" name="name">
		<input type="password" placeholder="password" name="password">
		
		<input type="submit" name="signup" value="Sign Up">

</form>



