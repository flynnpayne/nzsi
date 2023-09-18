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
use SilverStripe\Forms\DropdownField;
use SilverStripe\Security\Permission;

class Service extends DataObject
{
    private static $db = [
        'ServiceName' => 'Varchar',
        'Description' => 'Text',
        'OfferedBy' => 'Text'
    ];

    private static $has_one = [
        'Person' => Person::class
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'ServiceName', 'Description', 'OfferedBy'
        ]));

        return $validator;
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldsToTab('Root.Main', TextField::create('ServiceName')->setMaxLength(255)->setCustomValidationMessage('Required')->setDescription('* Required'));

        $fields->addFieldsToTab('Root.Main', TextareaField::create('Description', 'Service Description')->setDescription('* Required: 255 Max Characters')->setMaxLength(255)->setCustomValidationMessage('Required'));

        $fields->addFieldsToTab('Root.Main', DropdownField::create('PersonID', 'Offered By')->setSource(Person::get()->map('ID', 'FirstName'))->setCustomValidationMessage('Required')->setDescription('* Required')->setEmptyString('(Select One)'));

        return $fields;
    }

    private static $summary_fields = [
        'ServiceName' => 'Service Name',
        'Description' => 'Service Description',
        'Person.FirstName' => 'Offered By'
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
}