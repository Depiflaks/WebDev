<?php

$id = $_GET['id'] ?? null;
echo $id;
if ($id === null)
{
    echo 'Parameter id is not defined';
}
#$post = $this->userTable->find((int) $id);
#require __DIR__ . '/../View/show_information.php';