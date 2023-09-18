<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Devchallenges</title>
   
   <!-- Enlaza el archivo de estilo de Bootstrap 5 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>

   <div class="container mt-4">
      <h1>Subir Imágenes</h1>
      <form action="../controller/update_image.php" enctype="multipart/form-data" method="POST">
         <div class="mb-3">
            <label for="image" class="form-label">Sube una imagen:</label>
            <input type="file" class="form-control" name="photo" id="photp">
         </div>
         <button type="submit" class="btn btn-primary">Subir Imagen</button>
      </form>

      <section class="mt-4">
         <?php
         require_once $_SERVER["DOCUMENT_ROOT"] . "../controller/database.php";

         $stmnt = $mysqli->query("SELECT * FROM usuarios");
         while ($row = $stmnt->fetch_assoc()) {
            if (isset($row["Photo"])) {
               $url = $row["Photo"];
               echo "<img src='" . $url . "' alt='Picture' class='img-fluid' style='max-height: 200px;' />";
            } else {
               echo "Error al cargar la imagen <br>";
            }
         }
         ?>
      </section>
   </div>

   <!-- Enlaza el archivo de JavaScript de Bootstrap 5 al final del cuerpo de tu página -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>