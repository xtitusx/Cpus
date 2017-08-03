<div id="create">
	<table class="table">
		<form id="create_microarchitecture" method="POST" action="index.php">
		<input type="hidden" name="microarchitectures" value="" />
		<input type="hidden" name="create_microarchitecture" value="" />	
			<tr>
				<td><label for="name">Name :</label></td>
				<td><input type="text" name="name" required /></td>
			</tr>
			<tr>
				<td><label for="architecture">Architecture :</label></td>
				<td>
					<select name="architecture" multiple id="combobox3">
						<option value="IA-32" selected>IA-32</option>
						<option value="IA-64">IA-64</option>
					</select>
					<script>
						$("#combobox3").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitForm(document.forms['create_microarchitecture'], 'create', 2);"> Create </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>