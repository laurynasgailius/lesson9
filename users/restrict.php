<?php

//we need functions for dealing with session

require_once("functions.php");





	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: login.php");
		
	}
	
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: login.php");
	}

	//someone clicked the button "add"
	if(isset($_GET["add_new_interest"])){

		if(!empty($_GET["new_interest"])){

			saveInterest($_GET["new_interest"]);

		}else{

			echo "you left the interest field empty";
		}
		
	}




?>
<form>

	<input type="text" name ="new_interst">
	<input type="submit" name="add_new_interest" value="Add">

</form>



<h2> Welcome! <?php echo $_SESSION["name"];?> (<?=$_SESSION["user_id"];?>) </h2>


<br>
<a href="?logout=1" >Log Out</a>
