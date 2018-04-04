<?php
  require 'connect.php';
  $events = $mysqli->query("SELECT * FROM event");
  $rows = array();
  while ($r = $events->fetch_assoc()) {
    $rows[] = $r;
  }
print json_encode($rows);
 ?>
