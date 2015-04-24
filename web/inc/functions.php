<?php
define("JSON_SETTINGS",         __DIR__ . "/../settings/settings.json");
define("SYNC_COMMAND",          __DIR__ . "/../scripts/syncrasperries");
define("LIST_COMMAND",          __DIR__ . "/../scripts/listrasperries");
define("RESET_COMMAND",         __DIR__ . "/../scripts/reset");

/**
 * @return string settings in string. dieser Wert muss noch in ein array umgewandelt werden
 */
function loadSettings() {
    return file_get_contents(JSON_SETTINGS);
}

/***
 * @param $settings ein PHP StdObject mit den Settings. Dieses Objekt wird in JSON umgewandelt und abgespeichert
 */
function saveSettings($settings) {
    // md5 summe der settings berechnent. Berechnent natürlich ohne die MD5 Summe
    $settings->md5sum="";
    $settings->md5sum=md5(json_encode($settings));

    $settingsTxt=json_encode($settings, JSON_PRETTY_PRINT);
    return file_put_contents(JSON_SETTINGS, $settingsTxt);
}

/**
 * Synchronisiert die generierten HTML Files zu allen Raspberries
 * @return string
 */
function syncToAllHosts() {
    $execute = SYNC_COMMAND;
    exec($execute, $output, $retval);
    return implode("\n", $output);
}

/**
 * sucht nach allen Raspberries im gleichen Subnetz
 * @return array
 */
function listAllHosts() {
    $execute = LIST_COMMAND;
    exec($execute, $output, $retVal);
    return $output;
}


?>