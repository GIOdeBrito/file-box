<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;
use Pabilsag\Database\Database;
use FileBox\Middlewares\LoginMiddleware;
use FileBox\DAO\MonologueDAO;

class HomeController
{
	public function __construct (
		private MonologueDAO $monologueDao
	) {}

	#[Route(
		method: 'GET',
		path: '/',
	)]
	public function index ($req, $res): Response
	{
		return $res->status(200)->render('Home', 'main', [
			'title' => 'Home'
		]);
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
		$viewData = [
			'title' => 'Monologue',
			'collection' => $this->monologueDao->getAllComments()
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

