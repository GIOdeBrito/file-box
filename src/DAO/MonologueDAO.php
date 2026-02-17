<?php

namespace FileBox\DAO;

use Pabilsag\Database\Database;

use function FileBox\Helpers\SQL\sql_get_contents;

class MonologueDAO
{
	public function __construct (
		private Database $db
	) {
		$db->connect('sqlite_db');
	}

	public function getAllComments (): array
	{
		return $this->db->query(
			sql_get_contents('select_all_comments')
		);
	}

	public function insertComment (int $userid, string $content): bool
	{
		$result = $this->db->execute(
			sql_get_contents('insert_new_comment'),
			[
				'content' => $content,
				'userid' => $userid
			]
		);

		$this->db->commit();

		return $result;
	}

	public function removeComment (int $id): bool
	{
		$result = $this->db->execute(
			sql_get_contents('remove_comment'),
			[ 'cid' => $id ]
		);

		$this->db->commit();

		return $result;
	}
}

