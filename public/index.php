<?php
try {

    $config = include(__DIR__ . "/../app/config/config.php");

    $loader = new Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();


    $di = new Phalcon\DI\FactoryDefault();


    $di->set('view', function () {
        $view = new Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    $di->set('router', function () {
        return include(__DIR__ . "/../app/config/routes.php");
    });

    $di->set('db', function () use ($config) {
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->dbname
        ));
    });

    $application = new Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}