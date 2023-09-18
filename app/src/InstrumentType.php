<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CompositeValidator;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Permission;

class InstrumentType extends DataObject
{
    private static $db = [
        'InstrumentTypeName' => 'Varchar',
        'BuiltBy' => 'Text',
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'InstrumentTypeName', 'BuiltBy'
        ]));

        return $validator;
    }

    private static $has_many = [
        'Instruments' => Instrument::class
    ];

    private static $has_one = [
        'InstrumentTypeSelectionPage' => InstrumentTypeSelectionPage::class,
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', TextField::create('InstrumentTypeName')->setMaxLength(255)->setCustomValidationMessage('Required')->setDescription('* Required: Make sure it is plural, ie. Guitars'));

        return $fields;
    }

    private static $summary_fields = [
        'InstrumentTypeName' => 'Instrument Type'
    ];

    public function canView($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null, $context = []) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function Link()
    {
        return ('instruments/show/'.$this->ID);
    }

}