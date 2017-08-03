<div id="index">
	<table id="microprocessors_dragtable" class="drag">
        <thead>
			<tr>
				<?php
				if (!empty($array_mp)) {
					echo '<th class="hcell" data-header="model">Model</th>';
					echo '<th class="hcell" data-header="intro_date">Introduced</th>';
					echo '<th class="hcell" data-header="smp_process">SMP Process</th>';
					echo '<th class="hcell" data-header="core_speed">Core Spd</th>';
					echo '<th class="hcell" data-header="bus_speed">Bus Spd</th>';
					echo '<th class="hcell" data-header="clock_multiplier">Clock M</th>';
					echo '<th class="hcell" data-header="core_voltage">Core V</th>';
					echo '<th class="hcell" data-header="io_voltage">I/O V</th>';
					echo '<th class="hcell" data-header="tdp">TDP</th>';
					//echo '<th class="hcell" data-header="speedsys_benchmark" title="ENV : Dos">Speedsys Score</th>';
					echo '<th class="hcell" data-header="speedsys_benchmark"><a href="#" class="info">Speedsys Score<span>ENV : Dos</span></a></th>';
					//echo '<th class="hcell" data-header="doom_benchmark" title="Doom 1.9 timedemo 3 ENV : Windows w/ sound card, Screen Size:HUD visible, Detail:HIGH">Doom Bench</th>';
					echo '<th class="hcell" data-header="doom_benchmark"><a href="#" class="info" id="doom">Doom Bench<span>Doom 1.9 timedemo 3 ENV : Windows w/ sound card, Screen Size:HUD visible, Detail:HIGH</span></a></th>';
					echo '<th class="hcell" data-header="core">Core</th>';
				}
				?>	
			</tr>
		</thead>
		<tbody id="microprocessors_sortable">	
			<?php
			foreach ($array_mp as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				$field = 0;
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					if ($value == '0' || $value == "0000-00-00" || $value == '') { 
						$value = "N/C";
					}
					// Remise en forme du SMP Process (nm)
					else if ($field == 2) {
						$value = $value."nm";
					}
					// Remise en forme du Core Speed et Bus Speed (MHz)
					else if ($field == 3 || $field == 4) {
						$value = $value."MHz";
					}
					// Remise en forme du Clock Multiplier (x)
					else if ($field ==5) {
							$value = $value."x";
					}
					// Remise en forme du Core Voltage et I/O Voltage (V)
					else if ($field == 6 || $field == 7) {
						$value = $value."V";
					}
					// Remise en forme du TDP (W)
					else if ($field == 8) {
						$value = $value."W";
					}			
					// Remise en forme du Doom Benchmark (FPS)
					else if ($field == 10) {
						$value = $value."FPS";
					}					
					echo "<td class=\"cell cell2\" style=\"white-space:normal\">$value</td>";
					$field++;
				}		
								
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 

				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshMicroProcessorForm(document.forms['update_microprocessor'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_microprocessor#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="microprocessors" value=""/>';
				echo '<input type="hidden" name="delete_microprocessor" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_microprocessor#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>			
		</tbody>
	</table>
</div>