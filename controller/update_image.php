<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

   $type = substr($_FILES["photo"]["tmp_name"], 0, 5);
   var_dump($type);

   if($type === "photo"){
      $tmnt_location = $_FILES["photo"]["tmp_name"];

      $fn_location_db = "/assets/" . $_FILES["photo"]["name"];
      $fn_location = $_SERVER["DOCUMENT_ROOT"] . $fn_location_db;

      if (move_uploaded_file($tmp_location, $fn_location)) {
         $mysqli -> query("INSERT INTO usuarios(url_imagen) VALUES ('$fn_location_db')");
         header("location: /views/imagenes.php");
      }else{
         echo "Solo puede subir imagenes";
         header("location: /views/change-info.php");

      }
   }
}