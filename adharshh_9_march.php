<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor = "honeydew">
    <center><form method = "POST" action ="">
        <table>
            <tr>
                <th>Name</th>
                <td> <input type="text" name="fname"></td>
</tr>
<tr>
                <th>Place</th>
                <td> <input type="text" name="fplace"></td>
</tr>
<tr>
                <th>Phone:</th>
                <td> <input type="text" name="fphone"></td>
</tr>
<tr>
                <td> <input type="submit" name="submit1" value ="submit"></td>
</tr>
</table>
<form></center>

</body>
</html>
<?php
if(isset($_POST['submit1']))
{
    $a = $_POST['fname'];
    $b = $_POST['fplace'];
    $c = $_POST['fphone'];
    $conn = mysqli_connect("localhost","root","");
    if(!$conn)
    {
        echo "connection failed";
    }
    $db = mysqli_select_db($conn,"lab1");
    if(!$db){
        echo "database error";
    }
    $in = "INSERT INTO details(name,place,phone)VALUES('$a','$b','$c')";
    $d = mysqli_query($conn,$in);
    if(!$d)
    {
        echo "insert failed";

    }

    $e ="SELECT * FROM details";
    $f = mysqli_query($conn,$e);
    if(!$f)
    {
        echo "insert failed";
    }
    else{
        echo "<table border = '2'>
        <tr><th>Name</th>
        <th>Place</th>
        <th>Phone</th></tr>";
        
    }
    while($row = mysqli_fetch_assoc($f))
    {
        echo "<tr><td>".$row['name']."</td><td>".$row['place']."</td><td>".$row['phone']."</td></tr>";
    }
    echo "</table>";
}
?>