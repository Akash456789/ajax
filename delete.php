<?php
include('conn.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM stu WHERE id = $id";
    if(mysqli_query($con, $sql)) {
        echo "Data deleted successfully";
    } else {
        echo "Error deleting data: " . mysqli_error($con);
    }
}
?>
