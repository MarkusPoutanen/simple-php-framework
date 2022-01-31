<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/assets/css/app.css?ver=0.1">
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