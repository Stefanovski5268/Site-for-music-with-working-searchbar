<?php 
include 'php/dbphp.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Dyno</title>
    </head>
    <body>
        
    <div class="wrapper">
        <div class="header"><b><center><a href="index.php"><span>D</span>yno</a></center></b></div>
        <div class="login"><center><a href="login.html"><br>Login in</a></center></div>
        <div class="register"><center><a href="#"><br>Register</a></center></div>
    </div>
        
        
        <div class="wrapper-1">
            <!-- navigation brat -->
     		  <div class="nav1"><a href="#"><li><center>Albums</center></li></a></div>
              <div class="nav2"><a href="#"><li><center>Your Library</center></li></a></div>
              <div class="nav1"><a href="#"><li><center>News</center></li></a></div>
        </div>
        
        <div class="search-bar">
         <form action="search.php" method="post">
            <div class="search">
                 <input type="text" class="baba" name="search" placeholder="Search.." style="width: 50%;">
            </div>
             <div class="submit">
                  <input type="submit" value=">>" name="search-submit">
             </div>
         </form>
        </div>
        
        <div class="banner">
            <video autoplay muted loop>
                <source src="Videos/grid.mp4" type="video/mp4">
            </video>
        
        </div>
        
        <div class="article">
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
                           <p>".$row ['a_artist']."</p
                           </div";
                       }
                   }else {
                       echo "There is no matching result!";
                   }
                
            }
            ?>
        
        </div>
    
    </body>
    <footer class="footer-quan">
     <p>@Dyno</p> 
    </footer>
</html>