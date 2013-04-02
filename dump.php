<?php
echo "<pre>";
//$filename_list = "categories citations delnodes division gencode merged names nodes";
$filename_list = "citations delnodes division gencode merged names nodes";
$file_list = explode(" ",$filename_list);

foreach ($file_list as $k=>$word)
{       
	 $filename_dmp = $word.".dmp";	 
	 $filename_cols = $word."_cols.dmp";
	 $dmp_contents = file_get_contents($filename_dmp);
	 $cols_contents = file_get_contents($filename_cols);
	 
	/**
	 * Here we want to use the column names/comments to auto create talbe if not exists
	 */
	
	//Parse the cols file into an array and then turn that into the columns part of the sql stmt
	$cols_contents_line = explode("\n",$cols_contents);
	foreach ($cols_contents_line as $k=>$v)
	{
		$cols_contents_line_split = explode("--",$v);
		$cols[$k]['name'] = str_replace(" ", "_", trim($cols_contents_line_split[0]));
		$cols[$k]['type'] = "VARCHAR(45)";
		$cols[$k]['comment'] = trim($cols_contents_line_split[1]);
	}
	$create_cols_sql = "";
	foreach ($cols as $k=>$v)
	{
		$create_cols_sql .= " `".$v['name']."` ".$v['type']." NOT NULL COMMENT '".$v['comment']."',
			";
	}
	 $create_sql = "
	 		
	 		CREATE  TABLE IF NOT EXISTS `".$word."` (
  				`".$word."_id` INT NOT NULL, ";
  	 $create_sql .= $create_cols_sql;
   	 $create_sql .= " PRIMARY KEY (`".$word."_id`), 
   	 					KEY `".$word."_ndx` (`".$cols[0]['name']."`) )";
  	 
   	 $mysqli = new mysqli("localhost", "", "", "test");
   	 echo __FILE__.":".__LINE__;
   	 $drop_sql = " DROP TABLE IF EXISTS `".$word."` ";
   	 $res = $mysqli->query($drop_sql);
   	 $res = $mysqli->query($create_sql);
   	 echo $create_sql;
   	 echo "<bR>";
  	 
	 
  	 
  	 /**
  	  * Then we will do the hard part of isnerting records intot he tables, from the text files.
  	  */
	 
	 /**
	  * Then we will also have to make a module to update source files periodically by checking original source and rerun this script to rebuild.
	  */
	 echo "<bR>";
}
  
echo "</pre>"; 
?>