<?php

$first_product= new Makeup("Tarte", "Contour", "images/tarte_contour.jpg", "Encore", 7.99);
$second_product= new Makeup("Anastasia", "Contour", "images/anastasia_contour.jpg","Ana", 6.99);
$third_product= new Makeup("Naked2", "Eye Shadow", "images/naked_eyeshadow.jpg","Xpert", 7.99);
$fourth_product= new Makeup("Bloom", "Eye Shadow", "images/bloom_eyeshadow.jpg","Sephor", 8.99);
$fifth_product= new Makeup("Hourglass", "Blush", "images/hourglass_blush.jpg","Compact", 9.99);
$sixth_product= new Makeup("Toofaced", "Blush", "images/toofaced_blush.jpg","Compact", 8.99);
$makeups = array($first_product, $second_product, $third_product, $fourth_product, $fifth_product, $sixth_product);

foreach($makeups as $makeup) {
    $makeup->save();
}

?>
