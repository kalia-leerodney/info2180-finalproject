<?php require_once "dbconfig.php";
try{
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $issueid= filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
    $upd= filter_input(INPUT_GET,"update",FILTER_SANITIZE_STRING);
    $issue = $conn->prepare("UPDATE Issues SET _status=:upd, updated=NOW() WHERE id =:id");
    $issue->bindParam(":upd", $upd);
    $issue->bindParam(":id", $issueid);
    $issue->execute();
    echo "Updated";
} catch(PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}