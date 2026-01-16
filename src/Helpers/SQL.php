<?php 

namespace FileBox\Helpers\SQL;

function sql_get_contents (string $name): string
{
	$path = ABSPATH."/storage/queries/{$name}.sql";
	
	if(!file_exists($path))
	{
		throw new \Exception("File does not exist");
	}
	
	return file_get_contents($path);
}

function sql_get_script_as_array (string $name): array
{
	$content = sql_get_contents($name);
	
	// Split query by ';' and remove empty values
	$splitQuery = array_filter(explode(';', $content));
	
	return array_map(fn($x) => trim($x), $splitQuery);
}

?>