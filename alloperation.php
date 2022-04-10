<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>CRUD Operation</title>
</head>
<body>
    
 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "crudoperation";
 $link = mysqli_connect($servername, $username, $password,$dbname );
 $conn = mysqli_select_db($link , $dbname);

 if($conn==true)
 {
     echo ("Connection done ");
 }
 else
 {
     die("connection failed".mysqli_connection_error());
 }

 echo"<br>";


 

?>

<div align = "center">
    <form action="alloperation.php" method = "POST">
        <table>
            <tr>
                <td>Enter Name </td>
                <td><input type="text" name = "name"></td>
            </tr>
            <tr>
                <td>Enter ID </td>
                <td><input type="number" name = "id"></td>
            </tr>
            <tr>
                <td>Enter Email </td>
                <td><input type="email" name = "email"></td>
            </tr>
            <tr>
                <td>Enter Password </td>
                <td><input type="password" name = "password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name ="submit1" value = "insert">
                    <input type="submit" name ="submit2" value = "delete">
                    <input type="submit" name ="submit3" value = "update">
                    <input type="submit" name ="submit4" value = "display">
                    <input type="submit" name ="submit5" value = "search">
                </td>
            </tr>
        </table>

    </form>

</div>


</body>
</html>

<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into information_table values ('$_POST[name]','$_POST[id]','$_POST[email]','$_POST[password]')");
    echo"Successfully inserted ";
}

if(isset($_POST["submit2"]))
{
    mysqli_query($link,"delete from information_table where name='$_POST[name]'");
    echo"Successfully deleted ";
}

if(isset($_POST["submit3"]))
{
    mysqli_query($link,"update information_table set name='$_POST[password]' where name='$_POST[name]'");
    echo"Successfully Updated ";
}

if(isset($_POST["submit4"]))
{
    $res=mysqli_query($link,"select * from information_table");
    echo"<table border=1>";
    echo"<tr>";
    echo"<th>"; echo "name";  echo"</th>";
    echo"<th>"; echo "id";  echo"</th>";
    echo"<th>"; echo "email";  echo"</th>";
    echo"<th>"; echo "password";  echo"</th>";

    echo"</tr>";

    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<th>";echo $row["name"];  echo"</th>";
    echo"<th>";echo $row["id"];  echo"</th>";
    echo"<th>";echo $row["email"];  echo"</th>";
    echo"<th>";echo $row["password"];  echo"</th>";

    echo"</tr>";
    }
    echo"</table>";
}

if(isset($_POST["submit5"]))
{
    $res=mysqli_query($link,"select * from information_table where name='$_POST[name]'");
    echo"<table border=1>";
    echo"<tr>";
    echo"<th>";echo"name";  echo"</th>";
    echo"<th>";echo"id";  echo"</th>";
    echo"<th>";echo"email";  echo"</th>";
    echo"<th>";echo"password";  echo"</th>";

    echo"</tr>";

    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<th>";echo $row["name"];  echo"</th>";
    echo"<th>";echo $row["id"];  echo"</th>";
    echo"<th>";echo $row["email"];  echo"</th>";
    echo"<th>";echo $row["password"];  echo"</th>";

    echo"</tr>";
    }
    echo"</table>";
}

?>