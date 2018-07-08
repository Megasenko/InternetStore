<?php

class View
{

    public function generate($content_view, $data = null, $templateView = 'templateView.php')
    {
        include 'application/views/' . $templateView;
    }

}
