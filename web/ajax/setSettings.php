<?php
/**
 * Take a http post message with the parameter settings.
 * The settings parameter must be a stringified json object.
 */
include("../inc/functions.php");

$out=array();
$out["error"]=true;
if(!isset($_POST['settings'])) {
    $out["error"]=true;
    $out["errorMessage"]="No post object settings found!";
    http_response_code(400);
    echo json_encode($out);
    exit();
}
$settings=null;
$settings = @json_decode($_POST['settings']);
if($settings==null) {
    $out["error"]=true;
    $out["errorMessage"]="Cannot decode settings object with json_decode!";
    http_response_code(400);
    echo json_encode($out);
    exit();
}

if(!saveSettings($settings)) {
    $out["error"]=true;
    $out["errorMessage"]="Cannot save settings! Has settings/settings.json the correct write permissions?";
    http_response_code(400);
    echo json_encode($out);
    exit();
}

syncToAllHosts();

$out["error"]=false;
$out=array("error"=>false);
echo json_encode($out);

?>
