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
use SilverStripe\Forms\DropdownField;

class Instrument extends DataObject
{
    private static $db = [
        'InstrumentName' => 'Varchar',
        'BuiltBy' => 'Text',
        'TypeOfInstrument' => 'Varchar',
        'InstrumentAltText' => 'Varchar',
        'Caption' => 'Varchar'
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'InstrumentName', 'BuiltBy', 'InstrumentType', 'InstrumentImage', 'InstrumentAltText', 'Caption'
        ]));

        return $validator;
    }

    private static $has_one = [
        'InstrumentType' => InstrumentType::class,
        'InstrumentImage' => Image::class,
        'Person' => Person::class
    ];

    private static $default_sort = 'ID';

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', TextField::create('InstrumentName')->setMaxLength(255)->setCustomValidationMessage('Required')->setDescription('* Required'));

        $fields->addFieldToTab('Root.Main', $upload = UploadField::create('InstrumentImage','Image')->setCustomValidationMessage('Required')->setDescription('* Required')->setFolderName('instrument-images'));
        $upload
            ->getValidator()
            ->setAllowedExtensions(['jpeg', 'jpg', 'png', 'webp']);

        $fields->addFieldsToTab('Root.Main', TextField::create('Caption', 'Image Caption')->setMaxLength(255)->setDescription('Enter a caption for the image that will be displayed underneath: 255 Charaters Max'));

        $fields->addFieldsToTab('Root.Main', TextField::create('InstrumentAltText', 'Image Alternative Text')->setDescription('* Required, Use a short but descriptive summary for the image, this text is used by screen reading software for disabled users: 255 Characters Max')->setCustomValidationMessage('Required'));

        $fields->addFieldsToTab('Root.Main', DropdownField::create('InstrumentTypeID', 'Type Of Instrument')->setSource(InstrumentType::get()->map('ID', 'InstrumentTypeName'))->setCustomValidationMessage('Required')->setDescription('* Required')->setEmptyString('(Select One)'));

        $fields->addFieldsToTab('Root.Main', DropdownField::create('PersonID', 'Built By')->setSource(Person::get()->map('ID', 'FirstName'))->setCustomValidationMessage('Required')->setDescription('* Required')->setEmptyString('(Select One)'));

        return $fields;
    }

    private static $summary_fields = [
        'InstrumentName' => 'Name',
        'InstrumentType.InstrumentTypeName' => 'Type',
        'Person.FirstName' => 'Maker'
    ];

    private static $owns = [
        'InstrumentImage'
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