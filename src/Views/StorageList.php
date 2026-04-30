
<?php require ABSPATH.'/src/Partials/nav.php' ?>

<main class="box">
	<h1>Content List</h1>

	<table>
		<thead>
			<th>Name</th>
			<th>Creation Date</th>
			<th>Mime</th>
			<th>Actions</th>
		</thead>

		<tbody>
			<?php

			// https://icons8.com/icons/set/photo--style-office--2000s--technique-filled

			// List each file as a link
			foreach($list as $item):

				// Default is package
				$typeSrc = "/public/media/package.webp";

				if($item['type'] === 'image')
				{
					$typeSrc = "/public/media/picture.webp";
				}

				if($item['type'] === 'text')
				{
					$typeSrc = "/public/media/text.webp";
				}

				//var_dump($item);

				?>
				<tr>
					<td>
						<img src="<?= $typeSrc ?>" alt="icon">
						<?= $item['name'] ?>
					</td>
					<td><?= $item['creation-date'] ?></td>
					<td><?= $item['mime'] ?></td>
					<td>
						<form action="/api/v1/storage/get" method="POST">
							<input type="hidden" name="filename" value="<?= $item['name'] ?>">
							<button type="submit">Download</button>
						</form>
					</td>
				</tr>
				<?php
			endforeach;
			?>
		</tbody>
	</table>
</main>
