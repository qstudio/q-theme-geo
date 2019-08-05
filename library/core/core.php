<?php

namespace q\theme\geo\core;

use q\theme\geo\core\core as core;
use q\theme\geo\core\helper as helper;
use q\theme\geo\theme\template as template;

// load it up ##
#\q\theme\geo\core\core::run();

class core extends \q_theme_geo {

    public static function run()
    {


    }


    public static function is_site( $site = null )
    {

        if ( is_null( $site ) ) {

            return false;

        }

        // get the current blog ID ##
        $get_current_blog_id = \get_current_blog_id();

        switch( $site ) {

            case "public" :

                return '1' == $get_current_blog_id ? true : false ; 

            break ;

            case "club" :

                return '2' == $get_current_blog_id ? true : false ; 

            break ;

        }

        return false;

    }


}