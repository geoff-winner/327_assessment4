<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/MyProjectClass.php';


    // --->>> UNCOMMENT IF YOUR PROJECT WILL SAVE DATA INTO COOKIES <<< --- //
    // 
    // session_start();
    //
    // if(empty($_SESSION['my_session'])) {
    //     $_SESSION['my_session'] = array();
    // }
    //
    // --------------------------->>> END <<< ----------------------------- //


    // ------>>> UNCOMMENT IF YOUR PROJECT WILL INTERFACE W/ A DB <<<------ //
    //
    // $DB = new PDO('pgsql:host=localhost; dbname=$DB_NAME');
    //
    // --------------------------->>> END <<< ----------------------------- //


    $app = new Silex\Application;

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('template.twig');
    });

    return $app;

?>
