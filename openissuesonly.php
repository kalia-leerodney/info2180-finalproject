<?php 
session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $openissues = $conn->query("SELECT * FROM Issues WHERE _status ='OPEN'");
    $openissuesfinal = $openissues->fetchAll(PDO::FETCH_ASSOC);
  
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
        <td><?php echo "#".$issue['id']; ?><a onclick="displayFullIssue()" ><?php echo " ".$issue['title']; ?></a></td>
            <td><?php echo $issue['_type']; ?></td>
            <td><?php echo $issue['_status']; ?></td>
            <td><?php echo $name['firstname']." ".$name['lastname']; ?></td>
            <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?> 

                      
</table>