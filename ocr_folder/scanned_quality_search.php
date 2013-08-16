<?php	
	//Most probably you are going to be changing very small values after 99.9
	$default_quality = 55;
	$quality = (isset($_GET['q'])) ? $_GET['q'] : $default_quality; 
	$quality = $quality/1000;
	$o_quality_level = 99.9;
	$o_quality_level = $o_quality_level+$quality;	
	$directory = 'recetas/';
	define('DS',PHP_EOL);
	define('CDS',DS.DS.DS.DS);
	define('LB',"____________________________________________________");
?><pre>
	<?php	
	$output = 'No results';
	$quality_level = 100 - $o_quality_level;
	$valid_files = array();	
	if ($handle = opendir($directory)) {
		$output = 'Results: ';		
		$number_of_files = 0;
		$quality_files = 0;
		while (false !== ($entry = readdir($handle))) {
			$number_of_files++;
			$printable_file_content = str_replace(DS.DS, DS, trim(file_get_contents($directory.'/'.$entry)));
			$file_content = str_replace(DS, ' ', $printable_file_content);
			preg_replace('/[^a-zA-Z0-9 .,-\/:]/', 'X', $file_content,-1,$badchars);
			if($badchars > 0){
				$badchars_rate = (1/(strlen($file_content)/$badchars));
				if($badchars_rate < $quality_level){
					$quality_files++;

					$valid_files[ceil($badchars_rate * 1000000)] = CDS.LB.DS.$entry.' - '.($o_quality_level-$badchars_rate).'% quality'.DS.LB.DS.$printable_file_content;
				}
			}
		}
		ksort($valid_files);
		$output = implode('', ($valid_files));
		closedir($handle);
	}
	echo CDS."[$quality_files] Files of [$number_of_files] has a quality level higher than $o_quality_level% ";
	echo $output;
	?>
</pre>