<?php
function parse($file): false|SimpleXMLElement
{
    if(!file_exists($file))
    {
        die('File doesnt exist');
    }

    $xml = simplexml_load_file($file);

    if(!$xml)
    {
        return false;
    }

    return $xml;
}

function getProfileWithId($file, $id): false|SimpleXMLElement
{

    if($profiles = parse($file))
    {
        foreach ($profiles as $profile)
        {
            if($profile->id == $id)
            {
                return $profile;
            }
        }
    }

    return false;
}