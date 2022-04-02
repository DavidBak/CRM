<?php 
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_start();
    session_unset();
    session_destroy();
    $url = "./index.php";
    header("Location: $url");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.5/datatables.min.css"/>
 


    <title>Server side DataTable</title>
  </head>
  
  <body>
    <div class="phppot-container">
	<div class="page-header">
	<span class="login-signup"> </span>
    </div>
    <div class="page-content" align="center">Welcome <?php echo $username; ?> <a href="logout.php">Logout</a></div>
	</div>

	<h2 class = "text-center">Contact Details</h2> 
	<div class = "container-fluid">
	    <div class = "row">
	        <div class = "container">
	            <div class ="row">
	                <div class="col-md-2"></div>
	                <div class = "col-md-8">
	                    <button type="button" style="margin-bottom: 40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">Add Contact</button>
	                </div>
	            </div>
	            <div class = "row"> 
	                <div class="col-md-2"></div>
	                <div class="col-md-8">
	                    <table id="datatable" class="table">
	                        <thead>
	                            <th>SNo.</th>
	                            <th width="200">Company </th>
	                            <th>F_Name</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Phone</th>
	                            <th>Title</th>
	                            <th>City</th>
	                            <th>Rating</th>
	                            <th>Background_Info</th>
	                            <th width="100">Options</th>
	                        </thead>
	                        <tbody>

	                        </tbody>
	                    </table>
	                </div>
	                <div class="col-md-2"></div>

	            </div>
	        </div>
	    </div>
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.5/datatables.min.js"></script>
    
    
    <script type="text/javascript">
        $(document).ready(function(){
           
            $('#datatable').DataTable({
                serverSide:true,
                //pageLength': 5,
                processing:true,
                paging : true,
                pagingType: "full_numbers",
                scrollX : true,
                //lengthChange : true,
                'searching': true,
                'ordering': true,
                'autoWidth': true,

                'order':[],
                'ajax':{
                    'url':'fetch_data.php',
                    'type':'post',
                },
                'fnCreatedRow':function(nRow, aData, iDataIndex)
                {
                    $(nRow).attr('id', aData[0]);
                },
                'columnDefs':[{
                    'target':[0,11],
                    'orderable':false,
                    }]
            
            });
        });
        

        $(document).on('submit', '#saveContactForm', function(event){
            event.preventDefault();
            var Company = $('#inputCompany').val();
            var Contact_First = $('#inputFirstName').val();
            var Contact_Last = $('#inputLastName').val();
            var Title = $('#inputTitle').val();
            var Phone = $('#inputPhone').val();
            var Email = $('#inputEmail').val();
            var Address = $('#inputAddress').val();
            var Address_Street_1 = $('#inputAddStr1').val();
            var Address_City = $('#inputAddCity').val();
            var Address_Zip = $('#inputAddZip').val();
            var Address_Country = $('#inputAddCountry').val();
            var Industry = $('#inputIndustry').val();
            var Status = $('#inputStatus').val();
            var Background_Info = $('#inputBackgInfo').val();
            var Sales_Rep = $('#inputSalesRep').val();
            var Rating = $('#inputRating').val();
        if(Company !='' && Contact_First !='' && Contact_Last !='' && Title !='' && Phone !='' && Email !='' && Address !='' && Address_Street_1 !='' && Address_City !='' && Address_Zip !='' && Address_Country !='' && Industry !='' && Status !='' && Background_Info !='' && Sales_Rep !='' && Rating !='')
        {
            $.ajax({
                url:"add_contact.php",
                data:{Company:Company, Contact_First:Contact_First, Contact_Last:Contact_Last, Title:Title, Phone:Phone, Email:Email, Address:Address, Address_Street_1:Address_Street_1, Address_City:Address_City, Address_Zip:Address_Zip, Address_Country:Address_Country, Industry:Industry,Status:Status,  Background_Info:Background_Info,Sales_Rep:Sales_Rep, Rating:Rating},
                type:'post',
                success:function(data){
                    var json = JSON.parse(data);
                    status = json.status;
                    if(status == 'success')
                    {
                        table = $('#datatable_add').DataTable();
                        table.draw();
                        alert('successfully Contact added');
                        $('#inputCompany').val('');
                        $('#inputFirstName').val('');
                        $('#inputLastName').val('');
                        $('#inputTitle').val('');
                        $('#inputPhone').val('');
                        $('#inputEmail').val('');
                        $('#inputAddress').val('');
                        $('#inputAddStr1').val('');
                        $('#inputAddCity').val('');
                        $('#inputAddZip').val('');
                        $('#inputAddCountry').val('');
                        $('#inputIndustry').val('');
                        $('#inputStatus').val('');
                        $('#inputBackgInfo').val('');
                        $('#inputSalesRep').val('');
                        $('#inputRating').val('');
                        
            
                        $('#addContactModal').modal('hide');
                    }
                }
            });
        }
        else
        {
            alert("Please fill all the Required fields");
        }
        });
        
        $(document).on('click', '.editBtn', function(event){
            var id=$(this).data('id');
            var trid =$(this).closest('tr').attr('id');
            $.ajax({
                url:"get_single_contact.php", 
                data:{id:id},
                type:"post",
                success:function(data)
                {
                    var json= JSON.parse(data);
                    $('#id').val(json.id);
                    $('#trid').val(trid);
                    $('#_inputCompany').val(json.Company);
                    $('#_inputFirstName').val(json.Contact_First);
                    $('#_inputLastName').val(json.Contact_Last);
                    $('#_inputTitle').val(json.Title);
                    $('#_inputPhone').val(json.Phone);
                    $('#_inputEmail').val(json.Email);
                    $('#_inputAddress').val(json.Address);
                    $('#_inputAddStr1').val(json.Address_Street_1);
                    $('#_inputAddCity').val(json.Address_City);
                    $('#_inputAddZip').val(json.Address_Zip);
                    $('#_inputAddCountry').val(json.Address_Country);
                    $('#_inputIndustry').val(json.Industry);
                    $('#_inputStatus').val(json.Status);
                    $('#_inputBackgInfo').val(json.Background_Info);
                    $('#_inputSalesRep').val(json.Sales_Rep);
                    $('#_inputRating').val(json.Rating);
                    $('#editContactModal').modal('show');

                }
            });
        });
        
        $(document).on('submit', '#updateContactForm', function(){
            var id = $('#id').val();
            var trid = $('#trid').val();
            var Company = $('#_inputCompany').val();
            var Contact_First = $('#_inputFirstName').val();
            var Contact_Last = $('#_inputLastName').val();
            var Title = $('#_inputTitle').val();
            var Phone = $('#_inputPhone').val();
            var Email = $('#_inputEmail').val();
            var Address = $('#_inputAddress').val();
            var Address_Street_1 = $('#_inputAddStr1').val();
            var Address_City = $('#_inputAddCity').val();
            var Address_Zip = $('#_inputAddZip').val();
            var Address_Country = $('#_inputAddCountry').val();
            var Industry = $('#_inputIndustry').val();
            var Status = $('#_inputStatus').val();
            var Background_Info = $('#_inputBackgInfo').val();
            var Sales_Rep = $('#_inputSalesRep').val();
            var Rating = $('#_inputRating').val();
            $.ajax({
                url:"update_contact.php",
                data:{id:id,Company:Company,Contact_First:Contact_First,Contact_Last:Contact_Last,Title:Title,Phone:Phone,Email:Email,Address:Address,Address_Street_1:Address_Street_1,Address_City:Address_City,Address_Zip:Address_Zip,Address_Country:Address_Country,Industry:Industry,Status:Status,Background_Info:Background_Info,Sales_Rep:Sales_Rep,Rating:Rating},
                type:'post',
                success:function(data)
                {
                    var json = JSON.parse(data);
                    status = json.status;
                    if(status == 'success')
                    {
                        table = $('#datatable_update').DataTable();
                        var button = '<a href = "javascript:void();"  class = "btn btn-sm btn-info editBtn" data-id="' + id + '">Edit</a> <a href = "javascript:void();"  class = "btn btn-sm btn-danger btnDelete" data-id="' + id + '">Delete</a>' ;
                        var row = table.row("[id='" + trid + "']");
                        row.row("[id='" + trid + "']").data([id, Company,Contact_First,Contact_Last,Email, Phone, Title, Address_City,Rating, Background_Info, button]);
                        
                        $('#editContactModal').modal('hide');
                    
                    }
                    else
                    {
                        alert('failed');
                    }
                }
            });
        });

    
        $(document).on('click', '.btnDelete', function(event){
            var id = $(this).data('id');
            if(confirm('Are you sure want to delte this contact?'))
            {
                $.ajax({
                    url:"delete_contact.php",
                    data:{id:id},
                    type:"post",
                    success:function(data)
                    {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if(status=='success')
                        {
                            $('#' + id).closest('tr').remove();
                        }
                        else{
                            alert('failed');
                                }
                        }
                    });
                }
            });
                                
    </script>
    
    <!-- add contact modal -->
    <!-- Modal -->
    <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="saveContactForm" action ="javascript:void();" method ="post">
          <div class="modal-body">
 <!--              
              <div class="mb-3 row">
                <label for="inputCompany" class="col-sm-2 col-form-label">Sno.</label>
                <div class="col-sm-10">
                  <input type="text" name="Company" class="form-control" id="inputCompany" >
                </div>
              </div>
 -->             
              <div class="mb-3 row">
                <label for="inputCompany" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                  <input type="text" name="Company" class="form-control" id="inputCompany" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="Contact_First" class="form-control" id="inputFirstName" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="Contact_Last" class="form-control" id="inputLastName">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="Title" class="form-control" id="inputTitle" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="text" name="Phone" class="form-control" id="inputPhone">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="Email" class="form-control" id="inputEmail" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" name="Address" class="form-control" id="inputAddress" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputAddStr1" class="col-sm-2 col-form-label">Address Street</label>
                <div class="col-sm-10">
                  <input type="text" name="Address_Street_1" class="form-control" id="inputAddStr1" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputAddCity" class="col-sm-2 col-form-label">Address City</label>
                <div class="col-sm-10">
                  <input type="text" name="Address_City" class="form-control" id="inputAddCity">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputAddZip" class="col-sm-2 col-form-label">Address Zip</label>
                <div class="col-sm-10">
                  <input type="number" name="Address_Zip" class="form-control" id="inputAddZip">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputAddCountry" class="col-sm-2 col-form-label">Address Country</label>
                <div class="col-sm-10">
                  <input type="text" name="Address_Country" class="form-control" id="inputAddCountry">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputIndustry" class="col-sm-2 col-form-label">Industry</label>
                <div class="col-sm-10">
                  <input type="text" name="Industry" class="form-control" id="inputIndustry">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <input type="number" name="Status" class="form-control" id="inputStatus" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputBackgInfo" class="col-sm-2 col-form-label">Background Info</label>
                <div class="col-sm-10">
                  <input type="text" name="Background_Info" class="form-control" id="inputBackgInfo" >
                </div>
              </div>

              <div class="mb-3 row">
                <label for="inputSalesRep" class="col-sm-2 col-form-label">Sales Rep</label>
                <div class="col-sm-10">
                  <input type="number" name="Sales_Rep" class="form-control" id="inputSalesRep" >
                </div>
              </div>

              <div class="mb-3 row">
                <label for="inputRating" class="col-sm-2 col-form-label">Rating</label>
                <div class="col-sm-10">
                  <input type="number" name="Rating" class="form-control" id="inputRating" >
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
          
        </div>
      </div>
    </div>
    <!-- add contact modal end -->

    <!-- edit contact modal -->
    <!-- Modal -->
    <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabele" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabele">Update Contact</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateContactForm" action ="javascript:void();" method ="post">
          <div class="modal-body">
              <input type="hidden" id="id" name="id" value= "">
              <input type="hidden" id="trid" name="trid" value= "">

              <div class="mb-3 row">
                <label for="_inputCompany" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                  <input type="text" name="_Company" class="form-control" id="_inputCompany" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="_Contact_First" class="form-control" id="_inputFirstName" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="_Contact_Last" class="form-control" id="_inputLastName">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="_inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="_Title" class="form-control" id="_inputTitle" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="text" name="_Phone" class="form-control" id="_inputPhone">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="_Email" class="form-control" id="_inputEmail" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" name="_Address" class="form-control" id="_inputAddress" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputAddStr1" class="col-sm-2 col-form-label">Address Street</label>
                <div class="col-sm-10">
                  <input type="text" name="_Address_Street_1" class="form-control" id="_inputAddStr1" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputAddCity" class="col-sm-2 col-form-label">Address City</label>
                <div class="col-sm-10">
                  <input type="text" name="_Address_City" class="form-control" id="_inputAddCity">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputAddZip" class="col-sm-2 col-form-label">Address Zip</label>
                <div class="col-sm-10">
                  <input type="number" name="_Address_Zip" class="form-control" id="_inputAddZip">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputAddCountry" class="col-sm-2 col-form-label">Address Country</label>
                <div class="col-sm-10">
                  <input type="text" name="_Address_Country" class="form-control" id="_inputAddCountry">
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputIndustry" class="col-sm-2 col-form-label">Industry</label>
                <div class="col-sm-10">
                  <input type="text" name="_Industry" class="form-control" id="_inputIndustry">
                </div>
              </div>
  
              <div class="mb-3 row">
                <label for="_inputStatus" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <input type="number" name="_Status" class="form-control" id="_inputStatus" >
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="_inputBackgInfo" class="col-sm-2 col-form-label">Background Info</label>
                <div class="col-sm-10">
                  <input type="text" name="_Background_Info" class="form-control" id="_inputBackgInfo" >
                </div>
              </div>

              <div class="mb-3 row">
                <label for="_inputSalesRep" class="col-sm-2 col-form-label">Sales Rep</label>
                <div class="col-sm-10">
                  <input type="number" name="_Sales_Rep" class="form-control" id="_inputSalesRep" >
                </div>
              </div>

              <div class="mb-3 row">
                <label for="_inputRating" class="col-sm-2 col-form-label">Rating</label>
                <div class="col-sm-10">
                  <input type="number" name="_Rating" class="form-control" id="_inputRating" >
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
          
        </div>
      </div>
    </div>
    <!-- add user modal end -->
    

  </body>
</html>
	