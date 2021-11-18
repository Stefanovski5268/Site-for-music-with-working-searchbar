<?php 
include 'php/dbphp.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
    Dyno
    </title>
    <link rel="stylesheet" type="text/css" href="CSS/searchcss.css">
    <meta charset="utf-8">
    </head>
    <body>
        <div class="wrapper">
        <div class="header"><b><center><a href="index.php"><span>D</span>yno</a></center></b></div>
        <div class="login"><center><a href="#"><br>Login in</a></center></div>
        <div class="register"><center><a href="#"><br>Register</a></center></div>
    </div>
        
        
        <div class="wrapper-1">
            <!-- navigation brat -->
     		  <div class="nav1"><a href="#"><li><center>Albums</center></li></a></div>
              <div class="nav2"><a href="#"><li><center>Your Library</center></li></a></div>
              <div class="nav1"><a href="#"><li><center>News</center></li></a></div>
        </div>
         <div class="article"><a href="#">
                       <?php 
            if(isset($_POST ['search-submit'] )){
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM albums WHERE a_title LIKE '%$search%' OR a_artist LIKE '%$search%'";
                $result = mysqli_query ($conn, $sql);
                $queryResults = mysqli_num_rows ($result);
                   if($queryResults > 0) {
                       while($row = mysqli_fetch_assoc($result)){
                           echo "<div> 
                           <h3>".$row ['a_title']."</h3>
                           <p>".$row ['a_artist']."</p>
                           </div>";
                       }
                   } else {
                       echo "There is no matching result!";
                   }
            }
            ?>
       </a> </div>

    </body>
</html>