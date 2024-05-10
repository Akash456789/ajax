<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>PHOTO</th>
        </tr>
        <?php
//         include('../conn.php');
// $query="select * from stu2";
// $select =mysqli_query($con,$query);

// while($res=mysqli_fetch_assoc($select)){

?>

<tr>
    <td><?
    // php echo $res['id']; 
     ?></td>
   
<td><img src="<?
// php echo $res['photo']; 
 ?>" width="100px" /></td>


</tr>

 <?php   

// }
?>


    </table>
</body>
</html>
 -->






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>PHOTO</th>
        </tr>
        <?php
        include('../conn.php');

        $query = "SELECT * FROM stu2";
        $select = mysqli_query($con, $query);

        while($res = mysqli_fetch_assoc($select)) {
            $id = $res['id'];
            $photoPaths = explode(',', $res['photo']); 
            
            foreach($photoPaths as $path) {
                echo '<tr>';
                echo '<td>' . $id . '</td>';
                echo '<td><img src="' . $path . '" width="100px" /></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</body>
</html>



