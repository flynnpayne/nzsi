<?php

use PageController;
use SilverStripe\Control\HTTPRequest;

class InstrumentTypeSelectionPageController extends PageController 
{
    private static $allowed_actions = [
        'show'
    ];

    public function InstrumentType()
    {
        return InstrumentType::get()->sort(['InstrumentTypeName' => 'ASC']);
    }

    public function show(HTTPRequest $request)
    {
        $instrumenttype = InstrumentType::get()->byID($request->param('ID'));

        if(!$instrumenttype) {
            return $this->httpError(404,'That instrument type could not be found');
        }

        return [
            'InstrumentType' => $instrumenttype
        ];
    }

}
