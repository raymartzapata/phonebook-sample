
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>User | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="bootstrap/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>Create your account</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">LOGIN</p>
        <form method="POST" action="registration.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" name="name" placeholder="Full Name">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Address</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" name="address" placeholder="Address" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Phone Number</label>
                    <div class="input-group col-md-12">
                      <input type="text" maxlength="11" class="form-control pull-right" name="phone_number" placeholder="Phone Number">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

          <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" onkeyup="Validate(this)" maxlength="20" class="form-control pull-right" name="username" placeholder="Username">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
        
          <div class="form-group">
                    <label for="date">Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" onkeyup="Validate(this)" maxlength="15" minlength="4" class="form-control pull-right" id="date" name="password" placeholder="Password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
              
            <div class="form-group">
                    <label for="date">Picture</label>
                    <div class="input-group col-md-12">
                      <input type="file" id="image" name="image" accept="image/*" required />
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
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="bootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script type ="text/javascript">
            function Validate(txt)
            {
                txt.value = txt.value.replace(/[^A-Za-z0-9-_]+/, '');
            }

        </script>
  </body>
</html>