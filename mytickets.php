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
        <th id = "status-header"> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($myissuesfinal as $issue):?>
        <tr>
        <td class='hashtag'><?php echo "#".$issue['id']; ?><a class="issuelink" href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
        <td><?php echo $issue['_type']; ?></td>
        <?php if($issue['_status']=='OPEN'){ ?>
        <td><div class='openstatus'> <?php echo $issue['_status']; ?></div></td>
        <?php }?>
        <?php if($issue['_status']=='Closed'){ ?>
        <td><div class='closestatus'> <?php echo $issue['_status']; ?></div></td>
        <?php } ?>
        <?php if($issue['_status']=='In-Progress'){ ?>
        <td><div class='progstatus'> <?php echo $issue['_status']; ?></div></td>
        <?php } ?>
        <td><?php echo  $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
        <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?> 
     
</table>
<?php }else{
            echo "There are currently no issues being tracked that are assigned to you.";
        }
