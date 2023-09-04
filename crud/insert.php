<?php 
include ('header.php');
include ('connection.php');
if(isset($_POST['addstudents'])) {
    
    $name = $_POST['sname'];
    $address = $_POST['saddress'];
    $class = $_POST['sclass'];
    $phone = $_POST['sphone'];

    if ($name == ""||empty($name)) {
        header('location:index.php?message=Fill-the-name');
    }
    else {
        $query = "insert into `stuudent`(`sname`,`saddress`,`sclass`,`sphone`)
        values('$name','$address','$class','$phone')";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }else {
            header('location:index.php?insert_msg=Insert-process-is-successful');
        }
    }

}else {
    echo "problem";
}
?>