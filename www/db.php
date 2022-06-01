<?php
session_start();

$bd_connection = mysqli_connect(
  'mysql',
  'root',
  'admin',
  'gamingbox'
) or die(mysqli_erro($mysqli));

?>