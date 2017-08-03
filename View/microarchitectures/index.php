<div id="index">
	<table>
        <thead>
			<tr>
				<?php
				if (!empty($array)) {
					echo '<th class="hcell">Name</th>';
					echo '<th class="hcell">Architecture</th>';
				}
				?>
            </tr>
		</thead>
		<tbody id="microarchitectures_sortable" class="drag">	
			<?php
			foreach ($array as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					echo "<td class=\"cell\">$value</td>";
				}		
				
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 
				
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshMicroArchitectureForm(document.forms['update_microarchitecture'], 3, $id, $value_list);\"> Edit </a></div></td>";		
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_microarchitecture#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="microarchitectures" value=""/>';
				echo '<input type="hidden" name="delete_microarchitecture" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_microarchitecture#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>			
		</tbody>
	</table>
</div>