<?php 

require_once('db.php');
$db = new DB();

// Delete Data
if(isset($_POST['deleteData'])) {
  $id = $_POST['id'];
  $db->deleteData($id);
}

// Search Data
if (isset($_GET['buscar'])) {
  $data = $db->searchData($_GET['buscar']);
} else {
  $data = $db->getData();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Details</title>
  <style>
  body {
    font-family: "Roboto";
  }
  </style>
</head>

<body>

  <h1>Insertar</h1>
  <form action="insert.php" method="POST">
    <input type="text" placeholder="Nombre" name="name">
    <input type="text" placeholder="Email" name="email">
    <input type="submit" value="Insertar" name="insertData">
  </form>

  <h1>Borrar</h1>
  <form method="POST">
    <input type="text" placeholder="Id" name="id">
    <input type="submit" value="Borrar" name="deleteData">
  </form>

  <h1>Editar</h1>
  <form action="editData.php" method="POST">
    <input type="text" placeholder="Id" name="id">
    <input type="text" placeholder="Nombre" name="name">
    <input type="submit" value="Editar" name="editData">
  </form>

  <h1>Buscar</h1>
  <form method="GET">
    <input type="text" placeholder="Buscar" name="buscar"
      value="<?php if(isset($_GET['buscar'])) echo $_GET['buscar'] ?>">
    <input type="submit" value="Search">
  </form>

  <!-- Display Data -->

  <h1>Datos</h1>
  <?php 
  foreach($data as $i) {
    echo $i['id'] . ". " . $i['name'] . " - " . $i['email'] . "<br>";
  }
  
  ?>

</body>

</html>