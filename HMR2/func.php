<?php
require_once 'connection.php';


$sql = "SELECT * FROM users";
$result = $conn->mysqli_query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["roletype"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
