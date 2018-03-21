<?php
  $host = 'localhost';
  $user = 'root';
  $pass = 'EasyPass321';
  $db = 'msps';
  $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
