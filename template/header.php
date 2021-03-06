<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Books Shop</a>
        </div>

        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

              <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Publisher</a></li>

              <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>


              <!-- link to shopping cart -->
		<?php if(isset($_SESSION['user']) && $_SESSION["user"] != "false" ){?>
              <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
	       
	     <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $_SESSION['user'] ?>
		</a>
		<ul class="dropdown-menu"><li><a href="account.php">Account</a></li><li><a href="signout.php">Logout</a></li></ul>
	    </li>
		<?php }
		else if(isset($_SESSION['admin']) && $_SESSION["admin"] == "true" ){?>
	     
	     <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<span class="glyphicon glyphicon-user"></span>&nbsp; Welcome Admin!!
		</a>
		<ul class="dropdown-menu"><li><a href="signout.php">Logout</a></li></ul>
	    </li>
		<?php } 
		else {?>
	      <li><a href="entry.php"><span class="glyphicon glyphicon-user"></span>&nbsp; LogIn</a></li>
		<?php } ?>
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to online Books Shop</h1>
        <p class="lead">This site has been made using PHP with MYSQL (procedure functions)!</p>
        <p>The layout use Bootstrap to make it more responsive. It's just a simple web!</p>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">
