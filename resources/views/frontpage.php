<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple PHP Framework</title>
        <link rel="stylesheet" href="/assets/css/app.css?ver=0.1">
    </head>
    
    <body>
        <main class="main">
            <h1>Simple PHP Framework</h1>
            <p>This is a Laravel-inspired simple custom MVC-based PHP framework.</p>
            <p>Current date: <?= date('Y-m-d') ?></p>
    
            <h2>Demo pages</h2>
            <p>These pages demonstrate framework's features.</p>
            <ul>
                <li><a href="/hello">HTML view in a subdirectory</a></li>
                <li><a href="/articles">Models from database</a></li>
            </ul>
        </main>
    </body>
</html>