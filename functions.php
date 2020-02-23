<?php function validation($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function recuperation($data2)
{
    $data2 = stripslashes($data2);
    return $data2;
}
