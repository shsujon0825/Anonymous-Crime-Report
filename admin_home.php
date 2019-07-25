<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/main.css">
</head>
<body class="body">
<body class="news">
  <header class="header1">
	<div class="logo">
	<img src="img/925599123s.png" width="180px" height="35px">
	</div>
    <div class="nav">
      <ul>
        <li class="home"><a href="admin_home.php">Adminpage</a></li>
        <li class="login"><a href="login.php">LogOut</a></li>
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
       $sql = 'SELECT * FROM posts ORDER BY id DESC';
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
                
          echo"<p style='color:lavenderblush;'>Time: ".$row['time']."  Date: ".$row['date']."</p>";
          if($row['varify']==1){
            echo"<p style='color:#1ABC9C;'>Varified by admin</p>";
          }elseif($row['varify']==2){
            echo"<p style='color:red;'>Removed by admin for users</p>";
          }else{echo"<p style='color:yellow;'>Has not varified yet</p>";}
          echo"<p style='color:#F15566;font-size: 24px;'>Posted by:".$row['anon_name']."</p>";
          echo"<p style='color:#1CBFFF;font-size:37px;'>Title:".$row['title']."</p>";
          echo"<p style='color:white;'>Information:".$row['information']."</p>";
          echo"<p style='color:red;'>Ip address:".$row['ip']."</p>";
          
          echo"<form action='remove.php' method='post'>
                <input type='hidden' name='id' value='".$row['id']."' />
                <a href='remove.php'><button 
				style='color:white;  width: 102px;
				color: white;
				width: 99px;
				padding: 7px;
				margin: 9px;
				background: #FD0000;
				border-radius: 15px;
				border: 2px solid #FD0000;
				font-size: 19px;
				float: right;' type='submit'>Remove</button></a>              
            </form>";

            echo"<form action='varify.php' method='post'>
                <input type='hidden' name='id' value='".$row['id']."' />
                <a href='varify.php'><button 
				style='color:white;  width: 102px;
				color: white;
				width: 99px;
				padding: 7px;
				margin: 9px;
				background: #49CCFF;
				border-radius: 15px;
				border: 2px solid #49CCFF;
				font-size: 19px;
				float: right;'
				type='submit'>Varified</button></a>
            </form>";
        
              echo "</div>";

           
       } 
       echo "\nFetched data successfully\n";
       
    ?>

  </div>
</body>
</body>
</html>