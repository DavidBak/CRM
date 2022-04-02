<?php include 'db_connection.php';

$id = $_POST['id'];

$sql = "SELECT * FROM contact WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

?>
 
  