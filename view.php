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
$id=$_GET['id'];
$sql="SELECT*FROM posts WHERE id=$id";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$sql2="SELECT*FROM misc WHERE id>0";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($result2);
$old_id=$row2['current_no'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="http://kovaidealscdn.appspot.com/jquerylib.js"></script>
<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};
	
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#msg-form").validate({
                rules: {
                    id: {
						required: true,
						number: true
					},
                },
                messages: {
                    id: {
						required: "",
						number: ""
					},
				},
				invalidHandler:function() {
					$("#submitbutton").hide();
				},
				success:function() {
					$("#submitbutton").show();
				},
                submitHandler:function(form)
				{
					$("#loading_image").show();
					$("#submitbutton").hide();
					$.post("cross_post.php", $("#review").serialize(), function(data)
					{
						 window.parent.$("#myModal").html(data);
					});					
				}
            });
        }
    }
 
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);
</script>
  </head>
  <body>
  <div id="content_area">
  	<div id="review_form">
        <form action="" method="post" name="review" id="review">
        <label>Submission ID:</label>
        <input type="text" required value="<?php echo $row['id']; ?>" name="id" readonly>   
        <label>Confession:</label>
        <textarea rows="6" name="confession"><?php echo "Confession #".$old_id++.":\n".$row['confession']."\n #".$row['campus']; ?></textarea>
        <label>Posted From: </label>
        <input type="text" readonly value="<?php echo $row['campus']; ?>">&nbsp;&nbsp; Campus
        <input type="hidden" value="<?php echo $_COOKIE['pagetoken']; ?>" name="pagetoken">
        <label>Do ? </label>
        <label class="radio inline">
        <input type="radio" name="do" value="approve" checked><i class="icon-thumbs-up"></i> Approve
        </label>
        <label class="radio inline">
        <input type="radio" name="do" value="disapprove"><i class="icon-thumbs-down"></i> Dis Approve
        </label>
        <label class="radio inline">
        <input type="radio" name="do" value="ignore"><i class="icon-ban-circle"></i> Ignore
        </label>
        <label class="radio inline">
        <input type="radio" name="do" value="delete"><i class="icon-trash"></i> Delete
        </label>
        <input type="submit" value="submit" class="btn btn-primary" id="submitbutton">
        </form>
      </div>
      <div id="loading_image"><img src="img/ajaxload.gif"></div>
  </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>