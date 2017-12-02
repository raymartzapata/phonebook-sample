<?php
          session_start();
          mysql_connect("localhost", "root", "");
          mysql_select_db("phonebook");

          if(isset($_POST['login'])){
          $username = $_POST['username'];
          $password = $_POST['password'];

          $result = mysql_query("select * from user where username = '$username' and password = '$password'")
                          or die("Failed to query database" .mysql_error());
          $row = mysql_fetch_assoc($result);

          if($row['username'] == $username && $row['password'] == $password){
                  $_SESSION['ID'] = $row['ID'];
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['password'] = $row['password'];
                  $_SESSION['name'] = $row['name'];
                  header('Location: admin/pages/phonebook.php?' .$row['name']);
                  }
          else{
              echo '<script type="text/javascript">alert("Invalid Username/Password!"); window.location.href="index.php"</script>';
              }
          }
          ?>