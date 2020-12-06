<?php 
session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $openissues = $conn->query("SELECT * FROM Issues WHERE _status ='OPEN'");
    $openissuesfinal = $openissues->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($openissuesfinal)){
?>

<table id="dashboardtable">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($openissuesfinal as $issue):
         $assign=$issue['assigned_to'];
         $findname=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
         $name= $findname->fetch(PDO::FETCH_ASSOC); ?>
        <tr>
            <td id = "issue"><?php echo "#".$issue['id']; ?><a href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>" onclick="displayFullIssue(this)" ><?php echo " ".$issue['title']; ?></a></td>
            <td><?php echo $issue['_type']; ?></td>
            <td><div id='openstatus'> <?php echo $issue['_status']; ?></div></td>            
            <td><?php echo $name['firstname']." ".$name['lastname']; ?></td>
            <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?>                 
</table>
<?php }else{
            echo "There are currently no open issues being tracked.";
        }