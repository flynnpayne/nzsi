<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class SiteConfigExtension extends DataExtension
{

    private static $db = [
        'FacebookLink' => 'Varchar',
        'InstaLink' => 'Varchar',
        'YouTubeLink' => 'Varchar',
        'Email' => 'Varchar',
        'Phone' => 'Int'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Main', array (
            TextField::create('FacebookLink','Facebook'),
            TextField::create('InstaLink','Twitter'),
            TextField::create('YouTubeLink','YouTube'),
            TextField::create('Email','Email Address'),
            TextField::create('Phone','Phone Number'),
        ));
        
    }
}