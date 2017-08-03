<div id="index">
	<table id="serialnumbers_dragtable" class="drag">
        <thead>
			<tr>
				<?php
				if (!empty($array_sn)) {
					echo '<th class="hcell" data-header="fpo_number">FPO Number</th>';
					echo '<th class="hcell" data-header="part_number">Part Number</th>';
					echo '<th class="hcell" data-header="top_picture">Top Picture</th>';
					echo '<th class="hcell" data-header="other_picture">Other Picture</th>';
					echo '<th class="hcell" data-header="package">Package</th>';
					echo '<th class="hcell" data-header="microprocessor">MicroProcessor</th>';
					echo '<th class="hcell" data-header="socket">Socket</th>';
					echo '<th class="hcell" data-header="tested">Tested</th>';
					echo '<th class="hcell" data-header="note">Note</th>';
				}
				?>	
			</tr>
		</thead>
		<tbody id="serialnumbers_sortable">	
			<?php
			foreach ($array_sn as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				$field = 0;
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					if ($value == "") { 
						$value = "N/C";
					}
					// On n'affiche pas les valeurs retour de l'upload d'images
					else if ((($field == 2) || ($field == 3)) && (is_numeric($value))) {
						$value = "N/C";
					}
					else if (($field == 2) || ($field == 3))  {
						$value = "<img src=\"http://".$_SERVER['HTTP_HOST']."/cpus/public/jpeg/$value\" class=\"cpu-img\" alt=\"\" title=\"\" />";
					}
					if ((($field == 2) || ($field == 3)) && $value == "N/C") {
						echo "<td class=\"cpu-img_null\">$value</td>";
					}
					else if ((($field == 2) || ($field == 3)) && $value != "N/C") {
						echo "<td class=\"cell td_cpu-img\">$value</td>";
					}
					else if (($field == 4) || ($field == 5) || ($field == 6)) {
						echo "<td class=\"cell cell2\" style=\"white-space:normal\">$value</td>";
					}
					else {
						echo "<td class=\"cell\" style=\"white-space:normal\">$value</td>";
					}
					$field++;
				}
				
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 

				/*echo "<td><div class=\"button\"><a href=\"#\" onclick=\"refreshSerialNumberForm(document.forms['update_serialnumber'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button">';
				echo "<form id=\"delete_serialnumber#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="serialnumbers" value=""/>';
				echo '<input type="hidden" name="delete_serialnumber" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_serialnumber#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";*/
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshSerialNumberForm(document.forms['update_serialnumber'], 3, $id, $value_list);\"> Edit </a></div>";				
				
				echo '<div class="button" id="btn-red">';
				echo "<form id=\"delete_serialnumber#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="serialnumbers" value=""/>';
				echo '<input type="hidden" name="delete_serialnumber" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_serialnumber#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";
			}
			?>			
		</tbody>
	</table>
</div>