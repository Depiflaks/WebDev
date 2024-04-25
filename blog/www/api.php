<?php

require_once "./src/Path/StaticPath.php";
require_once "./src/Infrastructure/ConnectionProvider.php";
require_once "./src/Model/PostTable.php";

$conn = ConnectionProvider::connectDatabase();
$table = new PostTable;

# дописать, чтобы работало

$picture_name = "image" . $table->getMaxId($conn)["MAX(`post_id`)"] + 1;

function saveImage(string $imageBase64) {
    require_once "./src/Path/StaticPath.php";
    global $picture_name;
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    $picture_name = $picture_name . ".{$imgExtention}";
    echo $STATIC . $MOST_RECENT . $picture_name;
    $file = fopen($STATIC . $MOST_RECENT . $picture_name, 'w');
    try {
        fwrite($file, $imageDecoded);
    } finally {
        fclose($file);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    if ($body && $body['background_url']) {
        saveImage($body['background_url']);
    } else {
        echo 'Ошибка';
    }
    $body['background_url'] = $picture_name;
    $table->saveData($conn, $body);
}

?>