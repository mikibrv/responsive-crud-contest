<?php

return array(

    'fetch' => PDO::FETCH_CLASS,

    'default' => 'mysql_local',

    'migrations' => 'migrations',

    'connections' => array(

        'mysql_local' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'contest',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        )
    ),

);
