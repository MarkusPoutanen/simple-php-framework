<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require "common/head.php" ?>
		<title><?php $article->heading ?></title>
	</head>
	<body>
		<main class="main">
			<h1><?= $article->heading ?></h1>
			<a href="/articles">Back to all articles</a>

			<p>
				<?= strtr($article->content, [PHP_EOL => '</p><p>']) ?>
			</p>
		</main>
	</body>
</html>