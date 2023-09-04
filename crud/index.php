<?php include ('header.php'); ?>
<?php include ('connection.php');?>
        <div class="box1">
            <h2>All Students</h2>
        <button class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal">ADD DATA</button>
        <table class="table table-hover table-bordered table-striped">
        </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from `stuudent`";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("query failed".mysqli_error());
                }else {
                    while ($row= mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['sid'];?></td>
                            <td><?php echo $row['sname'];?></td>
                            <td><?php echo $row['saddress'];?></td>
                            <td><?php echo $row['sclass'];?></td>
                            <td><?php echo $row['sphone'];?></td>
                            <td><a href="update.php?id=<?php echo $row['sid'];?>"class= "btn btn-success" >Update</a></td>
                            <td><a href="delete.php?id=<?php echo $row['sid'];?>"class= "btn btn-danger" >Delete</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
<?php  
if (isset($_GET['message'])) {
    echo "<h6>".$_GET['message']."</h6>";   
}
?>
 <?php  
if (isset($_GET['insert_msg'])) {
    echo "<h5>".$_GET['insert_msg']."</h5>";   
}
?>
<?php  
if (isset($_GET['update_msg'])) {
    echo "<h5>".$_GET['update_msg']."</h5>";   
}
?>
<?php  
if (isset($_GET['delete_msg'])) {
    echo "<h5>".$_GET['delete_msg']."</h5>";   
}
?>
<form action="insert.php" method= "post">        
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="f_name">Name</label>
                <input type="text" name="sname" class= "form-control">
            </div>
            <div class="form-group">
                <label for="saddress">Address</label>
                <input type="text" name="saddress" class= "form-control">
            </div>
            <div class="form-group">
                <label for="sclass">Class</label>
                <input type="text" name="sclass" class= "form-control">
            </div>
            <div class="form-group">
                <label for="sphone">Phone No</label>
                <input type="text" name="sphone" class= "form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="addstudents" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
   <?php include ('footer.php'); ?>