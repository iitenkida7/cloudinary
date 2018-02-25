<!DOCTYPE html>
<html>
<body>
<?php
require_once('../vendor/autoload.php');
require_once('../config.php');

\Cloudinary::config($CloudinaryConfig);

// 画像のリスト取得
$result = json_decode(json_encode((new \Cloudinary\Api())->resource('')), true);

$randomOptions = [
    ["crop" => "fill", "gravity" => "face", "radius" => "max", "effect" => "sepia"],
    ["border" => "47px_solid_rgb:000", "effect"=>"fill_light:0"],
    ["angle" => 120],
    ["effect" => "grayscale"],
    ["effect" => "blur:1517"],
    ["effect" => "blur_faces:1242"],
];

foreach ($result['resources'] as $v) {
    $optionKey =  array_rand($randomOptions); 
    $option = array_merge(['width'=>600], $randomOptions[$optionKey]);

    //  img タグ生成
    echo cl_image_tag($v['public_id'], $option);
    print_r($option);
    echo "<br>";
}

?>
<pre>
<?php print_r($result) ?>
</pre>
<a href="./index.php">upload</a>
</body>
</html>
