
<?php error_reporting(0);?>
<?php include "../templates/templates.php"; 
        headertemplate('Account | User'); ?>

  <body class="skin-blue">
<?php 
include('../database/connection.php');
 ?>

    <div class="wrapper">
      
     <?php navbar('password'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><span class="glyphicon glyphicon-pencil"></span>
            Update Account
          </h1>
        </section>

       <section class="content">
            <div class="box box-primary">
              <div class="panel-body">
                <div class='form-group'>
                 
                 <?php
        $id=$_SESSION['ID'];
          $query=mysqli_query($conn,"select * from user where ID='$id'")or die(mysqli_error());
        $row=mysqli_fetch_array($query);
      ?>  
          <!-- Main content -->
          <section class="content">
            <div class="row">
        <div class="col-md-12">
                <div class="box-body">
                  <!-- Date range -->
                  <form method="POST" action="../functions/update_image.php?epr=updateimage" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Picture</label>
                    <img src="../image/<?php echo $row['image']; ?>" width="150" height="150" class="img-circle" alt="User Image" />
                    <input type="file" id="image" name="image" accept="image/*">
                  </div><!-- /.form group -->
                  <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary" id="submit">
                        Change Photo
                      </button>
                  </div><!-- /.form group -->
                  <hr>
                </form>
                  <form method="POST" action="../functions/acct_save.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['name'];?>" name="name" placeholder="Full Name" readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['username'];?>" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Change Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" onkeyup="Validate(this)" maxlength="15" class="form-control pull-right" id="date" name="password" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
        
          <div class="form-group">
                    <label for="date">Confirm New Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" onkeyup="Validate(this)" maxlength="15" minlength="4" class="form-control pull-right" id="date" name="new" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <hr>
          <div class="form-group">
                    <label for="date">Enter Password to confirm changes</label>
                    <div class="input-group col-md-12">
                      <input type="password" onkeyup="Validate(this)" maxlength="15" minlength="4" class="form-control pull-right" id="date" name="passwordold" placeholder="Type old password" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" name="submit" class="btn btn-primary" id="submit">
                        Save
                      </button>
                    </div>
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