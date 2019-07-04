<?php

class Api
{
    const API_URI = 'https://rickandmortyapi.com/api/';
    public $data;


    public function dataRequest($uri = "", $body = null)
    {

        try {

            $handle = curl_init();

            $url = self::API_URI . $uri . $_SERVER['REQUEST_URI'];

            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

            $output = curl_exec($handle);
            curl_close($handle);

            $this->setData(json_decode($output));

        } catch (Exception $e) {
            echo 'error' . $e->getMessage();
        }
    }

    public function getCount()
    {

        $data = $this->getInfo();
        return $data->count;

    }

    public function getInfo()
    {
        $data = $this->getData();
        return $data->info;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getPages()
    {

        $data = $this->getInfo();
        return $data->pages;

    }

    public function getNext()
    {

        $data = $this->getInfo();
        return $data->next;

    }

    public function getPrev()
    {

        $data = $this->getInfo();
        return $data->prev;

    }

    public function getCharacters()
    {
        $data = $this->getData();
        return $data->results;

    }

}