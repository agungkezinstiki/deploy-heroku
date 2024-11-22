<?php 

function compress($source, $destination, $quality) {
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);
    $src = imagecreatefromjpeg($destination);
    $dst = imagecreatetruecolor(250, 250);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, 250, 250, $info[0], $info[1]);
    
    imagejpeg($dst, $destination.'.jpeg', $quality);

    return $destination;
}

$source_img = 'sample.jpeg';
$destination_img = 'compressed.jpeg';

$d = compress($source_img, $destination_img, 90);
?>