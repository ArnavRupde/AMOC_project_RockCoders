<?php
session_start();

if(isset($_SESSION['id']))
{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Online Bus-Ticket Reservation ::</title>
<link rel="stylesheet" href="style/table.css" />
<style>
a{cursor:default;}
</style>

</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCCC99">
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center" width="800px" height="140px"><img align="middle" width="800px" height="140px" src="images/Banner.jpg" />
</td></tr><tr><td colspan="2" bgcolor="#330000" align="center" height="5px">
<h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Bus-Ticket Reservation</h2></td></tr>

<tr><td colspan="2" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr></table>
<?php
require("config.php");
$uid = $_SESSION['id'];
echo $bus = $_GET['bus'];
$bust = $bus.'bus';
?>
<?php
if(isset($_POST['book']))
{

	 $seat = $_POST['seat'];
	 $choice = $_POST['choice'];
	 $date = date("Y-m-d");
	echo "<br>";
	if($seat !='')
	{
		if($choice !='')
		{
	
	header("Location:pay.php?id=$uid&bus=$bus&seat=$seat&c=$choice");
	}
	else
	{
		?>
        <script>
		alert("Enter your Choice");
		</script>
        <?php
	}
	}
	else
	{
		?>
        <script>
		alert("Enter Number of seats to be booked");
		</script>
        <?php
	}
	}
?>
<form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $uid;?>&bus=<?php echo $bus;?>">
No. of Seats:
<input type="text" name="seat" value="" /><br />
Choice:<select name="choice">
<option value=""></option>
<option value="N">No Choice</option>
<option value="W">Window</option>
</select>
<br />
<input type="submit" name="book" value="Book"/>


</form>
<?php
}
else
{
	header("Location:index.php");
}
?>
</body>
</html>

