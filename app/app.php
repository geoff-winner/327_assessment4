<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $app = new Silex\Application;
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=shoes');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

     $app->get("/brands", function() use ($app) {
        return $app['twig']->render('brands.twig', array('brands' => Brand::getAll()));
    });

     $app->get("/stores", function() use ($app) {
        return $app['twig']->render('stores.twig', array('stores' => Store::getAll()));
    });

    $app->post("/brands", function() use ($app) {
        $brand_name = $_POST['brand_name'];
        $brand = new Brand($brand_name);
        $brand->save();
        return $app['twig']->render('brands.twig', array('brands' => Brand::getAll()));
    });
    //calls on our save function and posts saved tasks, renders tasks
    $app->get("/brands/{id}", function($id) use ($app) {
        $brand = Brand::find($id);
        return $app['twig']->render('brand.twig', array('brand' => $brand, 'stores' => $brand->getStores(), 'all_stores' => Store::getAll()));
    });

    //calls on our save function and posts saved cats, renders cats
    $app->post("/stores", function() use ($app) {
       $store = new Store($_POST['name']);
       $store->save();
       return $app['twig']->render('stores.twig', array('stores' => Store::getAll()));
    });
    //calls on our save function and posts saved cats, renders cats
    $app->get("/stores/{id}", function($id) use ($app) {
       $store = Store::find($id);
       return $app['twig']->render('store.twig', array('store' => $store, 'brands' => $store->getBrands(), 'all_brands' => Brand::getAll()));
    });

    $app->post('/add_brands', function() use ($app) {
      $store = Store::find($_POST['store_id']);
      $brand = Brand::find($_POST['brand_id']);
      $store->addBrand($brand);
      return $app['twig']->render('store.twig', array('store' => $store, 'stores' => Store::getAll(), 'brands' => $store->getBrands(), 'all_brands' => Brand::getAll()));
    });

    $app->post('/add_stores', function() use ($app) {
      $store = Store::find($_POST['store_id']);
      $brand = Brand::find($_POST['brand_id']);
      $brand->addStore($store);
      return $app['twig']->render('brand.twig', array('brand' => $brand, 'brands' => Brand::getAll(), 'stores' => $brand->getStores(), 'all_stores' => Store::getAll()));
    });

    return $app;

?>
