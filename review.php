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

<?php
$userid='';
$addon='';
$c=mysql_pconnect('host','username','password');
if(!$c)
{
	die('could not connect:'.mysql_error());
}
mysql_select_db("database");
$query = "SELECT COUNT(*) as num FROM confessions WHERE status='pending'";
$total_posts = mysql_fetch_array(mysql_query($query));
$total_posts = $total_posts['num'];
$sql="SELECT*FROM confessions WHERE status='pending' ORDER BY id ASC";
$result = mysql_query($sql);
 ?>
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
      <script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight -250 + 'px';
  }
</script>
  </head>
  <body>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
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
              <li class="active"><a href="review.php?<?php echo $addon; ?>">Review</a></li>
              <li><a href="alerts.php?<?php echo $addon; ?>">Manage Alerts</a></li>
              <li class="nav-header">Settings</li>
              <li><a href="config.php?<?php echo $addon; ?>">Server Configs</a></li>
              <li><a href="users.php?<?php echo $addon; ?>">Manage Users</a></li>
              <li><a href="pages.php?<?php echo $addon; ?>">Manage Pages</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        <br>
			<h1> Review Submissions </h1>
            <?php if($total_posts==0) { 
				echo '<p> Congrats ! All the confessions have been approved ! </p>';
			}
			else
			{
			?>
            
        <table width="100%" class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Confession</th>
                  <th>Campus</th>
                  <th>DateTime</th>
                  <th>Post #</th>
                  <th>Flagged by</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php 
					while($row = mysql_fetch_array($result))
					{
						echo '<tr><td>'.$row['id'].'</td>';
						echo '<td>'.substr($row['confession'], 0,50).'...</td>';
						echo '<td>'.$row['campus'].'</td>';
						echo '<td>'.$row['datetime'].'</td>';
						echo '<td>'.$row['status'].'</td>';
						echo '<td>'.$row['status'].'</td>';
						echo '<td><div class="btn-group">';
						echo '<a class="btn btn-small btn-primary" href="#" postid="'.$row['id'].'"><i class="icon-eye-open icon-white"></i> View</a>';
						//echo '<a class="btn btn-small btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>';
						//echo '<ul class="dropdown-menu">';
						//echo '<li><a href="#"><i class="icon-thumbs-up"></i> Approve</a></li>';
						//echo '<li><a href="#"><i class="icon-thumbs-down"></i> Dis Approve</a></li>';
						//echo '<li><a href="#"><i class="icon-ban-circle"></i> Ignore</a></li>';
						//echo '<li class="divider"></li>';
						//echo '<li><a href="#"><i class="icon-trash"></i> Delete</a></li>';
						echo '</ul>';
						echo '</div></td></tr>';
						
					}
				?>
              </tbody>
        </table>
		<?php } ?>
            
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; <a href"mailto:niranjan94@yahoo.com">Niranjan Rajendran</a> 2013</p>
      </footer>

    </div><!--/.fluid-container-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript">
	  // POST LIGHTBOX
	  $("a.btn.btn-small.btn-primary").click(function(){
		var postid=$(this).attr('postid');
		var data='<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="myModalLabel">Details</h3></div><div class="modal-body"><p><iframe src="view.php?id='+postid+'" width="100%" scrolling="no" frameborder="0" onload="javascript:resizeIframe(this);" height="375px"></p></div>'; 
		  $('#myModal').html(data);
		 $('#myModal').modal('toggle') 
		});
	  </script>
  </body>
</html>