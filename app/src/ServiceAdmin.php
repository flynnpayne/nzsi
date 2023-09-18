<?php

use SilverStripe\Admin\ModelAdmin;

class ServiceAdmin extends ModelAdmin
{

    private static $menu_title = 'Service';

    private static $url_segment = 'service';

    private static $managed_models = [Service::class];

    private static $menu_icon_class = 'font-icon-chat';

    private static $menu_priority = '6';
}