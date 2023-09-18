<?php

use SilverStripe\Admin\ModelAdmin;

class TestimonialAdmin extends ModelAdmin
{

    private static $menu_title = 'Testimonial';

    private static $url_segment = 'testimonial';

    private static $managed_models = [Testimonial::class];

    private static $menu_icon_class = 'font-icon-book-open';

    private static $menu_priority = '7';
}