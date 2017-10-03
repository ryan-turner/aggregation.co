<?php
require("include/db.php");
require("include/header.php");
require("include/nav.php");

$feedName = $_POST["delete"];
$deleteFieldQuery = "DELETE FROM feeds where link = '$feedName'";
$rows = Query($db, $deleteFieldQuery);

echo "You have successfully deleted the feed for ", $feedName;


$archiveQuery = "INSERT INTO archive (status, link, dateOfEvent) VALUES ('Deleted', '$feedName', CURTIME())";
$rows2 = Query($db, $archiveQuery);
print "<br>";
print "<br>";
$selectQuery = "SELECT * FROM archive";
$rows3 = Query($db, $selectQuery);
print "Archive:";
print "<br>";
foreach ($rows3 as $line) {
  echo $line['status'], " the feed ",$line['link'], " on ",$line['dateOfEvent'];
  print "<br>";
}
