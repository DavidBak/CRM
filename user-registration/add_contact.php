 
<?php include 'db_connection.php';

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


if (mysqli_connect_errno()) {
        echo " Database connection error!";
        exit;}

$sql = "INSERT INTO contact (Company, Contact_First, Contact_Last, Title, Phone,Email, Address, Address_Street_1, Address_City, Address_Zip, Address_Country, Industry, Status, Background_Info, Sales_Rep, Rating) VALUES ('$Company', '$Contact_First','$Contact_Last','$Title','$Phone','$Email', '$Address',  '$Address_Street_1','$Address_City', '$Address_Zip', '$Address_Country', '$Industry', '$Status', '$Background_Info', '$Sales_Rep', '$Rating')";



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
