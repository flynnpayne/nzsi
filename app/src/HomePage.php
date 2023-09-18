<?php

use Page;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CompositeValidator;
use SilverStripe\Forms\RequiredFields;

class HomePage extends Page 
{
    private static $db = [
        
    ];

    private static $has_one = [
        'MobileMainImage' => Image::class,
        'DesktopMainImage' => Image::class,
    ];

    public function getCMSCompositeValidator(): CompositeValidator
    {
        $validator = parent::getCMSCompositeValidator();
        $validator->addValidator(RequiredFields::create([
            'MobileMainImage', 'DesktopMainImage'
        ]));

        return $validator;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', $mobile = UploadField::create('MobileMainImage')->setCustomValidationMessage('Required'),'Content'); 
        $fields->addFieldToTab('Root.Main', $desktop = UploadField::create('DesktopMainImage')->setCustomValidationMessage('Required'),'Content'); 

        $mobile
            ->setFolderName('home-images')
            ->getValidator()->setAllowedExtensions(['jpeg', 'jpg', 'png']);
        $desktop
            ->setFolderName('home-images')
            ->getValidator()->setAllowedExtensions(['jpeg', 'jpg', 'png']);

        return $fields;
    }

    private static $owns = [
        'MobileMainImage',
        'DesktopMainImage'
    ];
}