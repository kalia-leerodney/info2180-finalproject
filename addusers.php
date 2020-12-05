<?php session_start();
    require_once 'dbconfig.php';
    if (!isset($_SESSION['logined_user']))
    {
    header('Location: userlogout.php');
    }
    if($_SESSION['logined_user']!='admin@project2.com'){
        header("Location:http://localhost/info2180-project2/dashboard.php");
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
                  <a href="addisue.php">  New Issue </a> 
                  <a href="userlogout.php">  Logout </a>  
              </ul>  
            </div>

            <div id="form-one">
                <h1 id="form-one-head">New User</h1>
                <form id="newuser"  method="post" onsubmit="return Validate()">
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
            </div>
        </div>
    </body>
</html>
    <?php
     if (isset($_POST['formonebtn'])){
        try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $fname= filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING); 
        $lname= filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING); 
        $pswrd= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
        $email= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL); 
        $insert=true;
        $inputs=array($fname,$lname,$pswrd,$email);
        foreach ($inputs as $i):
            if(!preg_match("/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/",$i) & $i==$pswrd){
                echo "<br>not match";
                $insert=false;
            }
            else if (empty($i)){
                echo "empty input";
                $insert=false; 
            }
        endforeach;
        $hashpassword=password_hash($pswrd,PASSWORD_DEFAULT);
        if ($insert){
            $stmt=$conn->prepare('INSERT INTO Users(firstname,lastname,_password,email,date_joined)
            VALUES (:fname,:lname,:hashpassword,:email,NOW());');
            $stmt->bindParam(":fname",$fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":hashpassword", $hashpassword);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            echo"<br> User successfullly inserted";
        }

    } catch(PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
}
    ?>
    