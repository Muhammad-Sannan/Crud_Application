<?php include ('header.php'); ?>
<?php include ('connection.php');?>
<?php

    if(isset($_GET['id'])){
        $id= $_GET['id'];
    
    $query ="delete from `stuudent` where `sid`='$id'";
    $result= mysqli_query($conn,$query);
    if (!$result) {
        die("query failed".mysqli_error());
    }
    else {
        header('location:index.php?delete_msg=Delete-successfully');
    }
}
?>
<?php include ('footer.php'); ?>