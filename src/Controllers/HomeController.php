<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;
use Pabilsag\Database\Database;
use Pabilsag\Services\AssetManager;
use FileBox\Middlewares\LoginMiddleware;
use FileBox\DAO\MonologueDAO;

class HomeController
{
	public function __construct (
		private MonologueDAO $monologueDao,
		private AssetManager $assets
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
			$structFile['creation-date'] = date ("F d Y H:i:s", filemtime($item));

			$fileStructItemsCollection[] = $structFile;

		endforeach;

		$viewData = [
			'title' => 'Contents',
			'list' => $fileStructItemsCollection
		];

		$this->assets->addStyleSheet("/public/style/page-storage-contents.css", filemtime(ABSPATH."/public/style/page-storage-contents.css"));

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

		$this->assets->addStyleSheet("/public/style/page-monologue.css", filemtime(ABSPATH."/public/style/page-monologue.css"));

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

		$this->assets->addScript("/public/src/put_page.js", filemtime(ABSPATH."/public/src/put_page.js"), true);
		$this->assets->addStyleSheet("/public/style/page-put.css", filemtime(ABSPATH."/public/style/page-put.css"));

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

