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
        <script src="issueform.js" type="text/javascript"></script>
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

        <div id="newissueform">
            <h1> Create New Issue </h1>
            <form id="createissue"  method="post">
                <label> Title </label><br>
                <input type="text" name="title" id="title"><br>
                <label> Description </label><br>
                <textarea type="text" id="description" name="description"></textarea><br>

                <label> Assigned To </label><br>
                    <select id="assignedto" name="assignedto">
                        <option id="select">Please Select</option>
                        <?php foreach ($allusersfinal as $user): ?>
                        <option> <?php echo $user['firstname']." ".$user['lastname']; ?> </option>
                        <?php endforeach; ?>  
                    </select><br>

                

                <label> Type </label><br>
                <select id="type" name="type">
                    <option value="Bug"> Bug </option>
                    <option value="Proposal"> Proposal </option>
                    <option value="Task"> Task </option>
                </select><br>

                <label> Priority </label><br>
                <select id="priority" name="priority">
                    <option value="Major"> Major </option>
                    <option value="Minor"> Minor </option>
                    <option value="Critical"> Critical </option>
                </select><br><br>

                <button type="submit" name="cissue" id="cissue"> Submit </button>
            </form>
        </div>
        <div id="result"> </div>
    </div>
    </body> 
</html>