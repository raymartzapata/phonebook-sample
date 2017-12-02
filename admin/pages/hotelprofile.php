
<?php error_reporting(0);?>
<?php include "../templates/templates.php"; 
        headertemplate('Hotel Profile | Administrator'); ?>

  <body class="skin-blue">
<?php 
include('../database/connection.php');
 ?>

    <div class="wrapper">
      
     <?php navbar('profile'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><span class="glyphicon glyphicon-pencil"></span>
            Hotel Profile
          </h1>
        </section>

       <section class="content">
            <div class="box box-primary">
              <div class="panel-body">
                <div class='form-group'>
                 
                 <?php
        $member=$_SESSION['ID'];
          $query=mysqli_query($conn,"select * from hotel_registration where account_ID='$member'")or die(mysqli_error());
        $row=mysqli_fetch_array($query);
      ?>  
          <!-- Main content -->
          <section class="content">
            <div class="row">
        <div class="col-md-12">
                <div class="box-body">
                  <!-- Date range -->
                <form method="POST" action="../functions/update_hotelimage.php?epr=updateimage" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Picture</label>
                    <img src="../image/<?php echo $row['image']; ?>" width="150" height="150" class="img-circle" alt="User Image" />
                    <input type="file" id="image" name="image" accept="image/*">
                  </div><!-- /.form group -->
                  <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary" id="submit">
                        Save
                      </button>
                  </div><!-- /.form group -->
                  <hr>
                </form>
                <form method="POST" action="../functions/update_hotelprofile.php?epr=update" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                      <label>Hotel Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['hotel_name'];?>" name="hname" placeholder="Hotel Name">
                      </div><!-- /.input group -->
                      <div class="col-md-6">
                      <label>Email Address</label>
                        <input type="text" class="form-control" value="<?php echo $row['email_address'];?>" name="email_address" placeholder="Email Address">
                        <br>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                    <label>Address</label>
                      <input type="text" class="form-control pull-right" value="<?php echo $row['address'];?>" name="address" placeholder="Address" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="col-md-6">
                    <br>
                    <label>Postal Code</label>
                      <input type="text" class="form-control" value="<?php echo $row['postal_code'];?>" name="postal_code" placeholder="Hotel Name">
                    </div><!-- /.input group -->
                    <div class="col-md-6">
                    <br>
                    <label>Contact Number</label>
                      <input type="text" class="form-control" value="<?php echo $row['contact_number'];?>" name="contact_number" placeholder="Contact Number">
                      <br>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="col-md-12">
                    <label>Description</label>
                      <input type="text" class="form-control" value="<?php echo $row['description'];?>" name="description" placeholder="Contact Number">
                      <br>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary" id="submit">
                        Save
                      </button>
                  </div><!-- /.form group -->
                </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
                  </div>
                </div>
              </div><!--panel-body-->
            </div><!--box-->
      </section>

</div><!-- /.content-wrapper -->
</div>


     <?php footertemplate();?>

     <script type ="text/javascript">
            function Validate(txt)
            {
                txt.value = txt.value.replace(/[^A-Za-z0-9-_]+/, '');
            }

        </script>

     <script type="text/javascript">
  
    $(document).on('submit', '#reg-form', function()
     {  
      $.post('../database/submit.php', $(this).serialize(), function(data)
      {
       $(".result").html(data);  
       $("#form1")[0].reset();
      // $("#check").reset();

      });
      
      return false;
      
    
    })
    </script>
  </body>
</html>