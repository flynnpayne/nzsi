<?php

use PageController;    

class GalleryPageController extends PageController 
{
    public function Gallery()
    {
        return Gallery::get()->sort(['ID' => 'ASC']);
    }   
}