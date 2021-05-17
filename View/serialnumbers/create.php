<div id="create">
	<table class="table">
		<form id="create_serialnumber" method="POST" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="serialnumbers" value="" />
		<input type="hidden" name="create_serialnumber" value="" />	
			<tr>
				<td><label for="fpo_number">FPO Number :</label></td>
				<td><input type="text" name="fpo_number" required /></td>
			</tr>
			<tr>
				<td><label for="part_number">Part Number :</label></td>
				<td><input type="text" name="part_number" /></td>
			</tr>
			<tr>
				<td><label for="top_picture">Top Picture :</label></td>
				<td>
					<input type="text" name="placeholder1" placeholder="JPG file" id="create-placeholder-top" disabled/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/floppy-icon.png" class="form-icon" onclick="upload('create-file-top')" alt="upload" title="Add a JPG file"/>
					<input type="file" name="top_picture" id="create-file-top" hidden='hidden' onchange="refreshPlaceholder('create-file-top','create-placeholder-top')"/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/bin-icon.png" class="form-icon" onclick="clean('update_serialnumber','create-file-top','create-placeholder-top','JPG file','top')" alt="clean" title="Remove the JPG file"/>		
				</td>
			</tr>
			<tr>
				<td><label for="other_picture">Other Picture :</label></td>
				<td>
					<input type="text" name="placeholder2" placeholder="JPG file" id="create-placeholder-other" disabled/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/floppy-icon.png" class="form-icon" onclick="upload('create-file-other')" alt="upload" title="Add a JPG file"/>
					<input type="file" name="other_picture" id="create-file-other" hidden='hidden' onchange="refreshPlaceholder('create-file-other','create-placeholder-other')"/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/bin-icon.png" class="form-icon" onclick="clean('update_serialnumber','create-file-other','create-placeholder-other','JPG file','other')" alt="clean" title="Remove the JPG file"/>		
				</td>
			</tr>
			<tr>
				<td><label for="package">Package :</label></td>
				<td>
					<select name="package" multiple id="combobox3">
						<option value="Ceramic PGA" selected>Ceramic PGA</option>
						<option value="Ceramic PGA Gold heatspreader">Ceramic PGA Gold heatspreader</option>
						<option value="Plastic PGA">Plastic PGA</option>
						<option value="SECC">SECC</option>
						<option value="SECC 2">SECC 2</option>
						<option value="SEPP">SEPP</option>
						<option value="Flip Chip PGA">Flip Chip PGA</option>
						<option value="Flip Chip PGA 2 Metal heatspreader">Flip Chip PGA 2 Metal heatspreader</option>
						<option value="Organic PGA">Organic PGA</option>
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
				<td><label for="microprocessor">MicroProcessor :</label></td>
				<td>
					<select name="microprocessor" multiple id="combobox5">
					<?php
					$first_selected = 0;
					foreach ($array_mp as $sub_array) {
						if ($first_selected == 0) {
							echo "<option value=\"".$sub_array['id']."\" selected>".$sub_array['mp_model']."</option>";
							$first_selected = 1;
						}
						else {
							echo "<option value=\"".$sub_array['id']."\">".$sub_array['mp_model']."</option>";
						}
					}
					?>
					</select>
					<script>
						$("#combobox5").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td><label for="socket">Socket :</label></td>
				<td>
					<select name="socket[]" multiple id="combobox1">
					<?php
					$first_selected = 0;
					foreach ($array_s as $sub_array) {
						if ($first_selected == 0) {
							echo "<option value=\"".$sub_array['id']."\" selected>".$sub_array['name']."</option>";
							$first_selected = 1;
						}
						else {
							echo "<option value=\"".$sub_array['id']."\">".$sub_array['name']."</option>";
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="tested">Tested :</label></td>
				<td>
					<select name="tested" multiple id="combobox7">
						<option value="No" selected>No</option>
						<option value="Yes/OK">Yes/OK</option>
						<option value="Yes/NOK">Yes/NOK</option>
					</select>
					<script>
						$("#combobox7").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>	
			<tr>
				<td><label for="note">Note :</label></td>
				<td><input type="text" name="note" /></td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
						<a href="#" onclick="submitSerialNumberForm(document.forms['create_serialnumber'], 'create', 2, 'create-file-top', 1048576, 'jpeg');"> Create </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>