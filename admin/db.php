 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "layouts";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$base_url = "http://localhost/layoutsfree.com/"

?> 