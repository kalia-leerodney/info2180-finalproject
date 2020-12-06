<?php
    session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sessionid =$_SESSION['user_id'];
    $myissues = $conn->query("SELECT * FROM Issues WHERE assigned_to ='$sessionid' ");
    $myissuesfinal = $myissues->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($myissuesfinal)){
?>
<table id="dashboardtable">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($myissuesfinal as $issue):?>
        <tr>
        <td><?php echo "#".$issue['id']; ?><a href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>" onclick="displayFullIssue(this)" ><?php echo " ".$issue['title']; ?></a></td>
        <td><?php echo $issue['_type']; ?></td>
        <td><?php echo $issue['_status']; ?></td>
        <td><?php echo  $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
        <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?> 
     
</table>
<?php }else{
            echo "There are currently no issues being tracked that are assigned to you";
        }
