<?php

namespace q\theme\geo\core;

use q\theme\geo\core\core as core;
use q\theme\geo\core\helper as helper;

// Q ##
// use q\admin\controller as q_admin;
// use q\theme\geo\ui as q_ui;

// load it up ##
\q\theme\geo\core\config::run();

class config extends \q_theme_geo {

    public static function run()
    {

        if ( \is_admin() ) {

            // post type filters ##
            // \add_action( 'restrict_manage_posts', array( get_class(), 'restrict_manage_posts' ));

        } else {

            // remove "url" field from comments ##
            // \add_filter( 'comment_form_default_fields', array( get_class(), 'comment_form_default_fields' ) );

        }

    }




    public static function example()
    {


    }



}