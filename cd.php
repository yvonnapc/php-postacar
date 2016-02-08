<?php

    class CD
    {
        public $title;
        public $artist;
        public $cover_art;
        private $price;

        function __construct($album_name, $band_name, $image_path, $album_price = 10.99)
        {
            $this->title = $album_name;
            $this->artist = $band_name;
            $this->cover_art = $image_path;
            $this->price = $album_price;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
              $formatted_price = number_format($float_price, 2);
              $this->price = $formatted_price;
            }
        }
        function getPrice()
        {
          return $this->price;
        }
    }
    $first_cd = new CD("Master of Reality", "Black Sabbath", "images/reality.jpg");
    $second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "images/ladyland.jpg");
    $third_cd = new CD("Nevermind", "Nirvana", "images/nevermind.jpg");
    $fourth_cd = new CD("I don't get it", "Pork Lion", "images/porklion.jpg", 49.99);
    $fourth_cd->setPrice("1.394");

    $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <title>My CD Store</title>
</head>
<body>
    <div class="container">
        <?php
            foreach ($cds as $album) {
                $cd_price = $album->getPrice();
                echo "<div class='row'>
                    <div class='col-md-6'>
                        <img src='$album->cover_art'>
                    </div>
                    <div class='col-md-6'>
                        <p>$album->title</p>
                        <p>By $album->artist</p>
                        <p>$$cd_price</p>
                    </div>
                </div>
                ";
            }
        ?>
    </div>
</body>
</html>
