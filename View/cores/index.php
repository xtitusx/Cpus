<div id="index">
	<table id="cores_dragtable" class="drag">
        <thead>
			<tr>
				<?php
				if (!empty($array_c)) {
					echo '<th class="hcell" data-header="model">Model</th>';
					echo '<th class="hcell" data-header="manufacturer">Manuf</th>';
					echo '<th class="hcell" data-header="cores">Cores</th>';
					echo '<th class="hcell" data-header="l1_cache">L1 Cache</th>';
					echo '<th class="hcell" data-header="l2_cache">L2 Cache</th>';
					echo '<th class="hcell" data-header="l3_cache">L3 Cache</th>';
					echo '<th class="hcell" data-header="transistors">Transistors</th>';
					echo '<th class="hcell" data-header="datasheet">Datasheet</th>';
					echo '<th class="hcell" data-header="microarchitecture">MicroArch</th>';
					echo '<th class="hcell" data-header="family">Family</th>';
					echo '<th class="hcell" data-header="instructionsets">InstructionSets</th>';
				}
				?>
			</tr>
		</thead>
		<tbody id="cores_sortable">		
			<?php
			foreach ($array_c as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				$field = 0;
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					// Remise en forme du L1->L3 cache si nul (N/A)
					if ($field > 2 && $field < 6) {
						if ($value == "") {
							$value = "N/A";
						}
						echo "<td class=\"cell\">$value</td>";
					}
					// Remise en forme du nombre de transistors (M, G)
					else if ($field ==6) {
						$len = strlen($value);
						if ($value == "0") {
						$value = "N/C";
						}
						else if ($len >= 10) {
							$value = round($value/1000/1000/1000, 2);
							$value = $value . "G";
						}
						else if ($len >= 7) {
							$value = round($value/1000/1000, 2);
							$value = $value . "M";
						}
						echo "<td class=\"cell\">$value</td>";
					}
					// Datasheet link
					else if ($field ==7) {
						if ($value == "") { 
							$value = "N/C";
							echo "<td class=\"cell td_pdf-icon_null\">$value</td>";
						}
						else {
							// On n'affiche pas les codes retour erreur des uploads
							$pattern = "/^[0-3]$/";
							if (! preg_match($pattern,$value)) {
								$value_link= 'http://'.$_SERVER['HTTP_HOST'].'/cpu/public/pdf/'.$value;
								$value_link = '<a href="'.$value_link.'" '.'target="_blank"><img src="http://'.$_SERVER['HTTP_HOST'].'/cpu/public/img/pdf-icon.png" class="pdf-icon" alt="'.$value.'" title="'.$value.'"/></a>';
								$value = $value_link;
								echo "<td class=\"cell td_pdf-icon\">$value</td>";
							}
							else {
								$value = "N/C";
								echo "<td class=\"cell td_pdf-icon_null\">$value</td>";
							}
						}
					}
					else {
						echo "<td class=\"cell\">$value</td>";
					}
					$field++;
				}		
								
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 
				
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshCoreForm(document.forms['update_core'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_core#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="cores" value=""/>';
				echo '<input type="hidden" name="delete_core" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_core#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>			
		</tbody>
	</table>
</div>