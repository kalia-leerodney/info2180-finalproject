<?php session_start();
    require_once 'dbconfig.php';
        try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $fname= filter_input(INPUT_GET,"firstname",FILTER_SANITIZE_STRING); 
        $lname= filter_input(INPUT_GET,"lastname",FILTER_SANITIZE_STRING); 
        $pswrd= filter_input(INPUT_GET,"password",FILTER_SANITIZE_STRING);
        $email= filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL); 
        $email= filter_var($email,FILTER_VALIDATE_EMAIL);
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
    