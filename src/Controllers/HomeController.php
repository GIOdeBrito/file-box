<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;
use Pabilsag\Database\Database;
use FileBox\Middlewares\LoginMiddleware;

use function FileBox\Helpers\SQL\sql_get_contents;

class HomeController
{
	public function __construct (
		public Database $db
	) {}

	#[Route(
		method: 'GET',
		path: '/',
	)]
	public function index ($req, $res): Response
	{
		$viewData = [
			'title' => 'Home'
		];

		return $res->status(200)->render('Home', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/contents',
	)]
	public function contentList ($req, $res): Response
	{
		$folderItems = glob(ABSPATH.'/storage/public/*');
		$fileStructItemsCollection = [];

		foreach($folderItems as $item):

			if(is_dir($item))
			{
				continue;
			}

			$structFile = [];

			$parts = explode('/', $item);

			$structFile['name'] = end($parts);
			$structFile['path'] = $item;
			$structFile['mime'] = mime_content_type($item);
			$structFile['type'] = explode('/', mime_content_type($item))[0];

			$fileStructItemsCollection[] = $structFile;

		endforeach;

		$viewData = [
			'title' => 'Contents',
			'list' => $fileStructItemsCollection
		];

		return $res->status(200)->render('StorageList', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/monologue',
	)]
	public function monologuesPage ($req, $res): Response
	{
		$database = $this->db;

		$database->connect('sqlite_db');
		$result = $database->query(
			sql_get_contents('select_all_comments')
		);

		$viewData = [
			'title' => 'Monologue',
			'collection' => $result
		];

		return $res->status(200)->render('Monologue', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/put',
	)]
	public function putPage ($req, $res): Response
	{
		$viewData = [
			'title' => 'Put'
		];

		return $res->status(200)->render('Put', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/404',
		isFallbackRoute: true
	)]
	public function errorPage ($req, $res): Response
	{
		$viewData = [
			'title' => 'Not Found'
		];

		return $res->status(200)->render('404', 'main', $viewData);
	}
}

?>