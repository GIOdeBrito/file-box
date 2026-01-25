
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

<style>

	ul {
	    list-style-type: none;
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
		gap: 1rem;
		margin: 0;
		padding: 0;
	}

	ul > li {
		width: 200px;
	}

	ul form {
		display: flex;
		flex-direction: column;
		align-items: center;
		cursor: pointer;
	}

	.b-fake-list-item {
		border: none;
		background-color: #0000;
		color: var(--color-foreground);
		font-size: 16px;
		cursor: pointer;
	}

</style>