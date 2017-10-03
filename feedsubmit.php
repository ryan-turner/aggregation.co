<?php
require("include/db.php");
require("include/header.php");
require("include/nav.php");

$feedName = $_POST["feedurl"];
$query = "SELECT count(*) FROM feeds";
$rows = Query($db, $query);

$id = 0;
$column = rand(1,3);
foreach ($rows as $feed) {
	// Load items for all feeds
  $id = $feed[0];
}

$addFieldQuery = "INSERT INTO feeds (id, displayColumn, link) VALUES ('$id', '$column', '$feedName')";
$rows2 = Query($db, $addFieldQuery);

echo "You have successfully added a feed for ", $feedName;

$archiveQuery = "INSERT INTO archive (status, link, dateOfEvent) VALUES ('Inserted', '$feedName', CURTIME())";
$rows3 = Query($db, $archiveQuery);
