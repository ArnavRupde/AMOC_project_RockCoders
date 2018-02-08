

<?php
session_start();
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: HOME ::</title>
<script type="text/javascript" src="C:\Users\NARPAT\Desktop\basiccalendar.js"></script>


<link rel="stylesheet" href="style/table.css" />
<link rel="stylesheet" href="style/style.css" />
<style>
a{cursor:default;}
</style>

</head>

<body topmargin="0" bottommargin="0">



<div align="center">
<embed src="banner3.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="807" height="150" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>
</div>
<table bgcolor="#FFFFCC" style="margin-top:0" align="center" width="807" border="1" cellpadding="0" cellspacing="0">

<tr><td colspan="3" bgcolor="#330000" align="center" height="5px">
<h1 style="text-align:center; color:#FFFFFF; font-size:22px; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Bus-Ticket Reservation</h1></td></tr>

<tr><td colspan="3" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr>                             			
     
<!-- end header -->
<?php
require("config.php");
if(isset($_SESSION['id']))
{
$uid = $_SESSION['id'];	
$sql = mysql_query("select * from register where id = '$uid'");
if(mysql_num_rows($sql)>0)
{
	$r = mysql_fetch_array($sql);
	$name = $r['name'];		
}
 ?>
 
 
 
 </td></tr>   <tr><td width="200">
<!-- start leftmenu -->
<dl id="browse"> 
	<!-- <dt>
		<a href=""></a>
	</dt> -->
        &nbsp;<span class="simpletext1">Welcome :<b><?php echo $name;?></b></span>
        
        <hr />					
	
  <dd   style="text-align: left">  
		<img align="absmiddle" src="images/home.png" width="16" height="16" alt="" /><a href="Home.php?id=<?php echo $uid;?>">Home</a>
	</dd>
  <dd style="text-align: left">
		<img align="absmiddle" src="images/password.png" width="16" height="16" alt="" /><a href="password_update.php?id=<?php echo $uid;?>">Change Password</a>
	</dd>
  <dd style="text-align: left">
		<img align="absmiddle" src="images/profile.png" width="16" height="16" alt="" /><a href="profile.php?id=<?php echo $uid;?>">View Profile</a>
	</dd>
	
  <dd style="text-align: left">
		<img align="absmiddle" src="images/ticket.png" width="16" height="16" alt="" /><a href="myticket.php?id=<?php echo $uid;?>">My Tickets</a>
	</dd>
	
   <dd style="text-align: left">
		<img align="absmiddle" src="images/logout.png" width="16" height="16" alt="" /><a href="logout.php">Logout</a>
	</dd>
</dl>
<!-- end leftmenu --></td><td width="380">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="382" height="195">
  <param name="movie" value="rstc.swf" />
  <param name="quality" value="high" />
  <param name="allowFullScreen" value="true" />
  <param name="allowScriptAccess" value="always" />
  <param name="wmode" value="transparent">
  <embed src="rstc.swf"
         quality="high"
         type="application/x-shockwave-flash"
         WMODE="transparent"
         width="382"
         height="195"
         allowFullScreen="true"
         pluginspage="http://www.macromedia.com/go/getflashplayer"
         allowScriptAccess="always" />
</object>


</td>
<td width="217">
<embed src="rightbar.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="217" height="195" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>

</tr></table>

<table cellpadding="0" cellspacing="0" border="0" class="maintable" align="center"
               width="805" valign="middle">
<form method="post">
	<tr class="tabtitle">
			<td colspan="4">
				<table cellspacing="0" cellpadding="0" width="800">
					<tr>  
						<td  class="titletext" style="background-color:#990000">
							<font size="3px" style="background-color:#C00; color:#FFF">Search For Bus Services </font>
                                                                                            
                                                        
						</td>
						
                             
				  </tr>
				</table>
			</td>
		<tr>
			<td width="20%" class="simpletext">
				From Stop :
			</td>
			<td>
            <select class="html-text-box" style="background-color:; font-style:oblique; width:100px; font-family:Verdana; font-weight:bold" name="from">
            <option value="0" selected="selected">-Select-</option>
            <option value="BARMER">BARMER</option>
            <option value="Delhi">Delhi</option>
            <option value="Jaipur">Jaipur</option>
            <option value="JODHPUR">JODHPUR</option></select>
          </td>
                        <td width="23%"  class="simpletext" align="right">
				To Stop :
			</td>
			<td  align="left">
            <select class="html-text-box" style="font-style:oblique; width:100px; font-family:Verdana; font-weight:bold" name="to">
            <option value="0" selected="selected">-Select-</option>
            <option value="BARMER" >BARMER</option>
            <option value="Delhi">Delhi</option>
            <option value="Jaipur">Jaipur</option>
            <option value="JODHPUR">JODHPUR</option></select>
            </td>
		</tr>
                
                <tr>
			<td >
				Journey Date :
			</td>
			<td  >
				<input type="text" style="border:2; padding:2" name="journeyDate" maxlength="10" size="10" value="" id="journeyDate">
                            
			</td>
                                             
		
		</tr>
		 
		 
		<tr>
			<td colspan="4" height="45" align="center" valign="middle">
                           	<input type="submit" name="search" value="Search" onclick="return callfrm(document.getElementById('currentdate').value);" class="html-button">
			
			 	       <input type="submit" name="resert" value="Reset"  class="html-button">
				  
                        </td>
                </tr>
		<tr>
			<td colspan="4">
				<div class="errormessage" align="center">
					 
				</div>
			</td>
            </tr>  
    </form>
	</table>


<?php
if(isset($_POST['search']))
{
	require('config.php');
	 $from = $_POST['from'];
	 $to = $_POST['to'];
	 
	 $query = mysql_query("select * from bus where from_stop ='$from' AND to_stop ='$to'");
	 $c = mysql_num_rows($query);
	if($c>0)
	{
?>
<table width="805" height="62" align="center" cellpadding="2" cellspacing="2" class="table" bordercolor="#000000" b>

<tr align="center"><td width="115">Bus Name</td><td width="122">From</td><td width="117">To</td><td width="117">Dept Time</td><td width="119">Arrival Time</td><td width="110">Distance</td><td width="110">Fare</td><td>Available</td><td width="101">&nbsp;</td></tr>
<?php
while($r1 = mysql_fetch_array($query))
{
	$bus= $r1['id'];
	$bus_name = $r1['bus_name'];
	$from = $r1['from_stop'];
	$to = $r1['to_stop'];
	$dept_time = $r1['dept_time'];
	$arrival_time = $r1['arrival_time'];
	$distance = $r1['distance'];
	$fare = $r1['fare'];
	
	$bust = $bus.'bus';
	$query1 = mysql_query("SELECT * from $bust where status='Available'");
	$c = mysql_num_rows($query1);
?>

<tr align="center"><td><?php echo $bus_name;?></td><td><?php echo $from;?></td><td><?php echo $to;?></td><td><?php echo $dept_time;?></td><td><?php echo $arrival_time;?></td><td nowrap="nowrap"><?php echo $distance;?></td><td><?php echo $fare; ?></td><td><?php echo $c;?></td><td><a href="res.php?id=<?php echo $uid;?>&bus=<?php echo $bus;?>">Book</a>
</td></tr></table>
<?php
}
}
}
?>


     <table class="table" align="center" cellpadding="0" cellspacing="0" width="805">
     <tr><td height="124"><marquee onmouseover="this.stop();" onmouseout="this.start();" draggable="auto" bgcolor="#663333" loop="-1" dropzone="move" direction="left" behavior="alternate" scrollamount="2" scrolldelay="1">
     <img border="1" height="130" width="150" src="images/B1.jpg" />
     <img height="130" width="150" src="images/B2.jpg" />
     <img height="130" width="150" src="images/B3.jpg" />
     <img height="130" width="150" src="images/B4.jpg" />
     <img height="130" width="150" src="images/B5.jpg" />
     <img height="130" width="150" src="images/B6.jpg" />
     <img height="130" width="150" src="images/7.png" />
     <img height="130" width="150" src="images/v (1).jpg" />
     <img height="130" width="150" src="images/v (2).jpg" />
     <img height="130" width="150" src="images/v (3).jpg" />
     <img height="130" width="150" src="images/v (4).jpg" />
     <img height="130" width="150" src="images/v (5).jpg" />
     <img height="130" width="150" src="images/v (6).jpg" />
     <img border="1" height="130" width="150" src="images/v (7).jpg" />
     
     </marquee></td>
     <div style="position:absolute; float:right; visibility:hidden">
     <script type="text/javascript">

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 1));
</script>



<form>
<select onChange="updatecalendar(this.options)">
<script type="text/javascript">

var themonths=['January','February','March','April','May','June',
'July','August','September','October','November','December']

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

function updatecalendar(theselection){
var themonth=parseInt(theselection[theselection.selectedIndex].value)+1
var calendarstr=buildCal(themonth, curyear, "main", "month", "daysofweek", "days", 0)
if (document.getElementById)
document.getElementById("calendarspace").innerHTML=calendarstr
}

document.write('<option value="'+(curmonth-1)+'" selected="yes">Current Month</option>')
for (i=0; i<12; i++) //display option for 12 months of the year
document.write('<option value="'+i+'">'+themonths[i]+' '+curyear+'</option>')


</script>
</select>

<div id="calendarspace">
<script>
//write out current month's calendar to start
document.write(buildCal(curmonth, curyear, "main", "month", "daysofweek", "days", 0))
</script>
</div>

</form>



<script type="text/javascript">

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

</script>
     
     </div>
     </tr>
     
</table>                                      
<div align="center"><img align="top" width="805" src="images1/footer.jpg" />
</div>
<?php
}
else
{
	header("Location:indexm.php");
}
}
else
{
	header("Location:Home.php?id=$uid");
}
?>
</body>
</html>