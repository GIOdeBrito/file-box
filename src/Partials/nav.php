<?php

// Main navigation bar component

?>
<nav class="box">
	<a href="/">
		<img src="/public/media/home.webp" alt="home">
	</a>

	<div class="left-area">
		<p>User: <b><?= $_SESSION['given_name'] ?></b>.</p>
		<p>IP: <?= $_SERVER['REMOTE_ADDR'] ?></p>
	</div>
</nav>