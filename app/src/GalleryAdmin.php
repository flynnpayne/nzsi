<?php

use SilverStripe\Admin\ModelAdmin;

class GalleryAdmin extends ModelAdmin
{

    private static $menu_title = 'Gallery';

    private static $url_segment = 'gallery';

    private static $managed_models = [Gallery::class];

    private static $menu_icon_class = 'font-icon-block-file';

    private static $menu_priority = '8';
}