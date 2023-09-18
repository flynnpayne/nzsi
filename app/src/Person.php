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

class Person extends DataObject
{
    private static $db = [
        'FirstName' => 'Varchar',
        'LastName' => 'Varchar',
        'Biography' => 'Text',
        'BioSum' => 'Varchar',
        'ProfileAltText' => 'Varchar',
        'SecondaryAltText' => 'Varchar'
    ];

    private static $has_one = [
        'ProfileImage' => Image::class,
        'PersonPage' => PersonSelectionPage::class,
        'SecondaryImage' => Image::class
    ];

    private static $has_many = [
        'Testimonials' => Testimonial::class
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'FirstName', 'LastName', 'ProfileImage', 'ProfileAltText', 'Biography', 'BioSum', 'SecondaryImage', 'SecondaryAltImage'
        ]));

        return $validator;
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', TextField::create('FirstName')->setMaxLength(255)->setCustomValidationMessage('Required')->setDescription('* Required'));

        $fields->addFieldsToTab('Root.Main', TextField::create('LastName')->setMaxLength(255)->setCustomValidationMessage('Required')->setDescription('* Required'));

        $fields->addFieldToTab('Root.Main', $upload = UploadField::create('ProfileImage')->setDescription('* Required, Try to make this image as square as possible for better looking results')->setCustomValidationMessage('Required')->setFolderName('profile-pictures'));
        $upload
            ->getValidator()
            ->setAllowedExtensions(['jpeg', 'jpg', 'png']);

        $fields->addFieldsToTab('Root.Main', TextField::create('ProfileAltText', 'Profile Image Alternative Text')->setDescription('* Required, Use a short but descriptive summary for the image: 255 Characters Max')->setMaxLength(255)->setCustomValidationMessage('Required'));

        $fields->addFieldToTab('Root.Main', $upload = UploadField::create('SecondaryImage')->setDescription('* Required')->setCustomValidationMessage('Required')->setFolderName('profile-pictures'));
        $upload
            ->setAllowedExtensions(['jpeg', 'jpg', 'png']);

        $fields->addFieldsToTab('Root.Main', TextField::create('SecondaryAltText', 'Secondary Image Alternative Text')->setDescription('* Required')->setCustomValidationMessage('Required')->setDescription('Use a short but descriptive summary for the image: 255 Characters Max')->setMaxLength(255));
        
        $fields->addFieldsToTab('Root.Main', TextareaField::create('Biography')->setDescription('* Required')->setCustomValidationMessage('Required'));

        $fields->addFieldsToTab('Root.Main', TextField::create('BioSum', 'Biography Summary')->setDescription('* Required, A short blurb for the Home page: 125 Charaters Max')->setMaxLength(125)->setCustomValidationMessage('Required'));

        return $fields;
    }

    public function getFullName()
    {
        $fullname = $this->FirstName.' '.$this->LastName;
        return $fullname;
    }

    

    private static $owns = [
        'ProfileImage',
        'SecondaryImage'
    ];

    private static $summary_fields = [
        'FirstName' => 'FirstName',
        'LastName' => 'LastName'
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
        return ('about-us/show/'.$this->ID);
    }
}