<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo[]" multiple /><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>



<?php
// include('../conn.php');

// if(isset($_POST['submit'])){
//     $photos = $_FILES['photo'];

//     foreach($photos['tmp_name'] as $key => $tmp_name){
//         $filename = $photos['name'][$key];
//         $filetmp = $tmp_name;
//         $dis = 'upload2/' . $filename;

//         move_uploaded_file($filetmp, $dis);

//         $query = "INSERT INTO stu2 (`photo`) VALUES ('$dis')";
//         $insert = mysqli_query($con, $query);

//         if($insert){
//             echo "Data inserted successfully for file: $filename<br>";
//         }else{
//             echo "Failed to insert data for file: $filename<br>";
//         }
//     }
// }
?>




<?php
include('../conn.php');

if(isset($_POST['submit'])){
    $photos = $_FILES['photo'];
    $filePaths = [];

    foreach($photos['tmp_name'] as $key => $tmp_name){
        $filename = $photos['name'][$key];
        $filetmp = $tmp_name;
        $dis = 'upload2/' . $filename;

        move_uploaded_file($filetmp, $dis);
        $filePaths[] = $dis;
    }

    $filePathString = implode(',', $filePaths);

    $query = "INSERT INTO stu2 (`photo`) VALUES ('$filePathString')";
    $insert = mysqli_query($con, $query);

    if($insert){
        echo "Data inserted successfully for files: " . implode(', ', $filePaths) . "<br>";
    } else {
        echo "Failed to insert data.<br>";
    }
}
?>
