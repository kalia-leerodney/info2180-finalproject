<?php session_start();
    require_once 'dbconfig.php';
    if (!isset($_SESSION['logined_user']))
    {
    header('Location: userlogout.php');
    }
    if($_SESSION['logined_user']!='admin@project2.com'){
         $_SESSION["denied"]="denied";
        header("Location: dashboard.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="signup.js"></script>
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

            <div id="form-one">
                <h1 id="form-one-head">New User</h1>
                <form id="newuser">
                    <label> Firstname </label>
                    <input type="text" name="firstname" id="firstname">

                    <label> Lastname </label>
                    <input type="text" name="lastname" id="lastname">

                    <label> Password </label>
                    <input type="text" name="password" id="password">

                    <label> Email </label>
                    <input type="email" name="email" id="email">

                    <button type="submit" name="formonebtn" id="formonebtn"> Submit </button>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </body>
</html>
    