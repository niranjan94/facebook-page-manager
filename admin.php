<?php
if(isset($_COOKIE['authcode'])&&$_COOKIE['authcode']==md5('amrita'))
{
}
else
{
	$header_string="Location: http://example.com.tk/login.php?status=invalid";
	header($header_string); 
}
?>
<?php function adminarea($userid,$api,$page,$addon){ ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">FB Page Manager</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php echo $userid; ?></a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#contact">Support</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Select Page</li>
              <li class="active"><a href="#">Page 1</a></li>
              <li class="nav-header">Posts Management</li>
              <li><a href="review.php?<?php echo $addon; ?>">Review</a></li>
              <li><a href="alerts.php?<?php echo $addon; ?>">Manage Alerts</a></li>
              <li class="nav-header">Settings</li>
              <li><a href="config.php?<?php echo $addon; ?>">Server Configs</a></li>
              <li><a href="users.php?<?php echo $addon; ?>">Manage Users</a></li>
              <li><a href="pages.php?<?php echo $addon; ?>">Manage Pages</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Hello !</h1>
            <p>Welcome to the Facebook Page Manager Prototype. This is an open-sourced Facebook Page Manager written in PHP and based on Twitter Bootstrap UI.</p>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Review posts</h2>
              <p>You can use this feature to review submissions from user. Approve, Edit delete and ignore submisssions and posts </p>
              <p><a class="btn" href="review.php?<?php echo $addon; ?>">Start Using &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Manage Alerts</h2>
              <p>You can set customized email alerts for new submissions or moderation requests.</p>
              <p><a class="btn" href="alerts.php?<?php echo $addon; ?>">Start Using &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Server Configs</h2>
              <p>The default server side configurations such as directory structure and MySQL usernames,passwords,table names,databases can be set or changed here </p>
              <p><a class="btn" href="config.php?<?php echo $addon; ?>">Start Using &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Manage Users</h2>
              <p>The list of users who are allowed to access this Administration panel can be changed here. Allow or Deny Permissions with just a click</p>
              <p><a class="btn" href="users.php?<?php echo $addon; ?>">Start Using &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Manage Pages</h2>
              <p>Manage all the pages that are linked to this management console </p>
              <p><a class="btn" href="pages.php?<?php echo $addon; ?>">Start Using &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; <a href"mailto:niranjan94@yahoo.com">Niranjan Rajendran</a> 2013</p>
      </footer>

    </div><!--/.fluid-container-->
<?php } ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Portal</title>
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
<?php adminarea($_COOKIE['name'],'','','user=8263&nasj=23'); ?>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>