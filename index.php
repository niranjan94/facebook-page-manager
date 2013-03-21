<?php
$c=mysql_pconnect('host','username','password');
if(!$c)
{
	die('could not connect:'.mysql_error());
}
mysql_select_db("database");

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Submit a confession</title>
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
     <?php  function submit(){ ?>
      <form class="form-signin" method="post" action="">
      <?php if(!empty($_GET['status'])&&$_GET['status']=='error') { ?>
        <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         	<strong>Oops !</strong> Please fill out both _______ and ____________ before submitting !
        </div>
        <?php } ?>
        <h2 class="form-signin-heading">Post your ______ here...</h2><br>
        <p>
          <textarea name="name" cols="500" rows="3" id="id" placeholder="Enter your ... " required ></textarea>
        </p>
        <p>
          <label for="campus"></label>
          <select name="name" id="id" required>
            <option value="" selected>Please select Your... </option>
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="4"></option>
            <option value="5"></option>
          </select>
        </p>
        <button class="btn btn-large btn-primary" type="submit" name="submit">Submit</button> &nbsp; &nbsp;
        <button class="btn btn-large" type="reset">Start over</button>
      </form>
	<?php } 
	function process()
	{
		date_default_timezone_set('Asia/Calcutta');
		$date = date('d-m-Y h:i:s a', time());
		$sql="INSERT INTO posts (x,y,date,status) VALUES('$x','$y','$date','pending')";
		mysql_query($sql);
	?>
    
    <form class="form-signin" method="post" action="">
    <center>
    <h2 class="form-signin-heading"> Thank you for Confessing ! </h2>
    </center><br>
    <p> Your Confession will be posted to our <a href="https://www.facebook.com/xyz">FACEBOOK PAGEs</a> page on facebook after verificaton
    </p><br>
    <center>
    <a href="/" class="btn btn-large btn-block btn-primary">Post another confession</a>
    </center>
    </form>
    <?php } 
	if (isset($_POST['submit'])) 
	{
		process();
	}
	else
	{
		submit();
	}
	?>
    </div> 
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
