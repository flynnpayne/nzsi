<?php

use PageController;    

class HomePageController extends PageController 
{
    public function Person()
    {
        return Person::get()->sort(['FirstName' => 'ASC', 'LastName' => 'ASC']);
    }   
}