<?php

namespace FileBox\Helpers\Database;

use function FileBox\Helpers\SQL\{ sql_get_script_as_array };

function create_database_if_not_exists (): void
{
	$databasePath = ABSPATH.'/storage/database.sqlite';

	if(file_exists($databasePath))
	{
		return;
	}

	$database = new \SQLite3($databasePath);

	$querySteps = sql_get_script_as_array('database_init');

	foreach($querySteps as $query)
	{
		$database->exec($query);
	}

	$database->close();
}

?>