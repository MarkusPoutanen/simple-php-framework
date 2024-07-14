<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require "common/head.php" ?>
		<title>Articles</title>
	</head>
	<body>
		<main class="main">
			<h1>Articles</h1>
			<p>These articles come from the database.</p>
			<a href="/">Back to frontpage</a>

			<?php if($articles ?? false): ?>
				<?php foreach($articles as $article): ?>
					<h2><?= $article->heading ?></h2>
					<a href="/articles/<?= $article->id ?>">Read</a>
				<?php endforeach ?>
			<?php else: ?>
				<p>No articles in the database. You need to run migrations and add articles to database.</p>
			<?php endif ?>
		</main>
	</body>
</html>