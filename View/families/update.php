<div id="update">
	<table class="table">
		<form id="update_family" method="POST" action="index.php">
		<input type="hidden" name="families" value="" />
		<input type="hidden" name="update_family" value="" />			
		<input type="hidden" name="id" />
			<tr>
				<td><label for="name">Name :</label></td>
				<td><input type="text" name="name" required /></td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
						<a href="#" onclick="submitForm(document.forms['update_family'], 'update', 3);"> Update </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>