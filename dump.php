<?php
echo "<pre>";
$folder_contents = "categories.dmp  citations.dmp  delnodes.dmp  division.dmp  gencode.dmp  merged.dmp  names.dmp  nodes.dmp  readme.txt";
echo $folder_contents;
$file_list = explode("  ",$folder_contents);
print_r($file_list);
foreach ($file_list as $v)
{       
	$contents = file_get_contents($v);
	echo "\n\n$v".strlen($contents)."\n";
	
	switch ($v)
	{
		case 'nodes.dmp':
			$fields_text = "tax_id parent_tax_id rank embl_code division_id inherited_div_flag genetic_code_id inherited_GC_flag mitochondrial_genetic_code_id inherited_MGC_flag GenBank_hidden_flag hidden_subtree_root_flag comments";			
			echo $fields_text;
			$fields = explode(" ",$fields_text);

			echo $v." ";
			print_r($fields);
		break;
		case 'names.dmp':
		
		break;
		case 'division.dmp':
		
		break;
		case 'delnodes.dmp':
		
		break;
		case 'merged.dmp':
		
		break;
		case 'citations.dmp':
		
		break;
		case 'readme.txt':
		
		break;
		/*
		case '':
		
		break;
		case '':
		
		break;
		*/
		default:
			echo "die";
			break;
	}
	echo "\n";
}
  
echo "</pre>"; 
?>