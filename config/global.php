<?php
    set_include_path(
        get_include_path() .
        PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_model' .
        PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_controller' .
        PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/class'
    );

    define("SITE_URL","http://localhost/");
    define("RUTA_DEFAULT", "ciclos");
    define("DB_HOST", "localhost");
    define("DB_BASE", "ciclomenstrual");
    define("DB_USR", "root");
    define("DB_PASS", "pass");