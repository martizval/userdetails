<?php 

require_once 'db.php';

if(isset($_POST['insertData'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $db = new DB();
  $db->insertData($name, $email);
  header('Location: index.php');
}