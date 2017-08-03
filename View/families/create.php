<div id="create">
	<table class="table">
		<form id="create_family" method="POST" action="index.php">
		<input type="hidden" name="families" value="" />
		<input type="hidden" name="create_family" value="" />	
			<tr>
				<td><label for="name">Name :</label></td>
				<td><input type="text" name="name" required /></td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
						<a href="#" onclick="submitForm(document.forms['create_family'], 'create', 2);"> Create </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>