
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/main.css">
<script src="js/main.js"></script>
</head>
<body class="body">
<body class="news">
  <header class="header1">
	<div class="logo">
	<img src="img/925599123s.png" width="180px" height="35px">
	</div>
    <div class="nav">
      <ul>
        <li class="home"><a href="index.php">Home</a></li>
        <li class="news"><a class="active" href="News.php">Post</a></li>
        <li class="contact"><a href="Contact.php">Contact</a></li>
        <li class="about"><a href="About.php">About</a></li>
        <li class="login"><a href="login.php">Admin</a></li>
      </ul>
    </div>
 
  </header>
	  	<body class="admin_b">
		<form name='post' class="admin_frm" action="admin_home.php" onsubmit="return validateForm()" method="post">
		<h1 style="    color: #da3a3a;
    margin: 10px 0 0 193px;
    font-size: 50px;">Admin</h1>
			<ul>
			<li><input  type="password" class ="box_admin" placeholder="Enter User Name"name="username" required/></li>
			<li><input  class ="box_admin" type="password" placeholder="Enter Password" name="passid" required></li>

			
			<li><input class="admin_sub" type="submit" value="Login" name="Submit"></li>
			</ul>

		</form>

	
	</body>
</body>
</body>
</html>

