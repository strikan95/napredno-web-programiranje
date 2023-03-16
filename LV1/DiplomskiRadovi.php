<?php
namespace LV1;

use Exception;
use PDO;

require ('IRadovi.php');

class DiplomskiRadovi implements IRadovi
{
    private string $title;
    private string $content;
    private string $url;
    private string $oib;

    public function create($title, $content, $url, $oib)
    {
        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
        $this->oib = $oib;
    }

    public function save()
    {
        try {
            $db = new PDO("sqlite:".__DIR__."/lv1.db");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }   catch (Exception $e) {
            echo "Unable to connect";
            echo $e->getMessage();
            exit;
        }

        $sql = "INSERT INTO papers (title, content, url, oib) VALUES (?,?,?,?)";
        $stmt= $db->prepare($sql);
        $stmt->execute([$this->title, $this->content, $this->url, $this->oib]);
    }

    public function read($id)
    {
        try {
            $db = new PDO("sqlite:".__DIR__."/lv1.db");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }   catch (Exception $e) {
            echo "Unable to connect";
            echo $e->getMessage();
            exit;
        }

        $sql = "SELECT * FROM papers WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $paper = $stmt->fetch();

        $this->title = $paper['title'];
        $this->content = $paper['content'];
        $this->url = $paper['url'];
        $this->oib = $paper['oib'];
    }
}