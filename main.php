<?php
  $user = 'a01568073';
  $pass = '63236konsti';
  $database = 'lab';
 
  // establish database connection
  $conn = oci_connect($user, $pass, $database);
  if (!$conn) exit;
?>