<div id="index">
	<table>
        <thead>
			<tr>
				<?php
				if (!empty($array)) {
					echo '<th class="hcell">Name</th>';
					echo '<th class="hcell">Note</th>';
				}
				?>
			</tr>
		</thead>
		<tbody id="instructionsets_sortable" class="drag">
			<?php
			foreach ($array as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					if ($value == '') { 
						$value = "N/C";
					}
					echo "<td class=\"cell\">$value</td>";
				}		
				
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 
				
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshForm(document.forms['update_instructionset'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_instructionset#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="instructionsets" value=""/>';
				echo '<input type="hidden" name="delete_instructionset" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_instructionset#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>	
		</tbody>
	</table>
</div>