<!DOCTYPE html>
<html>
<head>
<style>
.bigRedLink{
	color:red;
}
</style>
<link rel="stylesheet" href="css/main.css">
</head>
<body class="body">

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
    </div>
  </header>

  <div class="nav">
    <?php 
    $db = mysqli_connect("localhost","root","", "project") or die("Couldn't connet to SQL server");
       if(! $db ) {
          die('Could not connect: ' . mysqli_error($db));
       } 
       $sql = "SELECT * FROM posts WHERE varify = 0 or varify=1 ORDER BY id DESC";
       $retval = mysqli_query( $db , $sql);
       if(! $retval ) {
          die('Could not get data: ' . mysqli_error($db));
       }
       while($row = mysqli_fetch_array($retval)) {
        echo "<div style='background-color:#e8e8e80f;
		border-radius: 15px 15px 15px 15px;
		border-radius: 13 7 11 35;
		padding: 15px;
		'id=img_div >";
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300px" width="350px"/>';
              
              echo"<p style='color:white;'>Time: ".$row['time']." || Date: ".$row['date'];
              if($row['varify']==1){
                echo"<p style='color:#1ABC9C;'><b>Varified by admin</b></p>";
              }else{echo"<p style='color:yellow;'>Has not varified yet</p>";}
              echo"<p style='color:#F15566;font-size: 24px;'>Posted by:".$row['anon_name']."</p>";
              echo"<p style='color:#1CBFFF;font-size:37px;'>Title        :".$row['title']."</p>";
              echo"<p style='color:white;'><u><b>Information  :</u></b>".$row['information']."</p>";
              
  
            echo "</div>";

            
           
       } 
       echo "Fetched data successfully\n";
       
    ?>

  </div>
</body>

</html>