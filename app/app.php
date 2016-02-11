<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();
    if (empty($_SESSION['carlist'])) {
        $_SESSION['carlist'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider, array(
        'twig.path' => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app){
      return $app['twig']->render('car_form.html.twig', array('car' => Car::getAll()));
    });

    $app->post('/car', function()use ($app){
      $new_car = new Car($_POST['year'], $_POST['price'], $_POST['model'], $_POST['photo']);
      $new_car->save();
      return $app['twig']->render('max_price.html.twig', array('mycar' => $new_car));
    });

    $app->post('/delete_car', function() use ($app) {
      Car::deleteAll();
      return $app['twig']->render('delete.html.twig');
    });

    return $app;
 ?>
