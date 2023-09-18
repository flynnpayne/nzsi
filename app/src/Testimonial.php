<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CompositeValidator;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Permission;

class Testimonial extends DataObject
{
    private static $db = [
        'Description' => 'Text',
        'From' => 'Varchar'
    ];

    private static $has_one = [
        'Person' => Person::class
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'MadeFor', 'Description'
        ]));

        return $validator;
    }

    private static $default_sort = 'ID';

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', DropdownField::create('PersonID', 'Made For')->setSource(Person::get()->map('ID', 'FirstName'))->setCustomValidationMessage('Required')->setDescription('* Required')->setEmptyString('(Select One)'));

        $fields->addFieldsToTab('Root.Main', TextareaField::create('Description')->setCustomValidationMessage('Required')->setDescription('* Required'));

        $fields->addFieldsToTab('Root.Main', TextField::create('From')->setMaxLength(255));

        return $fields;
    }

    private static $summary_fields = [
        'From' => 'From',
        'Person.FirstName' => 'Made For'
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