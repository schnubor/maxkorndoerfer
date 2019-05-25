![Screenshot](http://imgur.com/U8UUVQh.png)

# PHP Boilerplate

Boilerplate to quickly knock out small PHP based projects.
Supports Bootstrap V4, LESS support and Font Awesome icons.

## Usage

### Running locally

To see the above site locally clone and cd to the repo and run:

```
composer install
bower install
php -S localhost:8000
```

The site should now be available in your browser when visiting this URL:
http://localhost:8000/

### LESS

**Don't** edit CSS directly in the `assets` directory if you want to use LESS.
Instead, edit the `less/main.less` file, it will automatically be compiled
to a `compiled.css` in the `assets/css` folder. This CSS file will be used in production.

### Google Analytics

You can add your GA Tracking ID in the `config.php` and add the following template to each side you want to track: `<?php require_once(TEMPLATES_PATH . '/analyticsTracking.php'); ?>`

## License

MIT - enjoy :)
