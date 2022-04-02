<?php include 'db_connection.php';

$sql_ = "SELECT * FROM contact";

$sql = "SELECT id, Company,Contact_Last, Contact_First,Email, Phone, Title, Address_City, Rating, Background_Info FROM contact";
    
// Check connection
if (mysqli_connect_errno()) {
        echo " Database connection error!";
        exit;}

$totalquery = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($totalquery);


$columns = array(
	0 => 'id',
	1 => 'Company',
	2 => 'Contact_Last',
	3 => 'Contact_First',
	4 => 'Email',
	5 => 'Phone',
	6 => 'Title',
	7 => 'Address_City',
	8 => 'Rating',
	9 => 'Background_Info',

);

if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE Company like '%".$search_value."%' ";
    $sql .= " OR Contact_Last like '%".$search_value."%' ";
    $sql .= " OR Contact_First like '%".$search_value."%' ";
    $sql .= " OR Email like '%".$search_value."%' ";
    $sql .= " OR Phone like '%".$search_value."%' ";
    $sql .= " OR Title like '%".$search_value."%' ";
    $sql .= " OR Address_City like '%".$search_value."%' ";
    $sql .= " OR Rating like '%".$search_value."%' ";
    $sql .= " OR Background_Info like '%".$search_value."%' ";
}

if(isset($_POST['order']))
{
    $columne = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ". $columns[$columne]." ".$order."";
    
}
else
{
    $sql .="ORDER BY id desc";
}

if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .=" LIMIT ".$start.", ".$length;
}

$data = array();
$run_query = mysqli_query($conn, $sql);
$filtered_rows = mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query))
{
    $subarray = array();
    $subarray[] = $row['id'];
    $subarray[] = $row['Company'];
    $subarray[] = $row['Contact_Last'];
    $subarray[] = $row['Contact_First'];
    $subarray[] = $row['Email'];
    $subarray[] = $row['Phone'];
    $subarray[] = $row['Title'];
    $subarray[] = $row['Address_City'];
    $subarray[] = $row['Rating'];
    $subarray[] = $row['Background_Info'];
    $subarray[] = '<a href="javascript:void();" data-id="'.$row['id'].'"   class="btn btn-sm btn-info editBtn">Edit</a> <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-danger btnDelete">Delete</a>';
    
    $data[] = $subarray;
    
}

$output = array(
    'draw'=>intval($_POST['draw']),
    'recordsTotal'=>$filtered_rows,
    'recordsFiltered'=>$total_all_rows,
    'data'=>$data,
    );

echo json_encode($output);