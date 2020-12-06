<?php
	if(isset($_SESSION['logined_user'])){
        header("Location:http://localhost/info2180-project2/dashboard.php" );
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="login.js"></script>
        
    </head>
    <body>
        <div class="container">
            <header>
                <img src = "https://lh5.googleusercontent.com/D93o9lawUcDSbkREe5uhbMRnlelySCnuheiFfeUz5F2UPUvDW1Qfdujq4hT0v3waUhe0XX4s-PlJun0UemnuSsZqs9s6wbm-4z-zosxmukyr7rBIdvHtRCvDUuRwuKd49kb1OnBF">
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div id="login-form">
                <h1 id="login-head">User Login</h1>
                <form id="login" method="post" onsubmit="return Vali()">
                    <label> Email: </label>
                    <br>
                    <input type="email" name="useremail" id="email">
                    <br>
                    <label> Password: </label>
                    <br>
                    <input type="text" name="userpassword" id="password">
                    <br>
                    <button type="submit" name="loginbtn" id="loginbtn"> Login </button>
                </form>
                <span id="error"></span>
            </div>
        </div>
    </body>
</html>
<?php if (isset($_POST['loginbtn'])){
        include('userlogin.php');
    }
    