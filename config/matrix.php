<?php
return [
    'install_path' => '.devcontainer',
    'devcontainer' => [
        "name" => env('DEVCONTAINER_NAME', env('APP_NAME', 'Matrix')),
        "dockerComposeFile" => ".devcontainer/docker-compose.yml",
        "remoteUser" => "developer",
        "runServices" => [
            "nginx",
            "php-fpm",
            "redis",
            "mysql"
        ],
        "service" => "workspace",
        "workspaceFolder" => env('DEVCONTAINER_WORKSPACE_FOLDER', "/var/www/"),
        "shutdownAction" => "stopCompose",
        "postCreateCommand" => "uname -a"
    ],
    'docker-compose' => [
        'version' => '3',
        'networks' => [
            'public' => [
                'driver' => env('MATRIX_NETWORKS_PUBLIC_DRIVER', 'bridge'),
            ],
            'private' => [
                'driver' => env('MATRIX_NETWORKS_PRIVATE_DRIVER', 'bridge')
            ],
        ],
        'volumes' => [
            'mysql' => [
                'driver' => env('MATRIX_VOLUMES_MYSQL_DRIVER', 'local'),
            ],
            'mssql' => [
                'driver' => env('MATRIX_VOLUMES_MSSQL_DRIVER', 'local'),
            ],
            'postgres' => [
                'driver' => env('MATRIX_VOLUMES_POSTGRES_DRIVER', 'local'),
            ],
            'mariadb' => [
                'driver' => env('MATRIX_VOLUMES_MARIADB_DRIVER', 'local'),
            ],
            'memcached' => [
                'driver' => env('MATRIX_VOLUMES_MEMCACHED_DRIVER', 'local'),
            ],
            'redis' => [
                'driver' => env('MATRIX_VOLUMES_REDIS_DRIVER', 'local'),
            ],
        ],
        'services' => [
            'mariadb' => [
                'build' => [
                    'context' => "mariadb",
                    'args' => [],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],

            ],
            'memcached' => [
                'build' => [
                    'context' => "memcached",
                    'args' => [],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'mssql' => [
                'build' => [
                    'context' => "mssql",
                    'args' => [],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'mysql' => [
                'build' => [
                    'context' => "mysql",
                    'args' => [
                        'TZ' => 'UTC'
                    ],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'nginx' => [
                'build' => [
                    'context' => "nginx",
                    'args' => [
                        'PHP_UPSTREAM_CONTAINER' => 'php-fpm',
                        'PHP_UPSTREAM_PORT' => 9000
                    ],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'php-fpm' => [
                'build' => [
                    'context' => "php-fpm",
                    'args' => [
                        'BASEIMAGE_PHP_VERSION' => env('MATRIX_PHP_VERSION', '7.4'),
                        'BASE_IMAGE_TAG_PREFIX' => env('BASE_IMAGE_TAG_PREFIX', 'latest')
                    ],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'postgres' => [
                'build' => [
                    'context' => "postgres",
                    'args' => [],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'redis' => [
                'build' => [
                    'context' => "redis",
                    'args' => [],
                    'extra_hosts' => [],
                ],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
            'workspace' => [
                'build' => [
                    'context' => "workspace",
                    'args' => [
                        'DEVCONTAINER_PHP_VERSION' => env('DEVCONTAINER_PHP_VERSION', 'latest'),
                        'DEVCONTAINER_WORKSPACE_FOLDER' => env('DEVCONTAINER_WORKSPACE_FOLDER', "/usr/local/src/"),
                    ],
                    'extra_hosts' => [],
                ],
                'volumes' => [],
                'extra_hosts' => [],
                'ports' => [],
                'tty' => true,
                'environment' => [],
                'networks' => [
                    'public',
                    'private',
                ],
                'links' => [],
            ],
        ]

    ],
];
