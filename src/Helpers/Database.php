<?php

namespace FileBox\Helpers\Database;

function create_database_if_not_exists (): void
{
	$databasePath = ABSPATH.'/storage/database.sqlite';

	if(file_exists($databasePath))
	{
		return;
	}

	$database = new \SQLite3($databasePath);

	// Load database initiation script
	$initQuery = file_get_contents(ABSPATH.'/storage/queries/database_init.sql');

	$querySteps = array_map(fn($x) => trim($x), array_filter(explode(';', $initQuery)));

	foreach($querySteps as $query)
	{
		$database->exec($query);
	}

	$database->close();
}

?>