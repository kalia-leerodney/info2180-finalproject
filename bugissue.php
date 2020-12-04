<?php
    $host = 'localhost';
    $dbname = 'BugIssueDB';
    $username = 'BUGadmin';
    $password = 'BUGpass'; 

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "You have been connected successfully";
        #$fname= filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING); 
        #$lname= filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING); 
        #$pswrd= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
        $pswrd="Ffghkjfhgj1";
        $fname="joe";
        $lname="bank";
        $mail="ree@gmail.com";
        #$mail= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL); 
        $insert=true;
        $inputs=array($fname,$lname,$pswrd,$mail);
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
            $stmt->$conn->prepare('INSERT INTO Users(firstname,lastname,_password,email,date_joined)
            VALUES ($fname,$lname,$hashpassword,$email,NOW());');
            $stmt->execute();
            echo"<br>inserted";
        }   
                
    
    
    } catch(PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    } 
    ?>
    