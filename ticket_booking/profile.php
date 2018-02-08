<?php
session_start();
if(isset($_SESSION['id']))
{
?>
<html>
<head><title>:: Profile ::</title>
<link rel="stylesheet" href="style/table.css" />
<style>
a{background-color:#3399FF; cursor:default; border-style:groove; color:#FFFFFF; text-decoration:blink; font-family:Verdana; font-weight:bold;}
</style>
<?php

require("config.php");
$uid=$_SESSION['id'];
$sql = mysql_query("select * from register where id = '$uid'");
$r = mysql_fetch_array($sql);

$name = $r['name'];
$dob = $r['dob'];
$adress = $r['address'];
$mobile = $r['mobile'];
$pincode = $r['pin_code'];
$gender = $r['gender'];
$email = $r['email'];
$password = $r['password'];
?>
</head>
<body topmargin="0">
<form>
<table class="table" align="center" width="800" cellpadding="0" cellspacing="0">
<tr><td colspan="3" height="140"><img width="800" height="140" src="images/Banner.jpg" /></td></tr>
<tr><td colspan="3" bgcolor="#330000" align="center" height="5px">
<h1 style="text-align:center; color:#FFFFFF; font-size:22px; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Bus-Ticket Reservation</h1></td></tr>

<tr><td colspan="3" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr>      
<tr><td width="93">
Name:</td><td width="307"> <input style="width:300" type="text" value="<?php echo $name;?>"  readonly="readonly"></td>
<td rowspan="9" valign="top" scope="9" width="401"><img width="400" height="200" src="images/volvo.jpg" /></td></tr>
<tr><td>
Address:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $adress;?>"  readonly="readonly"></td></tr>
<tr><td>
Pin code:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $pincode; ?>"  readonly="readonly"></td></tr>
<tr><td>
DOB:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $dob;?>"  readonly="readonly"></td></tr>
<tr><td>
Gender:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $gender; ?>"  readonly="readonly"></td></tr>
<tr><td>
Mobile No:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $mobile; ?>"  readonly="readonly"></td></tr>
<tr><td>
Email: </td><td><input style="border:0; width:300" type="text" value="<?php echo $email; ?>"  readonly="readonly"></td></tr>
<tr><td>
Password:</td><td> <input style="border:0; width:300" type="text" value="<?php echo $password; ?>"  readonly="readonly"></td>
</tr><tr><td align="center" colspan="3" style="padding-right:435">
<a href="profile-update.php?id=<?php echo $uid; ?>">EDIT</a>
<a href="Home.php?id=<?php echo $uid; ?>">Back</a>
</td></tr>
<tr><td colspan="3" align="center" bgcolor="#000000" style="font-family:Verdana, Geneva, sans-serif; size:3px; color:#FFF; padding-top:20px; padding-bottom:20px">
RSRTC © 2011 All rights reserved
</td></tr>
</table>
</form>
<?php
}
else
{
	header("Location:Home.php?id=$uid");
}
?>

</body>
</html>