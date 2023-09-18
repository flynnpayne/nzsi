<?php

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class InstrumentTypeSelectionPage extends Page 
{
    private static $has_many = [
        'InstrumentType' => InstrumentType::class
    ];
}