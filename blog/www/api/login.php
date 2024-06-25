<?php
echo "im working...\n";
require_once "../src/Path/StaticPath.php";
require_once "../src/Infrastructure/ConnectionProvider.php";
require_once "../src/Model/PostTable.php";
require_once "../src/Controller/UserController.php";

$conn = ConnectionProvider::connectDatabase();

$table = new PostTable($conn);

$controller = new UserController($table);

//var_dump(file_put_contents("./uploads/data.txt", "123321\n"), 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    if ($body) {
        if (!$controller->compareLogin($body["email"], $body["password"])) {
            echo "wrong email or password";
            http_response_code(401);
            return;
        }
        session_start();
        $_SESSION['email'] = $body["email"];
        $_SESSION['password'] = $body["password"];
        http_response_code(200);
    } else {
        echo "something's going wrong";
        http_response_code(500);
    }
}   