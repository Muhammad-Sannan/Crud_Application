<?php
include ('header.php');
include ('connection.php');
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        }
        $query = "select * from `stuudent` where `sid`='$id'";
        $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("query failed".mysqli_error());
                }else {
                    $row= mysqli_fetch_assoc($result);
              }
?>
<style>
    form{
        color:silver;
    }
</style>

<?php
    if (isset($_POST['updatestudents'])) {
        $name = $_POST['sname'];
        $address = $_POST['saddress'];
        $class = $_POST['sclass'];
        $phone = $_POST['sphone'];
        $query = "update `stuudent` set `sname`='$name',`saddress`='$address',`sclass`='$class',
        `sphone`='$phone' where `sid`='$id'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query failed".mysqli_error());
        }
        else {
            header('location:index.php?update_msg=data_updated_successfully');
        }
    }

?>
<form action="update.php?id=<?php echo $id;?>" method="post">
    <div class="form-group">
                <label for="f_name">Name</label>
                <input type="text" name="sname" class= "form-control" value="<?php echo $row['sname']?>">
            </div>
            <div class="form-group">
                <label for="saddress">Address</label>
                <input type="text" name="saddress" class= "form-control" value="<?php echo $row['saddress']?>">
            </div>
            <div class="form-group">
                <label for="sclass">Class</label>
                <input type="text" name="sclass" class= "form-control" value="<?php echo $row['sclass']?>">
            </div>
            <div class="form-group">
                <label for="sphone">Phone No</label>
                <input type="text" name="sphone" class= "form-control" value="<?php echo $row['sphone']?>">
    </div>
    <input type="submit" class="btn btn-success" name="updatestudents" value="UPDATE">
</form>
<?php include ('footer.php'); ?>