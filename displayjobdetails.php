<?php session_start(); 

require_once "dbconfig.php";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$issueid= filter_input(INPUT_GET,"issueid",FILTER_SANITIZE_STRING); 
$issue = $conn->query("SELECT * FROM Issues WHERE id ='$issueid' ");
$issuedetails= $issue->fetch(PDO::FETCH_ASSOC);
$assign=$issuedetails['assigned_to'];
$findname=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
$name= $findname->fetch(PDO::FETCH_ASSOC);
$creator=$issuedetails['created_by'];
 $findcreator=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$creator'");
$creatornm= $findcreator->fetch(PDO::FETCH_ASSOC);  
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href ="styles.css">
        <script type="text/javascript" src="issuedetails.js"></script>
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

            <div id="displayjobdetails">
                <h1 id="issue-title"><?php echo $issuedetails["title"]?> </h1>
                <h3 id="issue-#" value=<?php echo $issuedetails["id"]?>>Issue #<?php echo $issuedetails["id"]?> </h3>
                <p id="issue-des"><?php echo $issuedetails["_description"]?> </p>
            <p id="issue-create"> > Issue created on <?php echo $issuedetails["created"]?> by <?php echo $creatornm['firstname']." ".$creatornm['lastname']; ?> </p>
                <p id="issue-update"> > Issue updated on <?php echo $issuedetails["updated"]?></p>
                

                <aside>
                    <h3> Assigned To</h3>
                    <p><?php echo $name['firstname']." ".$name['lastname']; ?> </p>

                    <h3> Type </h3>
                    <p><?php echo $issuedetails["_type"] ?> </p>

                    <h3> Priority </h3>
                    <p><?php echo $issuedetails["_priority"] ?> </p>

                    <h3> Status</h3>
                    <p><?php echo $issuedetails["_status"] ?></p>

                    <button type="submit" id="closed"> Mark as Closed </button>
                    <button type="submit"  id="inprogress"> Mark in Progress </button>
                    <div id="result"></div>
                </aside>
            </div>
        </div>
    </body>
</html>