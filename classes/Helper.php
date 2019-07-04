<?php


class Helper
{
    public function getEpisodes($episodes)
    {

        $episodeNumbers = '';

        foreach ($episodes as $episode) {
            $episodeNumbers .= $this->contentHandler($episode) . ', ';
        }
        //remove last comma
        return rtrim($episodeNumbers, ", ");


    }

    public function contentHandler($content)
    {
        if ($content == '') return false;
        return end(explode('/', $content));
    }

}

$helper = new Helper();