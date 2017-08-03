<div id="update">
	<table class="table">
		<form id="update_microarchitecture" method="POST" action="index.php">
		<input type="hidden" name="microarchitectures" value="" />
		<input type="hidden" name="update_microarchitecture" value="" />			
		<input type="hidden" name="id" />
			<tr>
				<td><label for="name">Name :</label></td>
				<td><input type="text" name="name" required /></td>
			</tr>
			<tr>
				<td><label for="architecture">Architecture :</label></td>
				<td>
					<select name="architecture" multiple id="combobox4">
						<option value="IA-32">IA-32</option>
						<option value="IA-64">IA-64</option>
					</select>
					<script>
						$("#combobox4").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitForm(document.forms['update_microarchitecture'], 'update', 3);"> Update </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>