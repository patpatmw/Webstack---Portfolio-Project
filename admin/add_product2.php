
<?php
session_start();

include 'dbconnect.php';

    $name=$_POST['name'];
    $pcode=$_POST['pcode'];
    $description=$_POST['description'];
    $price=$_POST['mprice'];
    $location=$_POST['location'];
    $id= $_SESSION['user_id'];
    $filename = $_FILES["imageUpload"]["name"];
    $result=null;
    
 //echo $name;
 //echo $filename;
 //echo $description;
 //echo $price;
 //echo $id;
    
  
$insertSql = "INSERT INTO products (pcode,user_id,productname, description, `unit price`, location, imgname) VALUES ('$pcode','$id','$name', '$description', $price, '$location','$filename' )";

if ($conn->query($insertSql) === TRUE) 
{   
    $result="<h2>*******Data insert success*******</h2>";
    $tempname = $_FILES["imageUpload"]["tmp_name"];   
    $folder = "img/".$filename;

    move_uploaded_file($tempname, $folder);
    echo $result;
    
        
}
else
{  
    $result="<h2>*******Data insert unsuccessful*******</h2>";
    echo $result;
    
 die($conn -> error);
}
?>