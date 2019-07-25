

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
  	<body class="body">
	<h1 style="text-align:center;color:#fff">Post</h1>
	<div style="float:left;">
			<form name='post' class="frm" onsubmit="return validateForm()"  action= "News.php" method="post" enctype="multipart/form-data">
			<ul>
            <li><input   class ="box" type="file" name="image" accept="image" required></li>

			<li><input  type="text" class ="box" placeholder="Enter your Anonymous Name"name="anon_name" required/></li>
			<li><input for="Title" type="text" class ="box"placeholder="Enter Title"name="title" required/></li>

             <li><textarea rows="10" cols="100" name="text" class ="box"  placeholder="Enter text here ..." required></textarea><br></li>
			
			<li><input class="sub"type="submit"  name="Post" value="Upload" /></li>
			</ul>

		</form>
	
	</div>

	<div style="float:right;" class="note">
	<p><strong>***Note:</strong> Image shouldn't be more then 1mb size.</p>
	<p><strong>***Note:</strong>Please don't make fake news or fake report. Our administration will check and varify every post. False posts will be deleted for users and we can track the false reporters.</p>
	</div>

	
	</body>
  
  <?php

$db = mysqli_connect("localhost","root","","project");

		if(isset($_POST["Post"])){

			$image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

			$anon_name= mysqli_real_escape_string($db,$_POST['anon_name']);
			$title= mysqli_real_escape_string($db,$_POST['title']);
			$info= mysqli_real_escape_string($db,$_POST['text']);

			date_default_timezone_set('Asia/Dhaka');

			$time= date('h:i A');
			$date= date('Y:m:d');
			
			if (isset($_SERVER['HTTP_CLIENT_IP'])){
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			}
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}	
			else if(isset($_SERVER['HTTP_X_FORWARDED'])){
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			}	
			else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			}	
			else if(isset($_SERVER['HTTP_FORWARDED'])){
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			}
			else if(isset($_SERVER['REMOTE_ADDR'])){
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			}	
			else{
				$ipaddress = 'UNKNOWN';
			}
					
			$img_type=$_FILES["image"]["type"];
			$img_size=$_FILES["image"]["size"];

			if($img_size > 1048576 ){
				echo "<script>alert('Image is bigger then 1MB');window.location='News.php'</script>";
			}else{
				$sql = "INSERT INTO posts (anon_name,title,information,image,time,date,varify,ip) 
				VALUES('$anon_name','$title','$info','$image','$time','$date',0,'$ipaddress') ";

		$update = mysqli_query($db,$sql);
			}
		
			if(! $update){
				die('Could not update data: ' . mysqli_error($db));
			}else{
				echo "<script>alert('post updated');window.location='index.php'</script>";
				
			}
					

		}
		
		
?>



</body>
</body>
</html>    



