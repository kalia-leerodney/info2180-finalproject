<?php 
    session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	if (!isset($_SESSION['logined_user']))
  {
    header('Location: userlogout.php');
  }

?>


<DOCTYPE html>

<html>
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="dashboard.js"></script>
    </head>
<body>
    <div class="container">
        <header>
            <img src = "https://lh5.googleusercontent.com/D93o9lawUcDSbkREe5uhbMRnlelySCnuheiFfeUz5F2UPUvDW1Qfdujq4hT0v3waUhe0XX4s-PlJun0UemnuSsZqs9s6wbm-4z-zosxmukyr7rBIdvHtRCvDUuRwuKd49kb1OnBF">
            <h1> BugMe Issue Tracker </h1>
        </header>
        <div class = "sidenav">
            <ul>
                <a href="dashboard.php">  Home </a> 
                <a href="addusers.php">  Add User </a> 
                <a href="createissue.php">  New Issue </a> 
                <a href="userlogout.php">  Logout </a>  
            </ul>  
        </div>

    <div id="display">
        <?php if(isset($_SESSION["denied"])){
        ?><p><?php echo $_SESSION['logined_user']." is not an admin. Only admins are allowed to add users" ?></p><?php } ?>
        <button onclick="location.href='createissue.php';" id="createnewissue"> Create New Issue </button>
        <h1>Issues</h1>
        <h3> Filter By: </h3>
        <div class="NavBar">
            <nav>   
                <ul>
                    <li><button id="allissues">  All </button></li>
                    <li><button id="openissues">  Open </button> </li>
                    <li><button id="myissues">  My Tickets </button></li>
                </ul>
            </nav>    
        </div>
        <div id="result"></div>
    </div>
</div>
</body>
	
</html> <?php $_SESSION["denied"]=null;?>