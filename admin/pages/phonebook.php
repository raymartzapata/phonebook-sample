<?php
include('../database/connection.php');
?>
<?php
    $epr='';
    if(isset($_GET['epr']))
    $epr=$_GET['epr'];

if($epr =='delete'){
    $id=$_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM contact WHERE ID='$id';");
    if($delete){
      echo "<script>alert('Delete Successful!'); window.location.href='phonebook.php';</script>";
    }
    else{
      //$msg='Error: '.mysql_error();
      echo "Error deleting content: " . mysqli_error($conn);
    }
  }
  
mysqli_close($conn);
?>

<?php include "../templates/templates.php"; 
        headertemplate('Phonebook | User'); ?>

  <body class="skin-blue">
    <div class="wrapper">
      
     <?php navbar('phonebook'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Contacts</h3>
            </div>
            <div id="box">
            <?php
            include('../database/connection.php');
            if ($epr == 'update') {
                $id = $_GET['id'];
                $st_row = mysqli_query($conn, "SELECT * from contact where ID = '$id'");
                $row = mysqli_fetch_assoc($st_row);
            ?>
            <div class="col-lg-12" style="">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-plus-circle"></i> Update Information
                        </h3>
                    </div>
                <div class="panel-body">
                    <div class="col-md-6 cold-md-offset-3">
                        <form action='../functions/update_contact.php?epr=updateup' method="POST" enctype="multipart/form-data">
                            <input type="text" name="idtextbox" id="idtextbox" class="form-control" value="<?php echo $row['ID']; ?>" readonly>
                            <label>Name</label>    
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['cname']; ?>">
                            <label>Number</label>    
                            <input type="text" name="number" id="number" class="form-control" value="<?php echo $row['phone_number']; ?>">
                            <label>Address</label>    
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['address']; ?>">
                            <br> <br>

                            <input type="submit" class="btn btn-info" id="submit" name="submit" value="Save Changes">
                            <button type="button" class="btn btn-default" onclick="location.href='phonebook.php'">Cancel</button>
                        </form>
                    </div>
                </div>        
                </div>
            </div>
            </div>
            <?php
            }
            ?>
            <div class="panel-body">
                <div class="box-tools pull-right">
                <button class="btn btn-flat btn-primary" data-toggle="modal" data-target="#addOfficial" title="Add New Contact" id="add"><i class="glyphicon glyphicon-plus"></i></button>
                <span>Add Record</span>
                </div>
                <br /> <br /> <br />
                  <table id="roomtable" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>                                
                      <?php 
                      include('../database/connection.php');
                      $id=$_SESSION['ID'];
                      $query=mysqli_query($conn,"select * from contact where user_ID='$id'")or die(mysqli_error());
                      while ($row = mysqli_fetch_assoc($query)){

                      $picture = $row['image'];
                      $name = $row['cname'];
                      $number = $row['phone_number'];
                      $address = $row['address'];

                      echo "
                      <tr>
                      <td><img src='../image/$picture' width='50' height='50' class='img-circle'/></td>
                      <td>$name</td>
                      <td>$number</td>
                      <td>$address</td>

                      <td>
                        <a href='phonebook.php?epr=update&id=".$row['ID']."' class='btn btn-flat btn-success' data-toggle='tooltip' title='Edit Record' id='edit'><i class='glyphicon glyphicon-edit'></i>
                           </a>
                          <a href='phonebook.php?epr=delete&id=".$row['ID']."'OnClick='return validatedelete()' class='btn btn-flat btn-danger'  data-toggle='tooltip' title='Delete Record' id='delete'><i class='glyphicon glyphicon-trash'></i>
                           </a>
                      </td>
                      </tr>";
                      }
                      ?>                            
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
            
          </div><!-- /.box -->
       </section>

       <!-- Add Room -->
<div class="modal fade" id="addOfficial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action='../functions/add_contact.php?epr=save' enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Contact</h4>
      </div>
      <div class="modal-body">
        <div class="messages"></div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter name" maxlength="30" required="">
        </div>
        <div class="form-group">
          <label>Number</label>
          <input type="text" class="form-control" id="number" name="number" placeholder="Enter number" maxlength="11" required="">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control" id="autocomplete" onFocus="geolocate()" name="address" placeholder="Enter Address" required="">
        </div>
        <div class="form-group">
          <label>Picture</label>
          <input type="file" id="image" name="image" accept="image/*" required />
        </div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
     <script type="text/javascript">

      var table = $("#roomtable").DataTable();

      $('#roomtable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            //table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        } );
     </script>

  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name'
        
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDalsripaITigUbs5VjNizFhnEb9Htle70&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script>
      function validatedelete() {
         var x = confirm("Are you sure you want to delete?");
    if (x)
      return true;
    else
    return false;
    }
    </script>
  </body>
</html>