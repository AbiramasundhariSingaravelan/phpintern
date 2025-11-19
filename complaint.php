<?php
    $con=mysqli_connect("localhost","root","","complaintreg");
    if($con==false)
    {
        echo "unable to connect with Database".mysqli_connect_error($con);
    }
    if(isset($_POST['register']))
    {
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $dept=$_POST['department'];
        $priority=$_POST['priority'];
        $query="insert into complaint (title,description,priority,department,status)VALUES (
        '$title', '$desc', '$priority','$dept','New & Pending')";
        if(mysqli_query($con,$query))
        {
            $success="Complaint Added Successfully";
        }
        else{
            echo mysqli_error($con);
            $error="Unable to process your request. Try Again Later";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Complaint</title>
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
    <div class="container">
        <?php
            if(isset($_POST['register']))
            {
                if($success)
                    echo "<div class='alert alert-success'>".$success."</div>";
                else
                    echo "<div class='alert alert-danger'>".$error."</div>";
            }

       ?>
        <form action="complaint.php" method="post">
            <fieldset>
                <legend>Complaint Form</legend>
            <fieldset>
            <div class="form-group">
                <label>Complaint Title</label>
                <input type="text" name="title" placeholder="enter Complaint Title" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Complaint description</label>
                <input type="text" name="desc" placeholder="enter Complaint Description" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Department</label>
                <select name="department" class="form-control">
                    <option>CSE</option>
                    <option>IT</option>
                    <option>ECE</option>
                    <option>EEE</option>
                    <option>Mechanical</option>
                </select>
            </div>
            <div class="form-group">
                <label>Priority</label>
                <select name="priority" class="form-control">
                    <option>Low</option>
                    <option>High</option>
                    <option>Medium</option>
                </select>
            </div>
            <input type="submit" name="register" class="form-control btn btn-primary" value="Register Complaint"/> 
        </form>
    </div>
</body>
</html>