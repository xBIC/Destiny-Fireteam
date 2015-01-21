<?php
try {

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/',
    ))->register();

    //Register prefixes
    $loader->registerPrefixes(
        array(
            "Library_"  => "../library/",
        )
    );

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    //Setup the database service
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "donald-db.cc9xqfenws6x.us-east-1.rds.amazonaws.com",
            "username" => "donalddb",
            "password" => "qCtgIDoeqSUkY2w",
            "dbname" => "Destiny"
        ));
    });

    //Setup the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
	return $view;
    });

    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
