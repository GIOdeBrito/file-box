
<?php require ABSPATH.'/src/Partials/nav.php' ?>

<main class="box">
	<h1>Content List</h1>

	<ul>
		<?php

		// List each file as a link
		foreach($list as $item):

			?>

			<li>
				<form action="/api/v1/storage/get" method="POST">
					<input type="hidden" name="filename" value="<?= $item['name'] ?>">

					<button class="b-fake-list-item" type="submit"><?= $item['name'] ?></button>
				</form>
			</li>

			<?php
		endforeach;

		?>
	</ul>
</main>

<style>

	.b-fake-list-item {
		border: none;
		background-color: #0000;
		color: var(--color-foreground);
		font-size: 16px;
		text-decoration: underline;
		cursor: pointer;
	}

</style>