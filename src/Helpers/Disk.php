<?php

namespace FileBox\Helpers\Disk;

function create_folder_if_not_exists (string $path): void
{
	if(is_dir($path))
	{
		return true;
	}
	
	try
	{
		mkdir($path, 0755, true);
	}
	catch(\Exception $ex)
	{
		error_log("Error when creating new folder: ".$ex->getMessage(), 0);
		throw $ex;
	}
}

?>