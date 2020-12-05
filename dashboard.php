<?php 
    session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
	if (!isset($_SESSION['logined_user']))
  {
    header('Location: userlogin.php');
  }

?>


<DOCTYPE html>

<html>
<script type="text/javascript" src=""></script>
        <div class = "sidenav">
            <ul>
                <a href="dashboard.php">  Home </a> 
                <a href="addusers.php">  Add User </a> 
                <a href="addisue.php">  New Issue </a> 
                <a href="userlogout.php">  Logout </a>  
            </ul>  
        </div>

    
    <a href="createissue.php" id="createnewissue"> Create New Issue </a> 
    <h3> Filter By: </h3>
    <div class="NavBar">
    <nav>   
        <ul>
            <li><a href="displayallissues.php">  All </a></li>
            <li><a href="openissuesonly.php">  Open </a> </li>
            <li><a href="mytickets.php">  My Tickets </a></li>
        </ul>
    </nav>    
    
    </div>
	
</html>