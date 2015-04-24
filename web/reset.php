<?php
# auf werkseinstellungen zurücksetzen
include("inc/functions.php");

$jsonSettings=loadSettings();
$settings=json_decode($jsonSettings);

$settingsResetText=file_get_contents("reset/settings.json");
$settingsResetJSON=json_decode($settingsResetText);
# IP Adressen nicht resetten!
$settingsResetJSON->ips=$settings->ips;
saveSettings($settingsResetJSON);

header("Location: index.php");
?>