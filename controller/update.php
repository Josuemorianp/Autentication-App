<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST"){

   $id = $_POST["id"];
   $new_name = ($_POST["name"]);
   $new_bio = ($_POST["bio"]);
   $new_phone = $_POST["phone"];
   $new_email = $_POST["email"];
   $new_contrasena = $_POST["contrasena"];
   $new_photo = $_POST["photo"];

   $new_hash = password_hash($new_contrasena, PASSWORD_DEFAULT); // si no la pongo la vuelvo a embarrar

   require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

   try{
      $result=$mysqli->query("UPDATE usuarios SET nombre='$new_name',bio='$new_bio', phone='$new_phone', email='$new_email', contrasena='$new_contrasena', photo=$new_photo WHERE id=$id");

      if($result){
         header("location:/views/dashboard.php");
      }else{
         echo"error: ". $e->getMessage();;
      }
   }catch(mysqli_sql_exception $e){
      if($mysqli->errno === 1062){
         session_start();
         
         $_SESSION["duplicado"]=true; 
         header("Location: /views/personal-info.php");
      }else{
         echo"error: ". $e->getMessage();
      }
   }
}
?>