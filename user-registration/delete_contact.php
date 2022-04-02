<?php include 'db_connection.php';

$id = $_POST['id'];
$sql = "DELETE FROM contact WHERE id='$id'";
$query = mysqli_query($conn, $sql);


if($query ==true)
{
    $data = array(
    'status' => 'success', 
    );
    echo json_encode($data);
}
else{

printf("error: %s\n", mysqli_error($conn));
$data = array(
    'status' => 'failed', 
    );
echo json_encode($data); }