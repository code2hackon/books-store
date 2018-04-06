<?php
	session_start();
	$title = "SignIn section";
	require_once "./template/header.php";
	
	if(isset($_POST['admin_login'])){
		$table="admin";
	}
	else if(isset($_POST['user_login'])){
		$table="customers";
	}
	else{
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);

	if($user == "" || $pass == ""){
		?>
		<div class="alert alert-info">
  <strong>Info!</strong> Username or Password is empty!
</div>
<?php 
	
	
		exit;
	}

	$user = mysqli_real_escape_string($conn, $user);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	// get from 
	$query = "SELECT * from $table where user='".$user."'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($user != $row['user'] || $pass != $row['pass']){
	?>
		<div class="alert alert-danger">
  	<strong>Invalid Credentials.</strong>Username or password is invalid. Check again!
	</div>
<?php
		$_SESSION['user'] = false;		
		$_SESSION['admin'] = false;
		require_once "./books.php";
		require_once "./template/footer.php";	
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	if($table=="admin"){
	$_SESSION['admin'] = "true";
	$_SESSION['user'] =  "false";
	header("Location: admin_book.php");
	}
	else if($table=="customers"){
	$_SESSION['user'] = $row['name'];
	$_SESSION['admin'] = "false";
	header("Location: index.php");	
	}
	require_once "./template/footer.php";
?>
