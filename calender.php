<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="tuitorial";
$error="cannot connect to database ,please try again later....";

$con = mysqli_connect($hostname,$username,$password,$dbname) or die ($error);
mysqli_select_db($con,"tuitorial") or die ($error);
?>



<html>
	<head>
	<script>
		function goLastMonth(month,year){
		
			if(month==1){
				--year;
				month=13;
				
			}
			--month;
			var monthstring=""+month+"";
			var monthlength=monthstring.length;
			if(monthlength<=1)
			{
				monthstring="0"+monthstring;
			}
			document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
		}
		function goNextMonth(month,year){
		
		if(month==12)
		{
			year++;
			month=0;
			
			
		}
			++month;
			var monthstring=""+month+"";
			var monthlength=monthstring.length;
			if(monthlength<=1)
			{
				monthstring="0"+monthstring;
			}
		document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
		}
	</script>
	<style>
	.today{
		background-color : #00ff00;
	}
	.event{
		background-color : #0000ff;
	}
	</style>
	</head>
	<body>
		<?php
		if (isset($_GET['day'])){
		$day=$_GET['day'];
		//echo $day;
		}
		else{
			$day=date("j");
		}
		if(isset($_GET['month'])){
			$month=$_GET['month'];
			//echo $month;
		}
		else{
			$month=date("n");
		}
		if(isset($_GET['year'])){
			$year=$_GET['year'];
			//echo $year;
		}
		else{
			$year=date("y");
			//-echo $year;
		}
		
		
		
		//calender variable
		$currentTimeStamp=strtotime("$year-$month-$day");
		$monthName=date("F",$currentTimeStamp);
		$numDays=date("t",$currentTimeStamp);
		$counter=0;
		?>
		<?php
		//the code must be below the date variable
		if(isset($_GET['add'])){
		
			$title=$_POST['txttitle'];
			$detail=$_POST['txtdetail'];
			$eventdate=$month."/".$day."/".$year;
			$eventTiming=$_POST['schedule_time'];
			//$sql= "SELECT * FROM ''" 
			
			$sqlinsert="insert into eventcalender (Title,Detail,eventDate,dateAdded,eventTiming) values ('".$title."','".$detail."','".	$eventdate."',now(),'".	$eventTiming."')";
			$resultinsert=mysqli_query($con,$sqlinsert);
			
			if($resultinsert){
			
				echo "Event was successfully Added";
			}
			else{
			
			echo "Event failed to be Added";
			}
			
		}
		?>
		<table border='1'>
			<tr>
			<td><input style='width:50px;' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
			<td colspan='5'> <?php echo $monthName.",".$year ?></td>		
			<td><input style='width:50px;' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)"></td>
			</tr>
			<tr>
			<td width='50px'>Sun</td>
			<td width='50px'>Mon</td>
			<td width='50px'>Tue</td>
			<td width='50px'>Wed</td>
			<td width='50px'>Thu</td>
			<td width='50px'>Fri</td>
			<td width='50px'>Sat</td>
			</tr>
			<?php
				echo "<tr>";
				for ($i=1;$i<$numDays+1;$i++,$counter++){
					$timeStamp=strtotime("$year-$month-$i");
					if($i==1){
					
							$firstDay=date("w",$timeStamp);
							for($j=0;$j<$firstDay;$j++,$counter++)
							{
							echo "<td>&nbsp;</td>";
							
							}
					
					
				}
				
				if($counter%7==0)
				{
					echo "<tr></tr>";
				}
				$monthstring=$month;
				$monthlength=strlen($monthstring);
				$daystring=$i;
				$daylength=strlen($daystring);
				if($monthlength<=1){
					$monthstring="0".$monthstring;
				}
				if($daylength<=1){
					$daylength="0".$daystring;
				}
				$todaysDate=date("m/d/Y");
				//echo $todaysDate;
				$dateToCompare=$monthstring .'/'.$daystring .'/'.$year;
				//echo $dateToCompare;
				echo "<td align='center'";
				if($todaysDate==$dateToCompare){
					echo "class='today'";
				}
				else{
					$sqlCount="select * from eventcalender where eventDate='".$dateToCompare."'";
					$run=mysqli_query($con,$sqlCount);
					$noOfEvent=mysqli_num_rows($run);
					if($noOfEvent >=1){
						echo "class='event'";
					}
				}
				echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</td>";
				}
				
				echo "</tr>";
			?>
		</table>
		<?php
		if(isset($_GET['v'])){
		
		echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a>";
		?>
		<form  action="Agenda.php">
		<table>
		<td></td>
		<input type="hidden" name="year" value="<?php echo $year;?>">
		<input type="hidden" name="month" value="<?php echo $month;?>">
		<input type="hidden" name="date" value="<?php echo $day;?>">
		</table>
		
		<button type="submit"  >Meeting On that Day</button>
		</form>
		<?php
		if(isset($_GET['f'])){
		include("eventform.php");
		}
		}
		
		
		?>
	</body>
</html>