<div id="index">
	<table>
        <thead>
			<tr>
				<?php
				if (!empty($array_fm)) {
					echo '<th class="hcell">Name</th>';
				}
				?>
            </tr>
		</thead>
		<tbody id="families_sortable" class="drag">		
			<?php
			foreach ($array_fm as $sub_array) {
				$id = array_shift($sub_array);
				echo "<tr id=\"$id\">";

				$value_list = "";
				
				foreach($sub_array as $value) {
					$value_list = $value_list.$value."#";
					$value = str_replace("\\'", "&#8216", $value);
					echo "<td class=\"cell\">$value</td>";
				}		
				
				$value_list = substr($value_list,0,-3);
				$value_list = str_replace('\'', "&#8216", $value_list);
				$value_list = "'".$value_list."'";
				$value_list = str_replace('"', "&#34", $value_list); 
				
				echo "<td><div class=\"button\" id=\"btn-blue\"><a href=\"#\" onclick=\"refreshForm(document.forms['update_family'], 3, $id, $value_list);\"> Edit </a></div></td>";				
				
				echo '<td><div class="button" id="btn-red">';
				echo "<form id=\"delete_family#$id\" method=\"POST\" action=\"index.php\">";
				echo '<input type="hidden" name="families" value=""/>';
				echo '<input type="hidden" name="delete_family" value="'.$id.'"/>';
				echo "</form>";
				echo "<a href=\"#\" onclick=\"document.getElementById('delete_family#".$id."').submit();\"> Delete </a>";
				echo "</div></td>";
				echo "</tr>";				
			}
			?>			
		</tbody>
	</table>
</div>