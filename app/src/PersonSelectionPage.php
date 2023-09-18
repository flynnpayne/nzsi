<?php

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class PersonSelectionPage extends Page 
{
    private static $has_many = [
        'People' => Person::class
    ];
}