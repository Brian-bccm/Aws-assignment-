<?php
include('../config/constants.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql2 = "SELECT img FROM tbl_admin WHERE id = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result2);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($result2);
        $img = $row['img'];
        unlink("http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/admin/" . $img);
    }
    $sql1 = "DELETE FROM tbl_admin WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);

    if($result1 == TRUE)
    {
        $_SESSION['delete-admin'] = "<h2 class='success'>Admin Delete Succesfully</h2>";
        header('location:manage-admin.php');
    }
    else
    {
        $_SESSION['delete-admin'] = "<h2 class='error'>Failed to Delete Admin</h2>";
        header('location:manage-admin.php');
    }
}
else
{
    header('location:manage-admin.php');
}
?>