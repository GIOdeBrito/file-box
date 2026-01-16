
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
			</div>
	
			<?php
		endforeach;
	
		?>
	</section>
	
	<section>
		<form action="index.html" method="POST">
			<textarea class="text-block" name="" rows="8" cols="80"></textarea>
			<input class="button-main" type="submit" name="content" value="Send">
		</form>
	</section>
</main>

<style>

	form {
		display: flex;
		flex-direction: column;
	}

	.comment-box {
		margin: 1rem 0;
	}
	
	.comment-box p[data-name="user-name"] {
		font-weight: bold;
	}
	
	.comment-box p[data-name="content"] {
		border-style: inset;
		border-color: #b1b1b1;
		padding: .75rem;
		box-sizing: border-box;
	}
	
</style>