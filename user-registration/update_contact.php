<?php include 'db_connection.php';

/* $conn = mysqli_connect("localhost","debaktra_debak","]Hf;~1@BMKm1","debaktra_custom_crm");
*/

$id= $_POST['id'];
$Company= $_POST['Company'];
$Contact_First= $_POST['Contact_First'];
$Contact_Last= $_POST['Contact_Last'];
$Title= $_POST['Title'];
$Phone= $_POST['Phone'];
$Email= $_POST['Email'];
$Address= $_POST['Address'];
$Address_Street_1= $_POST['Address_Street_1'];
$Address_City= $_POST['Address_City'];
$Address_Zip= $_POST['Address_Zip'];
$Address_Country = $_POST['Address_Country'];
$Industry= $_POST['Industry'];
$Status= $_POST['Status'];
$Background_Info= $_POST['Background_Info'];
$Sales_Rep= $_POST['Sales_Rep'];
$Rating= $_POST['Rating'];

$sql = "UPDATE contact SET Company ='$Company', Contact_First= '$Contact_First', Contact_Last='$Contact_Last', Title='$Title', Phone='$Phone', Email='$Email', Address='$Address', Address_Street_1='$Address_Street_1', Address_City='$Address_City', Address_Zip='$Address_Zip', Address_Country='$Address_Country', Industry='$Industry', Status='$Status', Background_Info='$Background_Info', Sales_Rep='$Sales_Rep', Rating ='$Rating'  WHERE id='$id' ";

$query = mysqli_query($conn,$sql);

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