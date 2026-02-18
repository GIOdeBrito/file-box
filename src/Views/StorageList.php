
<?php require ABSPATH.'/src/Partials/nav.php' ?>

<main class="box">
	<h1>Content List</h1>

	<ul>
		<?php

		// List each file as a link
		foreach($list as $item):

			// Default is package
			$typeSrc = "https://img.icons8.com/?size=100&id=X3MGpXJOGVKe&format=png&color=000000";

			if($item['type'] === 'image')
			{
				$typeSrc = "https://img.icons8.com/?size=100&id=0uIgd8HTuLDw&format=png&color=000000";
			}

			if($item['type'] === 'text')
			{
				$typeSrc = "https://img.icons8.com/?size=100&id=JWpT8cAn8G0V&format=png&color=000000";
			}

			//var_dump($item);

			?>

			<li>
				<form action="/api/v1/storage/get" method="POST">
					<input type="hidden" name="filename" value="<?= $item['name'] ?>">

					<img width="86px" src="<?= $typeSrc ?>" alt="">

					<button class="b-fake-list-item" type="submit"><?= $item['name'] ?></button>
				</form>
			</li>

			<?php
		endforeach;

		?>
	</ul>
</main>
