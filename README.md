# Simple PHP Framework

This is a Laravel-inspired simple custom MVC-based PHP framework.

## How to use

Clone repository and run `npm install` in root directory.

Routes are defined in `routes/web.php` and controllers are located in `controllers`.

Views are defined in `resources/views`. PHP and HTML views are supported. Views can also be in sudirectories using dot syntax e.g. `sub.dir`. File extension can be omitted.

Assets can be compiled with Laravel Mix using npm scripts: `dev`, `watch` or `prod`. Script use TypeScript and styles SCSS. Source assets are located in `resources/ts` and `resources/scss`.

`app` folder has framework code in it and routing is handled in `public/index.php` and `.htaccess`.

## Contributions

This is only for my own learning and I don't accept Pull Requests or Issues.
