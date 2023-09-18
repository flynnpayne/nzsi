<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CompositeValidator;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Permission;

class Gallery extends DataObject
{
    private static $db = [
        'ImageName' => 'Varchar',
        'Caption' => 'Varchar',
        'MadeBy' => 'Varchar',
        'GalleryAltText' => 'Varchar'
    ];

    private static $has_one = [
        'GalleryImage' => Image::class,
        'Person' => Person::class
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'ImageName', 'GalleryImage', 'GalleryAltText', 'MadeBy'
        ]));

        return $validator;
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldsToTab('Root.Main', TextField::create('ImageName', 'Image Name')->setMaxLength(255)->setDescription('* Required, Enter a name for the image: 255 Charaters Max')->setCustomValidationMessage('Required'));

        $fields->addFieldToTab('Root.Main', $upload = UploadField::create('GalleryImage','Image')->setCustomValidationMessage('Required')->setDescription('* Required')->setFolderName('gallery-images'));
        $upload
            ->getValidator()
            ->setAllowedExtensions(['jpeg', 'jpg', 'png', 'webp']);

        $fields->addFieldsToTab('Root.Main', TextField::create('GalleryAltText', 'Image Alternative Text')->setMaxLength(255)->setDescription('* Required, Use a short but descriptive summary for the image: 255 Characters Max')->setCustomValidationMessage('Required'));

        $fields->addFieldsToTab('Root.Main', DropdownField::create('PersonID', 'Made By')->setSource(Person::get()->map('ID', 'FirstName'))->setCustomValidationMessage('Required')->setDescription('* Required')->setEmptyString('(Select One)'));

        $fields->addFieldsToTab('Root.Main', TextField::create('Caption', 'Image Caption')->setMaxLength(255)->setDescription('Enter a caption for the image: 255 Charaters Max'));

        return $fields;
    }

    private static $owns = [
        'GalleryImage'
    ];

    private static $summary_fields = [
        'ImageName' => 'Name',
        'Person.FirstName' => 'MadeBy',
        'Caption' => 'Caption'
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