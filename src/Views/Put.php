<?php

// Put view

?>

<script src="/public/src/put_page.js" type="module"></script>

<main class="box">
	<h1>Put</h1>

	<form class="" action="index.html" method="post">
		<input type="file" data-name="file-input">

		<button class="b-main" data-name="bsubmit">Send</button>

		<meter data-name="progress-bar">
	</form>
</main>

<style>

	form > * {
		display: block;
	}

	meter {
		width: 100%;
	}

	input[type="file"] {
		padding: 1rem 0;
	}

</style>