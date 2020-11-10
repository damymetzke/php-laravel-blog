const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// .postCss('resources/css/app.css', 'public/css', [
//     //
// ]);
mix
    .copyDirectory('resources/static', 'public')
    .js('resources/js/edit-post.ts', 'public/res/js')
    .js('resources/js/create-post.ts', 'public/res/js')

    .sass('resources/sass/root.scss', 'public/res/css')
    .sass('resources/sass/posts.scss', 'public/res/css')
    .sass('resources/sass/admin.scss', 'public/res/css')
    .sass('resources/sass/post.scss', 'public/res/css')
    .sass('resources/sass/edit-post.scss', 'public/res/css')
    .sass('resources/sass/create-post.scss', 'public/res/css')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.ts$/,
                    loader: "ts-loader",
                    exclude: /node_modules/
                }
            ]
        }
    });
