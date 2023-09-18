<?php

use SilverStripe\Admin\ModelAdmin;

class InstrumentTypeAdmin extends ModelAdmin
{

    private static $menu_title = 'Instruments';

    private static $url_segment = 'instrument-type';

    private static $managed_models = [
        InstrumentType::class, 
        Instrument::class
    ];

    private static $menu_icon_class = 'font-icon-circle-star';

    private static $menu_priority = '9';
}