<?php
namespace LV1;

interface IRadovi
{
    public function create($title, $content, $url, $oib);
    public function save();
    public function read($id);
}