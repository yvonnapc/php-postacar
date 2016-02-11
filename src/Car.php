<?php
  class Car
  {
      public $year;
      public $price;
      private $model;
      private $photo;

      function __construct ($car_year, $car_price, $car_model, $car_photo)
      {
          $this->year = $car_year;
          $this->price = $car_price;
          $this->model = $car_model;
          $this->photo = $car_photo;
      }
      function setYear($new_year)
      {
          $year = $new_year;
      }
      function getYear()
      {
          return $this->year;
      }
      function setPrice($new_price)
      {
          $this->price = $new_price;
      }
      function getPrice()
      {
          return $this->price;
      }
      function setModel($new_model)
      {
        $model = $new_model;
      }
      function getModel()
      {
        return $this->model;
      }
      function save()
      {
        array_push($_SESSION['carlist'], $this);
      }
      static function getAll()
      {
        return $_SESSION['carlist'];
      }
      static function deleteAll()
      {
        $_SESSION['carlist'] = array();
      }

  }
?>
