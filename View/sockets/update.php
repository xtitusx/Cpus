<div id="update">	
	<table class="table">
		<form id="update_socket" method="POST" action="index.php">
		<input type="hidden" name="sockets" value="" />	
		<input type="hidden" name="update_socket" value="" />	
		<input type="hidden" name="id" />
			<tr>
				<td><label for="name">Name :</label></td>
				<td><input type="text" name="name" required /></td>
			</tr>
			<tr>
				<td><label for="intro_date">Introduction Date :</label></td>
				<td><input type="date" name="intro_date" /></td>
			</tr>
			<tr>
				<td><label for="package">Package :</label></td>
				<td><input type="text" name="package" /></td>
			</tr>
			<tr>
				<td><label for="pin_count">Pin Count :</label></td>
				<td><input type="number" name="pin_count" step="1" min="0" /></td>
			</tr>
			<tr>
				<td><label for="size">Size :</label></td>
				<td><input type="text" name="size" /></td>
			</tr>
			<tr>
				<td><label for="note">Note :</label></td>
				<td><input type="text" name="note" /></td>
			</tr>	
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitForm(document.forms['update_socket'], 'update', 3);"> Update </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>