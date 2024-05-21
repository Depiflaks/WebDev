<?php

require_once "./src/Path/StaticPath.php";
require_once "./src/Infrastructure/ConnectionProvider.php";
require_once "./src/Model/PostTable.php";

$conn = ConnectionProvider::connectDatabase();
$table = new PostTable($conn);

//var_dump(file_put_contents("./uploads/data.txt", "123321\n"), 1);

function saveImage(string $imageBase64, string $path, string $name): string
{
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    $file_dir = $path . $name . ".{$imgExtention}";
    //echo $file_dir, "\n";
    $file = fopen($file_dir, 'wb');
    if ($file) {
        fwrite($file, $imageDecoded);
    } else {
        echo "\nerror while saving file";
    }
    fclose($file);
    return $name . ".{$imgExtention}";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    if ($body) {
        $home_path = STATIC_PATH . ($body["featured"] ? FEATURED : MOST_RECENT);
        $page_path = STATIC_PATH . HERO;
        $avatar_path = STATIC_PATH . PROFILE;
        $id = $table->saveData($body);
        
        // saving background images
        $hero = saveImage($body["background_url"], $home_path, "hero{$id}");
        saveImage($body["hero_url"], $page_path, "hero{$id}");
        $avatar = saveImage($body["author_url"], $avatar_path, "avatar{$id}");
        echo $hero, $avatar;
        $table->addImagesUrl($hero, $avatar, $id);
        http_response_code(200);
    } else {
        echo "something's going wrong";
        http_response_code(550);
    }
}
?>