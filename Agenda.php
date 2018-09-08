<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="tuitorial";
$error="cannot connect to database ,please try again later....";
//echo $_GET['date'];
$con = mysqli_connect($hostname,$username,$password,$dbname) or die ($error);
mysqli_select_db($con,"tuitorial") or die ($error);
?>
<form action="Agenda.php" method="post" >
	<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
		<th>No</th>
		<th>Title</th>
		<th>Detail</th>
		<th>eventDate</th>
		<th>dateAdded</th>
		<th>eventTiming</th>
	
	</tr>
<?php

$month=$_GET['month'];
$day=$_GET['date'];
$year=$_GET['year'];
//echo $month;
//echo $day;
//echo $year;
$eventdate=$month."/".$day."/".$year;

$sql="SELECT * FROM eventcalender WHERE eventDate='$eventdate'";

	$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
			{
				echo "<tr><td colspan='5'>No record found</td></tr>";
			
			}
			else
			{
				$count=0;
				while($data=mysqli_fetch_assoc($run))
				{
				$count++;
				?>
					<tr>
		                <td><?php echo $count; ?></td>
		                <td><?php echo $data['Title'];?> </td>
		                <td><?php echo $data['Detail'];?> </td>
		                <td><?php echo $data['eventDate'];?></td>
						<td><?php echo $data['dateAdded'];?></td>
						<td><?php echo $data['eventTiming'];?></td>
			
	
	                </tr>
				<?php
				}
			
			}
	
?>