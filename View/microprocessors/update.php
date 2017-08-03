<div id="update">
	<table class="table">
		<form id="update_microprocessor" method="POST" action="index.php">
		<input type="hidden" name="microprocessors" value="" />
		<input type="hidden" name="update_microprocessor" value="" />	
		<input type="hidden" name="id" />	
			<tr>
				<td><label for="model">Model :</label></td>
				<td><input type="text" name="model" required /></td>
			</tr>
			<tr>
				<td><label for="intro_date">Introduction Date :</label></td>
				<td><input type="date" name="intro_date" /></td>
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
				<td><input type="number" name="clock_multiplier" step="0.5" min="1" lang="en" /></td>
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
					<select name="core" multiple id="combobox4">
					<?php
					foreach ($array_c as $sub_array) {
						echo "<option value=\"".$sub_array['id']."\">".$sub_array['model']."</option>";
					}
					?>
					</select>
					<script>
						$("#combobox4").multipleSelect({
							single: true,
							multiple: true,
						});
					</script>
				</td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<div class="button" id="btn-green">
					<a href="#" onclick="submitForm(document.forms['update_microprocessor'], 'update', 3);"> Update </a>
					</div>
				</td>
			</tr>
		</form>
	</table>
</div>