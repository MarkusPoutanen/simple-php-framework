# Simple PHP Framework

This is a Laravel-inspired simple MVC-based PHP framework with no external PHP dependencies.

## Features

- Static and dynamic GET routes e.g. `/articles` and `/articles/{id}`
- Controllers to handle routes
- Database migrations
- CLI tool `simple`
- Models (DB data not yet mapped to models)
- PHP and HTML views with subdirectory support via dot syntax e.g. `dir.view`
- Asset bundling using [Parcel](https://parceljs.org/)

## Framework structure

`app/` folder has framework code in it:
- Database: database connection handling
- Helper: helper functions
- Migration: migration interface
- Model: model base class
- Route: saves routes to static array
- Table: database table functions

`cli/` folder has class for the `simple` cli-tool.<br>
`simple` file has PHP code for handling commands for Simple.

## How to use

Clone repository and run `npm install` in root directory.

**Routes** are defined in `routes/web.php` and controllers are located in `controllers/`.<br>
Routing is handled in `app/Route.php` and `public/index.php`.

**Views** are defined in `resources/views/`. PHP and HTML views are supported. Views can also be in sudirectories using dot syntax e.g. `sub.dir.file`. File extension should be omitted.

**Assets** can be bundled with Parcel using npm scripts: `dev`, `watch` or `prod`. Scripts use TypeScript and styles use SCSS. Source assets are located in `resources/js/` and `resources/css/`.

## Code quality

This project uses [PHPStan](https://phpstan.org/) for static analysis.

## Contributions

This is only for my own learning and I don't accept Pull Requests or Issues at this time. Feel free to fork and improve this further.
