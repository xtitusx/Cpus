<div id="index">
	<table>
        <thead>
			<tr>
				<?php
				if (!empty($array)) {
					echo '<th class="hcell">Name</th>';
					echo '<th class="hcell">Introduced</th>';
					echo '<th class="hcell">Package</th>';
					echo '<th class="hcell">Pin Count</th>';
					echo '<th class="hcell">Size</th>';
					echo '<th class="hcell">Note</th>';
				}
				?>
            </tr>
		</thead>
		<tbody id="sockets_sortable" class="drag">
			<?php
			foreach ($array as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";
				
				$value_list = "";

				foreach($sub_array as $value) {
					$value_list = $value_list.$value."|#|";
					$value = str_replace("\\'", "&#8216", $value);
					if ($value == "0" || $value == "" || $value == "0000-00") {
						$value = "N/C";
					}
					echo "<td class=\"cell\">$value</td>";
				}		

				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 
				
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshForm(document.forms['update_socket'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_socket#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="sockets" value=""/>';
				echo '<input type="hidden" name="delete_socket" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_socket#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>
		</tbody>
	</table>
</div>