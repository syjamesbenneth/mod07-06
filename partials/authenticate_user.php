<?php 
	session_start (); // we can use $_SESSION
	//cleanup
	$username = htmlspecialchars($_POST['username']);
	$password =  htmlspecialchars($_POST['password']);
	$hash_password = sha1($password);
	//Q:Is it okay to combine lines 4 and 5? Yes.
	//Creates a session for user
	if(authenticate($username,$hash_password)){
		// echo "User has logged in successfully";
		$_SESSION["current_user"] = $username;
		header("Location: ../homepage.php");
		//if you use header don't echo before it.
		// $_SESSION["user"] = $username;
		//['user'] -> userdefined.
		//this line makes the user appear in any page that has session_start.
	} else {
		echo "Incorrect user details";
		header("Location: ../error_page.php");
	}
	//Function to check if uname and pw matches
	function authenticate($uname, $pw) {
		$hash_password_to_compare = sha1("secret");
		if($uname == "admin" && $pw == $hash_password_to_compare){
			return true;
		} else {
			return false;
		}
	}


	// echo $_POST['username'] . "<br>";
	// echo $_POST['password'] . "<br>";

 ?>