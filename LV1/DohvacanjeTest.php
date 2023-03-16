<?php
namespace LV1;
use DOMXPath;
require ('DiplomskiRadovi.php');

for($i = 1; $i < 7; $i++)
{
    $url = sprintf('https://stup.ferit.hr/index.php/zavrsni-radovi/page/%s/', $i);
    $content = fetchContent($url);

    $paper = new DiplomskiRadovi();
    foreach ($content as $item)
    {
        $paper->create(
            $item['title'],
            $item['content'],
            $item['url'],
            $item['oib']
        );

        $paper->save();
    }
}

$paper = new DiplomskiRadovi();
$paper->read(1);
var_dump($paper);


function fetchContent($url) : array
{
    $html = fetchHTML($url);

// https://stackoverflow.com/questions/25486687/remove-whitespaces-and-line-breaks-from-captured-data-with-php-dom-document
//$normalized = preg_replace(['(\s+)u', '(^\s|\s$)u'], [' ', ''], $html);

    $domDocument = new \DOMDocument();
    libxml_use_internal_errors(true);
    $domDocument->loadHTML($html);
    libxml_use_internal_errors(false);

    $xpath = new DOMXPath($domDocument);
    $articles = $xpath->query('//article');


    $articlesContent = [];
    for ($i = 0; $i < count($articles); $i++)
    {
        $queries = [
            'title'     => '//article' . ($i == 0 ? '' : sprintf('[%d]', $i)) . '/div/h2',
            'content'   => '//article' . ($i == 0 ? '' : sprintf('[%d]', $i)) . '/div/div/p',
            'url'      => '//article' . ($i == 0 ? '' : sprintf('[%d]', $i)) . '/div/h2/a',
            'imgSrc'    => '//article' . ($i == 0 ? '' : sprintf('[%d]', $i)) . '/div/ul/li/div/img'
        ];

        foreach ($queries as $key => $query)
        {
            $queryResponse = $xpath->query($query)[0];
            if($queryResponse == null) continue;

            $content = $queryResponse->textContent;
            if($key == 'url')
            {
                $content = $queryResponse->getAttribute('href');
            }

            if($key == 'imgSrc')
            {
                preg_match('/[0-9]{11}/', $queryResponse->getAttribute('src'), $content);
                $content = $content[0];
                $key = 'oib';
            }

            $articlesContent[$i][$key] = $content;
        }
    }

    return $articlesContent;
}

function fetchHTML($url) : string
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    return curl_exec ($ch);
}