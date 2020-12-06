<?php session_start();
    require_once "dbconfig.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $allissues = $conn->query("SELECT * FROM Issues");
    $allissuesfinal = $allissues->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($allissuesfinal)){ 
?>
 
    <table class ="dashboardtable">
        <tr>
            <th> Title </th>
            <th> Type </th>
            <th id = "status-header"> Status </th>
            <th> Assigned To </th>
            <th> Created </th>
        </tr>

        <?php foreach ($allissuesfinal as $issue):
        $assign=$issue['assigned_to'];
        $findname=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
        $name= $findname->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
                <td class='hashtag'><?php echo "#".$issue['id']; ?><a class="issuelink" href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
                <td><?php echo $issue['_type']; ?></td>
                <?php if($issue['_status']=='OPEN'){ ?>
                    <div class = "statuscontainer">
                        <td><div class='openstatus'> <?php echo $issue['_status']; ?></div></td>
                        <?php }?>
                        <?php if($issue['_status']=='Closed'){ ?>
                        <td><div class='closestatus'> <?php echo $issue['_status']; ?></div></td>
                        <?php } ?>
                        <?php if($issue['_status']=='In-Progress'){ ?>
                        <td><div class='progstatus'> <?php echo $issue['_status']; ?></div></td>
                        <?php } ?>
                    </div>
                <td><?php echo $name['firstname']." ".$name['lastname']; ?></td>
                <td><?php echo $issue['created']; ?></td>
            </tr>
            
        <?php endforeach; ?>    
    </table>
        <?php }else{
            echo "There are currently no issues being tracked.";
        }
