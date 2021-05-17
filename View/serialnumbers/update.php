<div id="update">
	<table class="table">
		<form id="update_serialnumber" method="POST" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="serialnumbers" value="" />
		<!-- update_serialnumber ='top', 'other', 'all' en js pour supprimer le(s) jpg -->
		<input type="hidden" name="update_serialnumber" value="" />	
		<input type="hidden" name="id" />
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
					<input type="text" name="placeholder1" placeholder="JPG file" id="update-placeholder-top" disabled/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/floppy-icon.png" class="form-icon" onclick="upload('update-file-top')" alt="upload" title="Add a JPG file"/>
					<input type="file" name="top_picture" id="update-file-top" hidden='hidden' onchange="refreshPlaceholder('update-file-top','update-placeholder-top')"/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/bin-icon.png" class="form-icon" onclick="clean('update_serialnumber','update-file-top','update-placeholder-top','JPG file','top')" alt="clean" title="Remove the JPG file"/>		
				</td>
			</tr>
			<tr>
				<td><label for="other_picture">Other Picture :</label></td>
				<td>
					<input type="text" name="placeholder2" placeholder="JPG file" id="update-placeholder-other" disabled/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/floppy-icon.png" class="form-icon" onclick="upload('update-file-other')" alt="upload" title="Add a JPG file"/>
					<input type="file" name="other_picture" id="update-file-other" hidden='hidden' onchange="refreshPlaceholder('update-file-other','update-placeholder-other')"/>	
					
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpu/public/img/bin-icon.png" class="form-icon" onclick="clean('update_serialnumber','update-file-other','update-placeholder-other','JPG file','other')" alt="clean" title="Remove the JPG file"/>		
				</td>				
			</tr>
			<tr>
				<td><label for="package">Package :</label></td>
				<td>
					<select name="package" multiple id="combobox4">>
						<option value="Ceramic PGA">Ceramic PGA</option>
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
						$("#combobox4").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td><label for="microprocessor">MicroProcessor :</label></td>
				<td>
					<select name="microprocessor" multiple id="combobox6">
					<?php
					foreach ($array_mp as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['mp_model']."</option>";
					}
					?>
					</select>
					<script>
						$("#combobox6").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>
			</tr>			
			<tr>
				<td><label for="socket">Socket :</label></td>
				<td>
					<select name="socket[]" multiple id="combobox2">
					<?php
					foreach ($array_s as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['name']."</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="tested">Tested :</label></td>
				<td>
					<select name="tested" multiple id="combobox8">
						<option value="No">No</option>
						<option value="Yes/OK">Yes/OK</option>
						<option value="Yes/NOK">Yes/NOK</option>
					</select>
					<script>
						$("#combobox8").multipleSelect({
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
					<a href="#" onclick="submitForm(document.forms['update_serialnumber'], 'update', 3);"> Update </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>