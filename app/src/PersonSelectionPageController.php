<?php

use PageController;
use SilverStripe\Control\HTTPRequest;

class PersonSelectionPageController extends PageController 
{
    private static $allowed_actions = [
        'show'
    ];

    public function Person()
    {
        return Person::get()->sort(['FirstName' => 'ASC', 'LastName' => 'ASC']);
    }

    public function show(HTTPRequest $request)
    {
        $person = Person::get()->byID($request->param('ID'));

        if(!$person) {
            return $this->httpError(404,'That person could not be found');
        }

        return [
            'Person' => $person
        ];
    }

}
