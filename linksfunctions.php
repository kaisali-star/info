

<?php

use function PHPSTORM_META\type;

function getlinks()
{
    return json_decode(file_get_contents("links.json"), true);
}


function getlinkBydate($date)
{
    $links = getlinks();
    foreach ($links as $link) {
        if ($link['date'] == $date) {
            return $link;
        }
    }
    return null;
}

function deletelink($date)
{
    $links = getlinks();
    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            unset($links[$i]);
        };
    };
    $links = json_encode($links);
    file_put_contents('links.json', $links);
}






function createlink($newData)
{

    $newData += ['date' => date("Y-m-d H:i:s")];
    $links = getlinks();
    $links[] = $newData;
    $links = json_encode($links);

    file_put_contents('links.json', $links);
    header("location: link.php");
}

function updatelink($data, $date)
{
    $links = getlinks();
    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            $links[$i] = array_merge($link, $data);
            $links = json_encode($links);
            file_put_contents('links.json', $links);
        };
    };
}


?>

