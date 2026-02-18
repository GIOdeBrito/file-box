
<?php require ABSPATH.'/src/Partials/nav.php' ?>

<main class="box">
	<h1>Monologue</h1>

	<section>
		<?php

		foreach($collection ?? [] as $item):
			?>

			<div class="comment-box">
				<p data-name="user-name">
					<?= $item['name']." - ".$item['created_at'] ?>
				</p>
				<p data-name="content">
					<?= $item['content'] ?>
				</p>
				<input type="hidden" name="id" value="<?= $item['id'] ?>">
			</div>

			<?php
		endforeach;

		?>
	</section>

	<section>
		<form>
			<textarea class="text-block" name="" rows="8" cols="80" required></textarea>
			<input class="button-main" type="submit" name="content" value="Send">
		</form>
	</section>
</main>
