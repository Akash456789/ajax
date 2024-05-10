<?php
include('conn.php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// Perform update operation
$sql = "UPDATE stu SET name='$name', email='$email', password='$pass' WHERE id=$id";
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>
