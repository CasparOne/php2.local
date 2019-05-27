<?php
return [
    'db'     => [
        'engine'   => 'mysql',
        'host'     => 'localhost',
        'dbname'   => 'test',
        'charset'  => 'utf8',
        'username' => 'root',
        'password' => '',
        'options'  => '',
    ],
    'routes' => [
        '/'                  => App\Controllers\Index::class,
        '/article/{id}'      => App\Controllers\Article::class,
        '/admin/'            => App\Controllers\Admin\Index::class,
        '/admin/edit/{id}'   => App\Controllers\Admin\Edit::class,
        '/admin/delete/{id}' => App\Controllers\Admin\Delete::class,
        '/admin/update/'     => App\Controllers\Admin\Update::class,
        '/admin/create/'     => App\Controllers\Admin\Create::class,
    ],
];