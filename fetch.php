<?php
include('conn.php');
$sql = "SELECT * FROM stu";
$sele = mysqli_query($con, $sql);
?>
<table border="1px solid black">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>photo</th>
        <th>state</th>
        <th>Gender</th>
        <th>Language</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($sele)) {
        ?>
        <tr>
            <td><?php echo $res['name'] ?></td>
            <td><?php echo $res['email'] ?></td>
            <td><?php echo $res['password'] ?></td>
            
            <td><img src="<?php echo $res['photo'] ?>"  width="50px"/></td>
            <td><?php echo $res['city'] ?></td>
            <td><?php echo $res['gender'] ?></td>
            <td><?php echo $res['language'] ?></td>
            <td><button class="delete-btn" data-id="<?php echo $res['id']; ?>">Delete</button></td> 
            <td><button class="update-btn" data-id="<?php echo $res['id']; ?>">Update</button></td> 

        </tr>
        <?php
    }
    ?>
</table>
