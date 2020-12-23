Matrix
============

[![Latest Stable Version](https://poser.pugx.org/BubbaOps/matrix/v/stable)](https://packagist.org/packages/BubbaOps/matrix)
[![License](https://poser.pugx.org/BubbaOps/matrix/license)](https://packagist.org/packages/BubbaOps/matrix)
[![composer.lock](https://poser.pugx.org/BubbaOps/matrix/composerlock)](https://packagist.org/packages/BubbaOps/matrix)
[![Total Downloads](https://poser.pugx.org/BubbaOps/matrix/downloads)](https://packagist.org/packages/BubbaOps/matrix)

Requirements
------------

* PHP >= 7.0
* composer
* Laravel Project

Features
--------

* Zero Configuration install for your Visual Studio Code .devcontainer development desires
* A beautifully crafted workspace for your .devcontainer
* An nginx container
* A PHP FPM container
* Other Optional Containers
    - mariadb
    - memcached
    - mssql
    - mysql
    - postgres
    - redis

Installation
============
```
    composer require --dev BubbaOps/matrix
    php artisan vendor:publish --tag=devcontainer
```
This will create the `.devcontainer` for you and populate it with:
* `mariadb/Dockerfile`
* `memcached/Dockerfile`
* `mssql/Dockerfile`
* `mysql/Dockerfile`
* `nginx/Dockerfile`
* `php-fpm/Dockerfile`
* `postgres/Dockerfile`
* `redis/Dockerfile`
* `workspace/Dockerfile`
* `devcontainer.json`
* `docker-compose.yml`

If you run `php artisan vendor:publish --tag=devcontainer` again, it will not modify anything, same with any other configuration. You must use the artisan `--force` option to overwrite existing files in your `.devcontainer`.

Configuration
=============
If you want to modify the configuration, have a look at the [Remote development in Containers](https://code.visualstudio.com/docs/remote/containers-tutorial) which will necessarily direct you to the [Docker Documentation](https://docs.docker.com/) for specifics.


Changelog
=========

To keep track, please refer to [CHANGELOG.md](https://github.com/GinoPane/composer-package-template/blob/master/CHANGELOG.md).

Contributing
============

1. Fork it.
2. Create your feature branch (git checkout -b my-new-feature).
3. Make your changes.
4. Run the tests, adding new ones for your own code if necessary (phpunit).
5. Commit your changes (git commit -am 'Added some feature').
6. Push to the branch (git push origin my-new-feature).
7. Create new pull request.

Also please refer to [CONTRIBUTION.md](https://github.com/GinoPane/composer-package-template/blob/master/CONTRIBUTION.md).

License
=======

Please refer to [LICENSE](https://github.com/GinoPane/composer-package-template/blob/master/LICENSE).
