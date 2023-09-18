<?php

use PageController;    

class ServicePageController extends PageController 
{
    public function Service()
    {
        return Service::get()->sort('ID');
    }   
}