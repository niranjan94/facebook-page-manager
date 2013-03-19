<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }    </style>
  </head>
  <body>
     <div class="container">
      <form class="form-signin" action="http://example.com/fblogin.php" method="post">
      <center>
        <h2 class="form-signin-heading">Admin Login</h2>
        <?php if(!empty($_GET['status'])&&$_GET['status']=='invalid'){?>
        <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        	<strong>Oops!</strong> ... Looks like the Authentication key you had entered is incorrect
		</div>
        <?php }else{ ?>
        <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Heads up!</strong> You will need to authenticate using your facebook account in the next step to post to the page directly
        </div>
		<?php } ?>
        <p>
        <input type="password" name="password" id="password" placeholder=" ... Enter Authentication Key ... " required>
        </p>
        <button class="btn btn-large btn-block btn-primary" type="submit"><i class="icon-check icon-white"></i> Login</button> &nbsp; &nbsp;
        </center>
      </form>

    </div> 
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>