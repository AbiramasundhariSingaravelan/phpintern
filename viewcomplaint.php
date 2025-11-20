<?php
    $con=mysqli_connect("localhost","root","","complaintreg");
    if($con==false)
    {
        echo "unable to connect with Database".mysqli_connect_error($con);
    }
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaint</title>
    <style>
       .complaint-page{
        display:flex;
       }
       .side-bar{
        flex:30%;
       }
       .complaint-form{
        flex:70%;
       }
    </style>
    <link rel="stylesheet" href="http://localhost/ComplaintRegistration/css/style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-bottom:400px;">    
        <?php
        $query="select * from complaint";
        if($result=mysqli_query($con,$query))
        {
            echo  "<table class='table table-striped' >
            <tr>
                <th>S.No</th>
                <th>Complaint title</th>
                <th>Description</th>
                <th>Department</th>
                <th>Priority</th>
                <th>Status</th></tr>";
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr><td>".$row['complaintid']."</td><td>".$row['title']."</td><td>".$row['description']."</td><td>".$row['priority']."</td><td>".$row['department']."</td><td>".$row['status']."</td></tr>";
                }
            }
            else{
                echo "<tr><td><Center>No Complaints registered yet.</center></td></tr>";
            }
        }
        ?>
        
        </table>
    </div>
</body>
</html>