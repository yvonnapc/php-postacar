<?php
  class Car
  {
      private $make_model;
      private $price;
      private $miles;
      private $accident_history;
      private $image;

      function __construct ($car_type, $car_price, $car_miles, $accidents = 0, $image_path)
      {
          $this->make_model = $car_type;
          $this->price = $car_price;
          $this->miles = $car_miles;
          $this->accident_history = $accidents;
          $this->image = $image_path;
      }
      function setPrice($new_price)
      {
          $price = $new_price;
      }
      function getPrice()
      {
          return $this->price;
      }

      function setModel($new_make_model)
      {
          $this->make_model = $new_make_model;
      }
      function getModel()
      {
          return $this->make_model;
      }

      function setMiles($new_miles)
      {
          $this->miles = $new_miles;
      }
      function getMiles()
      {
          return $this->miles;
      }

      function setHistory ($new_history)
      {
          $this->accident_history = $new_history;
      }
      function getHistory()
      {
          return $this->accident_history;
      }

      function setImage ($new_image)
      {
          $this->image = $new_image;
      }
      function getImage()
      {
          return $this->image;
      }
      function worthBuying($max_price, $max_miles)
      {   if (($this->price <= $max_price +100) && ($this->miles <= $max_miles))
        {
          return $this;
        }
      }

  }

  $porsche = new Car("2014 Porsche 911", 114991, 7864, 2, "img/porsche.jpg");
  $ford = new Car("2011 Ford F450", 55995, 14211,NULL, "img/f450.jpg");
  $lexus = new Car("2013 Lexus RX 350", 44700, 20000,9, "img/lexus.jpg");
  $mercedes = new Car("Mercedes Benz CL550", 39900, 37979,NULL, "img/mercedes.jpg");

  $cars = array($porsche, $ford, $lexus, $mercedes);
  $cars_matching_search = array();
      foreach ($cars as $car){
          if ($car->worthBuying($_GET['price'], $_GET['miles'])){

      array_push($cars_matching_search, $car);
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <title>Contreras & Netzel Car Dealership</title>
  </head>
  <body>
      <h1>Contreras & Netzel Cars</h1>
      <ul>
          <?php
          if (empty($cars_matching_search)){
              echo "<p>No matches</p>";
          }
          else {
              foreach ($cars_matching_search as $car)
              {
                $show_model = $car->getModel();
                 $show_price = $car->getPrice();
                 $show_miles = $car->getMiles();
                 $show_history = $car->getHistory();
                 $show_image = $car->getImage();

                  echo "<li> $show_model </li>";
                  echo "<li><img src='$show_image'></li>";
                  echo "<ul>";
                      echo "<li> $$show_price </li>";
                      echo "<li> Miles: $show_miles </li>";
                      echo "<li> Number of Accidents: $show_history </li>";
                  echo "</ul>";
              }
          }
          ?>
      </ul>
</body>
</html>
