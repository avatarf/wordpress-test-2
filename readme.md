# Pure composer based wordpress development on Kinsta app hosting

This is an example composer based development repo for Kinsta app hosting. You will need a database and persistent storage attached to the app for keeping all the data you push into the app during runtime.

Only the wp-content/uploads folder content will be persistent! All the plugins, themes development should be handled via composer.

## Folders and files

- `src/` -- stores the custom files and folders
  - `src/my-plugins` -- stores the custom plugin "we develop"
  - `htaccess` -- is neccesary to handle the proper file serving on the app
  - `wp-config.php` -- is a pre generated wp-config file
    - relies on the env variables for connecting to the database
    - handles the https/http routing issues that appears in proxied/containerised systems
- `vendor/` -- development related
- `web/` -- the "public" folder of the app, where the runtime wordpress is "composed". It's regenerated during every build
- `composer.json` -- stores the build and orcestration logic. Like 
  - downloading the Wordpress core, downloading some plugins, deleting the default wp plugins
  - moving the htaccss and wp-config.php files to the web/ directory
  - moving the custom "own" plugin to the web/ directory

## Local development

To initiate the project:
- git clone ...
- composer install
and woala!

## Deployment to kinsta

1. Create a mysql or MariaDB database
2. Conect you git repo to kinsta and create a new app from this repo (in the same region as the db)
  1. Use buildpack with the default build command
  2. Start command: `heroku-php-apache2 /web`
3. Connect the DB to the app. Use the default env variables it suggests.
4. To keep the uploaded file persistent attach a persistent disk to the app. The path of it should be: `/app/web/wp-content/uploads`
5. Use it ;) 