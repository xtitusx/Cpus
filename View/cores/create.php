<div id="create">
	<table class="table">
		<form id="create_core" method="POST" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="cores" value="" />
		<input type="hidden" name="create_core" value="" />	
			<tr>
				<td><label for="model">Model :</label></td>
				<td><input type="text" name="model" required /></td>
			</tr>
			<tr>
				<td><label for="manufacturer">Manufacturer :</label></td>
				<td>
					<select name="manufacturer" multiple id="combobox3">
						<option value="AMD">AMD</option>
						<option value="Intel" selected>Intel</option>
						<option value="Cyrix/IBM/ST">Cyrix/IBM/ST</option>
						<option value="IDT">IDT</option>
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
				<td><label for="core_number">Number of Cores :</label></td>
				<td><input type="text" name="core_number" placeholder="ex : 1, 2/4(cores/threads)" /></td>
			</tr>
			<tr>
				<td><label for="l1_cache">L1 Cache :</label></td>
				<td><input type="text" name="l1_cache" placeholder="ex : 16Ko" /></td>
			</tr>			
			<tr>
				<td><label for="l2_cache">L2 Cache :</label></td>
				<td><input type="text" name="l2_cache" /></td>
			</tr>
			<tr>
				<td><label for="l3_cache">L3 Cache :</label></td>
				<td><input type="text" name="l3_cache" /></td>
			</tr>			
			<tr>
				<td><label for="transistors">Transistors :</label></td>
				<td><input type="text" name="transistors" placeholder="ex : 1000000" /></td>
			</tr>
			<tr>
				<td><label for="datasheet">Datasheet :</label></td>
				<td>
					<input type="text" name="placeholder" placeholder="PDF file" id="create-placeholder-datasheet" disabled/>
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpus/public/img/floppy-icon.png" class="form-icon" onclick="upload('create-file-datasheet')" alt="upload" title="Add a Datasheet PDF file"/>
					<input type="file" name="datasheet" id="create-file-datasheet" hidden='hidden' onchange="refreshPlaceholder('create-file-datasheet','create-placeholder-datasheet')"/>	
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpus/public/img/bin-icon.png" class="form-icon" onclick="clean('update_core','create-file-datasheet','create-placeholder-datasheet','PDF file','clean')" alt="clean" title="Remove the Datasheet PDF file"/>		
				</td>
			</tr>
			<tr>
				<td><label for="microarchitecture">MicroArchitecture :</label></td>
				<td>
					<select name="microarchitecture" multiple id="combobox5">
					<?php
					$first_selected = 0;
					foreach ($array_ma as $sub_array) {
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
					<script>
						$("#combobox5").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>				
			</tr>
			<tr>
				<td><label for="family">Family :</label></td>
				<td>
					<select name="family" multiple id="combobox7">
					<?php
					$first_selected = 0;
					foreach ($array_fm as $sub_array) {
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
					<script>
						$("#combobox7").multipleSelect({
							single: true,
							multiple: false,
						});
					</script>
				</td>				
			</tr>			
			<tr>
				<td><label for="instructionset">InstructionSets :</label></td>
				<td>
					<select name="instructionset[]" multiple id="combobox1">
					<?php
					$first_selected = 0;
					foreach ($array_isc as $sub_array) {
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
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitCoreForm(document.forms['create_core'], 'create', 2, 'create-file-datasheet',15728640, 'pdf');"> Create </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>