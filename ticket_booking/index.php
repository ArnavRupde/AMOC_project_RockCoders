<?php
require("user_agent.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Online Bus-Ticket Reservation ::</title>
<!--<link rel="stylesheet" href="style.css" />-->
<style>
.table tr td {
	border-bottom-width: 1px;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-right-style: outset
	border-right-color: darkred;
	border-bottom-color: darkred;
}

.table {
	border-left-width: 1px;
	border-top-width: 1px;
	border-left-style: outset;
	border-top-style: solid;
	border-left-color: darkred;
	border-top-color: darkred;
	font-size: 16px;
}
a{
	background-color:#3366FF;
	text-align:center;
	text-decoration:none;
	font-family:Verdana, Geneva, sans-serif;
	color:#FFF;
	border:groove;
    font-weight:550;
}
</style>


<script language="javascript"> 
 
 
    function validate()  {
        if(document.getElementById('user').value==''){
            alert('Please enter Username!');
            document.getElementById('username').focus();
            return false;
        }
	
        if(document.getElementById('pass').value==''){
            alert('Please enter Password!');
            document.getElementById('pwd').focus();
            return false;
        }
        
	 return true;
    }
</script>

</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCFF99">
<div align="center" style="width:807">

<embed src="banner3.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="807" height="150" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>

</div>
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
<tr><td height="5px" align="center" bgcolor="#330000" colspan="2">
<h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Bus-Ticket Reservation</h2></td></tr>

<tr><td bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px; display:table" id="clock" colspan="2">
 

		
		<script type="text/javascript">
			var lastText = "";
			
			function updateClock() {
				var d = new Date();
				var s = "";
				s += (10 > d.getHours()   ? "0" : "") + d.getHours()   + ":"
				s += (10 > d.getMinutes() ? "0" : "") + d.getMinutes() + ":"
				s += (10 > d.getSeconds() ? "0" : "") + d.getSeconds();
				
				if (lastText != s) {
					setText("clock", s);
					lastText = s;
				}
				
			}
			
			function setText(elemName, text) {
				var elem = document.getElementById(elemName);
				while (elem.childNodes.length > 0)
					elem.removeChild(elem.firstChild);
				elem.appendChild(document.createTextNode(text));
			}
			
			updateClock();
			setInterval(updateClock,100);
		</script>
<script language="JavaScript" type="text/javascript">
 var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December"); 

var TODAY =d.getDate() +"- " + monthname[d.getMonth()] + "-" + d.getFullYear();

 document.write(TODAY);
</script>



</tr>

<tr><td height="153" colspan="2">

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="800" height="150">
  <param name="movie" value="project.swf" />
  <param name="quality" value="high" />
  <param name="allowFullScreen" value="false" />
  <param name="allowScriptAccess" value="always" />
  <embed src="project.swf"
         quality="high"
         type="application/x-shockwave-flash"
         width="800"
         height="150"
         allowFullScreen="false"
         pluginspage="http://www.macromedia.com/go/getflashplayer"
         allowScriptAccess="always" />
</object>

 
  </td></tr>

<tr><td bgcolor="#CCCCCC" bordercolordark="#FFFFFF" align="left" colspan="2">
<h3 style="font-family:Verdana, Geneva, sans-serif; color: #000; margin-bottom:0px; margin-top:0px">Login Screen</h3></td></tr>

<tr><td width="398">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="f">


<p style="font-family:Verdana, Geneva, sans-serif" align="center">&nbsp;</p>
<p style="font-family:Verdana, Geneva, sans-serif" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <input style="size:auto; width:150px" id="user" type="text" name="user" value="" />
</p>
<p style="font-family:Verdana, Geneva, sans-serif" align="center">Password:  
  <input type="password" id="pass" name="pass" style="size:auto; width:150px" />
</p>
<center>
<input type="submit" onclick="validate()" value="Login" name="s" style="background-color:maroon; height:20px; color:#FFF; font-weight:50" /> &nbsp;&nbsp; 
<a href="bus_rev.php" style="cursor:default; font-size:12px; background-color:#900;">New User</a></center>
</form>
<?php
session_start();
require("config.php");
if(isset($_POST['s'])){
$name = $_POST['user'];	
$pass = $_POST['pass']; 

  $sql = mysql_query("select * from register where email='$name' AND password='$pass'");
  if(mysql_num_rows($sql)==0)
  {
	  ?>
      <script>
	  alert("You seem to register first");
	  </script>
      <?php
  }
  else
  {
	  ?>
      <script>
	  alert("Welcome to RSRTC");
	  </script>
      <?php
	  $sql1 = mysql_query("select * from register where email='$name' AND password='$pass'");
	  $r = mysql_fetch_array($sql1);
	  $id = $r['id'];
	  echo $_SESSION['id'] = $id;
	  header("Location:Home.php?id=$id");
  }
}

?>

</td><td width="400">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="400" height="166">
  <param name="movie" value="project1.swf" />
  <param name="quality" value="high" />
  <param name="allowFullScreen" value="false" />
  <param name="allowScriptAccess" value="always" />
  <embed src="project1.swf"
         quality="high"
         type="application/x-shockwave-flash"
         width="400"
         height="166"
         allowFullScreen="false"
         pluginspage="http://www.macromedia.com/go/getflashplayer"
         allowScriptAccess="always" />
</object></td>
</tr>
</table>
<div align="center"><img align="top" width="806" src="images1/footer.jpg" />
</div>

</body>
</html>
