<?php

$mysqli = new mysqli('localhost', 'root', '', 'qbase');

$query = $mysqli->query('SELECT * FROM category');

while($assoc = $query->fetch_assoc()) {
  print_r($assoc);
}
