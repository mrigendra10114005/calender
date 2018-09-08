<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year?>&v=true&add">
	<table width='400px'>
			<tr>
				<td width='150px'>Timing</td>
				<td width='250px'><select name="schedule_time">
    <option value="00:00:00">00:00:00</option>
    <option value="00:30:00">00:30:00</option>
    <option value="01:00:00">01:00:00</option>
    <option value="01:30:00">01:30:00</option>
    <option value="02:00:00">02:00:00</option>
    <option value="02:30:00">02:30:00</option>
    <option value="03:00:00">03:00:00</option>
    <option value="03:30:00">03:30:00</option>
    <option value="04:00:00">04:00:00</option>
    <option value="04:30:00">04:30:00</option>
    <option value="05:00:00">05:00:00</option>
    <option value="05:30:00">05:30:00</option>
    <option value="06:00:00">06:00:00</option>
    <option value="06:30:00">06:30:00</option>
    <option value="07:00:00">07:00:00</option>
    <option value="07:30:00">07:30:00</option>
    <option value="08:00:00">08:00:00</option>
    <option value="08:30:00">08:30:00</option>
    <option value="09:00:00">09:00:00</option>
    <option value="09:30:00">09:30:00</option>
    <option value="10:00:00">10:00:00</option>
    <option value="10:30:00">10:30:00</option>
    <option value="11:00:00">11:00:00</option>
    <option value="11:30:00">11:30:00</option>
    <option value="12:00:00">12:00:00</option>
    <option value="12:30:00">12:30:00</option>
    <option value="13:00:00">13:00:00</option>
    <option value="13:30:00">13:30:00</option>
    <option value="14:00:00">14:00:00</option>
    <option value="14:30:00">14:30:00</option>
    <option value="15:00:00">15:00:00</option>
    <option value="15:30:00">15:30:00</option>
    <option value="16:00:00">16:00:00</option>
    <option value="16:30:00">16:30:00</option>
    <option value="17:00:00">17:00:00</option>
    <option value="17:30:00">17:30:00</option>
    <option value="18:00:00">18:00:00</option>
    <option value="18:30:00">18:30:00</option>
    <option value="19:00:00">19:00:00</option>
    <option value="19:30:00">19:30:00</option>
    <option value="20:00:00">20:00:00</option>
    <option value="20:30:00">20:30:00</option>
    <option value="21:00:00">21:00:00</option>
    <option value="21:30:00">21:30:00</option>
    <option value="22:00:00">22:00:00</option>
    <option value="22:30:00">22:30:00</option>
    <option value="23:00:00">23:00:00</option>
    <option value="23:30:00">23:30:00</option>
</select></td>
			</tr>
			<tr>
				<td width='150px'>Title</td>
				<td width='250px'><input type='text' name='txttitle'></td>
			</tr>
			<tr>
				<td width='150px'>Detail</td>
				<td width='250px'><textarea name='txtdetail'></textarea></td>
			</tr>
			<tr>
				<td colspan='2' align='center'><input type='submit' name='btnadd' value='Add Event' ></td>
				
			</tr>
	</table>
</form>