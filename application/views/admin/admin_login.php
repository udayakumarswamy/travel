<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="<?php echo base_url();?>assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
   /*  $("#loginform").submit(function(e){
          var email=$("#email").val();
          var pass=$("#pass").val();
          var valid=1;
          
          if(email=='' && valid==1){
              $(".error").text('Please Enter Email');
              $(".alert-message").css('display','block');
              valid=0;	
          }
          if(pass=='' && valid==1){
              $(".error").text('Please Enter Password');
              $(".alert-message").css('display','block');
              valid=0;	
          }
          if(valid==1){
              $.ajax({
                  type:"POST",
                  url:'<?php echo base_url();?>landing/login',
                  data:{'email':email,'pass':pass},
                  dataType:"json",
                  success: function(data){
                      if(data.result==1){
                          window.location='<?php echo base_url();?>landing/welcome';
                              
                      }else{
                          alert('AA');
                          $(".error").text('Either email or Password is incorrect');
                          $(".alert-message").css('display','block');	
                      }
                  }
              });		
          }
	e.preventDefault();
    });*/
    </script>
</head>

  <body class="login-body">

    <div class="container">

      <!--<form class="form-signin" action="index.html">-->
        <form name="loginform" id="loginform" action="" method="post" class="form-signin" >
        <h2 class="form-signin-heading">sign in now <?php if($login_error_msg){  echo "<br/><br/>".$login_error_msg; } ?>        </h2>
      
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" class="form-control" placeholder="User ID" autofocus name="username"  id="username">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            </div>
            <!--<label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>-->
           <!-- <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>-->
                <input type="submit" name="sub" value="Sign in" class="btn btn-lg btn-login btn-block" />
            <div class="registration">
                <!-- Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a> -->
            </div>

        </div>
        </form>
          <!-- Modal -->
       <!--  <form name="loginform" id="loginform" action="" method="post" class="form-signin" > 
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
            </form>-->
          <!-- modal -->

  

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/bs3/js/bootstrap.min.js"></script>

  </body>
</html>
