let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.ts('resources/ts/app.ts', 'assets/js/')
   .sass('resources/scss/app.scss', 'assets/css/');

mix.disableNotifications();
