<?php

$jsonData = json_decode(file_get_contents(__DIR__ . '/path.json'), true);

$STATIC = $jsonData["static"];
$MOST_RECENT = $jsonData["background-most-recent"];
$FEATURED = $jsonData["background-featured"];
$HERO = $jsonData["hero"];
$PROFILE = $jsonData["profile-picture"];

?>