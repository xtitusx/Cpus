<div id="create">
	<table class="table">
		<form id="create_microprocessor" method="POST" action="index.php">
		<input type="hidden" name="microprocessors" value="" />
		<input type="hidden" name="create_microprocessor" value="" />	
			<tr>
				<td><label for="model">Model :</label></td>
				<td><input type="text" name="model" required /></td>
			</tr>
			<tr>
				<td><label for="intro_date">Introduction Date :</label></td>
				<td><input type="date" name="intro_date" placeholder="yyyy-mm-dd" /></td>
			</tr>
			<tr>
				<td><label for="smp_process">SMP Process(nm) :</label></td>
				<td><input type="text" name="smp_process" step="1" min="0" /></td>
			</tr>
			<tr>
				<td><label for="core_speed">Core Speed(MHz) :</label></td>
				<td><input type="number" name="core_speed" step="1" min="0" /></td>
			</tr>
			<tr>
				<td><label for="bus_speed">Bus Speed(MHz) :</label></td>
				<td><input type="number" name="bus_speed" step="1" min="0" /></td>
			</tr>
			<tr>
				<td><label for="clock_multiplier">Clock Multiplier(x) :</label></td>
				<td><input type="number" name="clock_multiplier" value="1" step="0.5" min="1" lang="en" /></td>
			</tr>			
			<tr>
				<td><label for="core_voltage">Core Voltage(V) :</label></td>
				<td><input type="text" name="core_voltage" /></td>
			</tr>
			<tr>
				<td><label for="io_voltage">I/O Voltage(V) :</label></td>
				<td><input type="text" name="io_voltage" /></td>
			</tr>
			<tr>
				<td><label for="tdp">Thermal Design Power(W) :</label></td>
				<td><input type="number" name="tdp" step="0.01" lang="en" /></td>
			</tr>
			<tr>
				<td><label for="speedsys_benchmark">Speedsys Score :</label></td>
				<td><input type="number" name="speedsys_benchmark"  step="0.01" lang="en" /></td>
			</tr>			
				<td><label for="doom_benchmark">Doom Benchmark(FPS) :</label></td>
				<td><input type="number" name="doom_benchmark" step="0.01" lang="en" /></td>
			</tr>			
			<tr class="corebox">
				<td><label for="core">Core :</label></td>
				<td>
					<select name="core" multiple id="combobox3">
					<?php
					$first_selected = 0;
					foreach ($array_c as $sub_array) {
						if ($first_selected == 0) {
							echo "<option value=\"".$sub_array['id']."\" selected>".$sub_array['model']."</option>";
							$first_selected = 1;
						}
						else {
							echo "<option value=\"".$sub_array['id']."\">".$sub_array['model']."</option>";
						}
					}
					?>
					</select>
					<script>
						$("#combobox3").multipleSelect({
							single: true,
							multiple: true,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitForm(document.forms['create_microprocessor'], 'create', 2);"> Create </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>