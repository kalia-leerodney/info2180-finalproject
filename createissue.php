<?php session_start();
    require_once "dbconfig.php";
	if (!isset($_SESSION['logined_user']))
    {
    header('Location: userlogout.php');
    }
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $allusers = $conn->query("SELECT * FROM Users");
  $allusersfinal = $allusers->fetchAll(PDO::FETCH_ASSOC);

  $value = 0;
 
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <scripts src="issueform.js" type="text/javascript">
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

        <div id="newissueform">
            <h1> Create New Issue </h1>
            <form id="createissue"  method="post">
                <label> Title </label>
                <input type="text" name="title" id="title">
                <label> Description </label>
                <textarea type="text" id="description" name="description"></textarea>

                <label> Assigned To </label>
                    <select id="assignedto" name="assignedto">
                        <option value="select"> Please Select </option>
                        <?php foreach ($allusersfinal as $user): ?>
                        <option> <?php echo $user['firstname']." ".$user['lastname']; ?> </option>
                        <?php endforeach; ?>  
                    </select>

                

                <label> Type </label>
                <select id="type" name="type">
                    <option value="Bug"> Bug </option>
                    <option value="Proposal"> Proposal </option>
                    <option value="Task"> Task </option>
                </select>

                <label> Priority </label>
                <select id="priority" name="priority">
                    <option value="Major"> Major </option>
                    <option value="Minor"> Minor </option>
                    <option value="Critical"> Critical </option>
                </select>

                <button type="submit" name="cissue" id="cissue"> Submit </button>
            </form>
        </div>
        <div id="result"> </div>
    </div>
    </body> 
</html>
<?php
if (isset($_POST['cissue'])){
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $title= filter_input(INPUT_POST,"title",FILTER_SANITIZE_STRING); 
        $description= filter_input(INPUT_POST,"description",FILTER_SANITIZE_STRING); 
        $assignto= filter_input(INPUT_POST,"assignedto",FILTER_SANITIZE_STRING);
        $type= filter_input(INPUT_POST,"type",FILTER_SANITIZE_STRING); 
        $priority= filter_input(INPUT_POST,"priority",FILTER_SANITIZE_STRING);
        $status="OPEN";
        $insert=true;
        $sessionid =$_SESSION['user_id'];
        if ($insert){
            $myids = $conn->query("SELECT id FROM Users WHERE CONCAT(firstname,' ',lastname)='$assignto' ");
            $myidsfinals = $myids->fetch(PDO::FETCH_ASSOC);
            if(isset($myidsfinals)){
                $assignid=$myidsfinals['id'];
            }
            $stmt=$conn->prepare('INSERT INTO Issues (title, _description, _priority, _type, _status, assigned_to, created_by, created, updated)
            VALUES ( :title, :_description,:priority,:_type,:_status,:assignid,:createid , NOW(), NOW());');
            $stmt->bindParam(":title",$title);
            $stmt->bindParam(":_description", $description);
            $stmt->bindParam(":priority", $priority);
            $stmt->bindParam(":_type", $type);
            $stmt->bindParam(":_status",$status);
            $stmt->bindParam(":createid", $sessionid);
            $stmt->bindParam(":assignid", $assignid);
            $stmt->execute();
            echo"<br> Issue successfullly inserted";
        }
    }catch(PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
}



