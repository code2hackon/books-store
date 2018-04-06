<?php
	session_start();
	$title = "SignUp section";
	require_once "./template/header.php";
	
	if(!isset($_POST['user_signup'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	require_once "./functions/utility_functions.php";
	$conn = db_connect();

	$user = trim($_POST['email']);
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$pass = trim($_POST['password']);

	if($name == "" || $pass == "" || $phone == "" || $user == ""){
		echo "Please fill the complete form!";
		exit;
	}

	$user = mysqli_real_escape_string($conn, $user);
	$name = mysqli_real_escape_string($conn, $name);
	$phone = mysqli_real_escape_string($conn, $phone);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	// get from db

	$userExists = userExists($conn,$user);
	if($userExists=="Exist"){
		?>
		<div class="alert alert-info">
  	<strong>User Exist.</strong> <?php echo $user; ?> is already registered.Try with different username.
	</div>
		<?php
	}
	else if($userExists=="NotExist"){
		insertIntoCustomers($conn,$user,$pass,$name,$phone);		
		?>
		<div class="alert alert-success">
  	<strong>Registration Success.</strong> LogIn to continue shopping.
	</div>
		<?php
		require_once "./books.php";
	}
	else{
		?>
		<div class="alert alert-info">
  	<strong>Something went wrong.</strong>Please try again later.
	</div>
		<?php
	}
	if(isset($conn)) {
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>
