<?php

use SilverStripe\Admin\ModelAdmin;

class PersonAdmin extends ModelAdmin
{

    private static $menu_title = 'People';

    private static $url_segment = 'people';

    private static $managed_models = [Person::class];

    private static $menu_icon_class = 'font-icon-torso';

    private static $menu_priority = '10';
}