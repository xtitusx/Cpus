<div id="update">
	<table class="table">
		<form id="update_core" method="POST" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="cores" value="" />
		<!-- update_core ="clean" en js pour supprimer le pdf datasheet-->
		<input type="hidden" name="update_core" value="" />			
		<input type="hidden" name="id" />
			<tr>
				<td><label for="model">Model :</label></td>
				<td><input type="text" name="model" required /></td>
			</tr>
			<tr>
				<td><label for="manufacturer">Manufacturer :</label></td>
				<td>
					<select name="manufacturer" multiple id="combobox4">
						<option value="AMD">AMD</option>
						<option value="Intel">Intel</option>
						<option value="Cyrix/IBM/ST">Cyrix/IBM/ST</option>
						<option value="IDT">IDT</option>
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
				<td><label for="core_number">Number of Cores :</label></td>
				<td><input type="text" name="core_number" /></td>
			</tr>
			<tr>
				<td><label for="l1_cache">L1 Cache :</label></td>
				<td><input type="text" name="l1_cache" /></td>
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
				<td><input type="text" name="transistors" /></td>
			</tr>				
			<tr>
				<td><label for="datasheet">Datasheet :</label></td>
				<td>
					<input type="text" name="placeholder" placeholder="PDF file" id="update-placeholder-datasheet" disabled/>	
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpus/public/img/floppy-icon.png" class="form-icon" onclick="upload('update-file-datasheet')" alt="upload" title="Add a Datasheet PDF file"/>
					<input type="file" name="datasheet" id="update-file-datasheet" hidden='hidden' onchange="refreshPlaceholder('update-file-datasheet','update-placeholder-datasheet')"/>
					<img src="http://<?= $_SERVER['HTTP_HOST']?>/cpus/public/img/bin-icon.png" class="form-icon" onclick="clean('update_core','update-file-datasheet','update-placeholder-datasheet','PDF file','clean')" alt="clean" title="Remove the Datasheet PDF file"/>
				</td>
			</tr>						
			<tr>
				<td><label for="microarchitecture">MicroArchitecture :</label></td>
				<td>
					<select name="microarchitecture" multiple id="combobox6">
					<?php
					foreach ($array_ma as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['name']."</option>";
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
				<td><label for="family">Family :</label></td>
				<td>
					<select name="family" multiple id="combobox8">
					<?php
					foreach ($array_fm as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['name']."</option>";
					}
					?>
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
				<td><label for="instructionset">InstructionSets :</label></td>
				<td>
					<select name="instructionset[]" multiple id="combobox2">
					<?php
					foreach ($array_isc as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['name']."</option>";
					}
					?>
					</select>
				</td>
			</tr>	
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitCoreForm(document.forms['update_core'], 'update', 2, 'update-file-datasheet',15728640, 'pdf');"> Update </a>								  
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>