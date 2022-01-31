<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/assets/css/app.css?ver=0.1">
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