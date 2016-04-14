<?php

	$servername = "localhost";
	$db_username = "webpr2016";
	$db_password = "webpr16";

	function login($user, $pass) {

    $pass = hash("sha512", $pass);

	$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"],"webpr2016_laugai");

	$stmt = $mysql->prepare("select id, name FROM users WHERE username=? and password=?");

	echo $mysql->error;

	$stmt->bind_param("ss", $user, $pass);

	$stmt->bind_result($id, $name);

	$stmt->execute();

	//get the data
		if($stmt->fetch()){
			echo " User with id ".$id." - Logged in!";	
			
			
			$_SESSION["login"] = $id;
			$_SESSION["name"] = $name;
			$_SESSION["username"] = $user;
			
			header("Location: restrict.php");

			
		}else{

			// username was wrong or password was wrong or both.
			echo $stmt->error;
			echo "wrong credentials";
		}
		
	}


	function signup($user, $pass, $name){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		//GLOBALS - access outside variable in function
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laugai");
		
		$stmt = $mysql->prepare("INSERT INTO users (username, password, name) VALUES (?,?,?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("sss", $user, $pass, $name);
		
		if($stmt->execute()){
			echo "user saved successfully! ";
		}else{
			echo $stmt->error;
		}
	}

	function saveInterest ($interest){

		$mysql = new mysqli ("localhost", $GL
	}


	function createInterestDropdown(){

		// query all interests

		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laugai");

		$stmt = $mysql->prepare("select id, name FROM interests ORDER BY name ASC");


		


	}





?>