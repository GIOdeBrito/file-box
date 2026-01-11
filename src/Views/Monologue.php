
<?php require ABSPATH.'/src/Partials/nav.php' ?>

<main class="box">
	<h1>Monologues</h1>

	<?php

	var_dump($collection);

	foreach($collection as $item):
		?>

		<div>
			<p><?= $item['name'] ?></p>
			<p><?= $item['content'] ?></p>
		</div>

		<?php
	endforeach;

	?>
</main>