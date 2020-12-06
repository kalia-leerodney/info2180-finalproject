<?php 
    session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	if (!isset($_SESSION['logined_user']))
  {
    header('Location: userlogout.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
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
                    <div class = "home">
                        <img src="MdiHome.svg">
                        <a href="dashboard.php">Home</a> 
                    </div>

                    <div class = "adduser">
                        <img src = "IcBaselineAddCircle.svg">
                        <a href="addusers.php">Add User</a> 
                    </div>

                    <div class = "newissue">
                        <img src = "MdiAccountPlus.svg">
                        <a href="createissue.php">New Issue</a> 
                    </div>
                    <div class = "logout">
                        <img src = "MdiPower.svg">
                        <a href="userlogout.php">Logout</a>
                    </div>
                </ul>  
            </div>

            <div class ="display">
                
                <div class = "issues">
                    <?php if(isset($_SESSION["denied"])){ ?>
                    <p id="notadmin"><?php echo $_SESSION['logined_user']." is not an admin. Only admins are allowed to add users" ?></p><?php }?>
                    <h1>Issues</h1>
                    <button onclick="location.href='createissue.php';" id="createnewissue"> Create New Issue </button>
                </div>
                <div class = "filterby">
                    <h3> Filter by: </h3>
                    <div class="navbar">
                        <nav>   
                            <ul>
                                <li><button id="allissues">  All </button></li>
                                <li><button id="openissues">  Open </button> </li>
                                <li><button id="myissues">  My Tickets </button></li>
                            </ul>
                        </nav>    
                    </div>
                </div>
            <div id="result"></div>
        </div>
    </body>
</html> <?php $_SESSION["denied"]=null;?>
