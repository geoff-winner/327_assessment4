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

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();


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

    //creates path to delete_cat page, calls on delete function, clears save
    $app->post("/delete_stores", function() use ($app){
        Store::deleteAll();
        return $app['twig']->render('delete_stores.twig', array('stores' => Store::getAll()));
    });
    //creats path to delete_task, calls on delete function, clears save
    $app->post("/delete_brands", function() use ($app) {
        Brand::deleteAll();
        return $app['twig']->render('delete_brands.twig', array('brands' => Brand::getAll()));
    });

    $app->get('/store/{id}/edit', function($id) use ($app) {
      $store = Store::find($id);
      return $app['twig']->render('store_edit.twig', array('store' => $store));
    });

    $app->patch('/store/{id}', function($id) use ($app) {
      $name = $_POST['name'];
      $store = Store::find($id);
      $store->update($name);
      return $app['twig']->render('store_edit.twig', array('store' => $store, 'brand_name' => $store->getBrands()));
    });

    $app->delete('/store/{id}', function($id) use ($app) {
      $store = Store::find($id);
      $store->delete();
      return $app['twig']->render('stores.twig', array('stores' => Store::getAll()));
    });

    $app->get('/brand/{id}/edit', function($id) use ($app) {
      $brand = Brand::find($id);
      return $app['twig']->render('brand_edit.twig', array('brand' => $brand));
    });

    $app->patch('/brand/{id}', function($id) use ($app) {
      $brand_name = $_POST['brand_name'];
      $brand = Brand::find($id);
      $brand->update($brand_name);
      return $app['twig']->render('brand_edit.twig', array('brand' => $brand, 'brand_name' => $brand->getStores()));
    });

    $app->delete('/brand/{id}', function($id) use ($app) {
      $brand = Brand::find($id);
      $brand->delete();
      return $app['twig']->render('brands.twig', array('brands' => Brand::getAll()));
    });

    return $app;

?>
