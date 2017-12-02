<?php include "../templates/templates.php";
      include "../database/count1.php"; 
      include "../database/count2.php"; 
      include "../database/count3.php";
      include "../database/count4.php";  
        headertemplate('Dashboard | Administrator'); ?>

  <body class="skin-blue">
    <div class="wrapper">
      
     <?php navbar('dashboard'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="col-lg-12">
              <h1 class="page-header">
                Dashboard <small>Manage Your Site</small>
              </h1>
          </div>
        </section>

       <section class="content">
          <div class="row">
          <div style="padding-left: 15px; padding-right: 15px;" class="row">
                <div class="col-lg-6 col-md-9">
                    <div class="panel alert-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count2; ?></div>
                                    <div>Teachers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="teachers.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="panel alert-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count3; ?></div>
                                    <div>Students!</div>
                                </div>
                            </div>
                        </div>
                        <a href="students.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="panel alert-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count1; ?></div>
                                    <div>Subjects!</div>
                                </div>
                            </div>
                        </div>
                        <a href="subjects.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="panel alert-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count4; ?></div>
                                    <div>Rooms!</div>
                                </div>
                            </div>
                        </div>
                        <a href="room.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
          </div>
       </section>   
    
      </div><!-- /.content-wrapper -->
</div>
     <?php footertemplate();?>

     <script type="text/javascript">
           var chart = Morris.Bar({
          element: 'bar-chart',
          data: [0,0],
          xkey: 'y',
          ykeys: ['a'],
          labels: ['No. of Students']
        });

        $("#sy").forceNumeric();

        $("#sy").keyup(function(){
          var sy =  $("#sy").val();
          var year = sy * 2/2+1;
          var schoolyear = sy+'-'+year;
          var datastring = 'action=getdatachart&sy='+schoolyear;
          if(sy==''){
            $("#year").html(' ');
          }
          else{
            $("#year").html('School Year '+sy+'-'+year);
            $.ajax({
              type:"POST",
              url:"../php/crud.php",
              dataType:'json',
              data:datastring,
              success: function(data){
                chart.setData(data);
              }
            });
          }
            return false;
        });

     </script>
  </body>
</html>