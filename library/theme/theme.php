<?php

namespace q\theme\geo\theme;

use q\theme\geo\core\core as core;
use q\theme\geo\core\helper as helper;
use q\theme\geo\core\config as config;

// Q ##
use q\core\core as q_core;
use q\core\options as q_options;

// load it up ##
\q\theme\geo\theme\theme::run();

class theme extends \q_theme_geo {

    public static $plugin_version;
    public static $options;

    public static function run()
    {

        // load templates ##
        if ( ! self::load_properties() ) {

            helper::log( 'Error Loading Q Options - plugin instantiation stopped' );

            return false;

        }

        if ( ! \is_admin() ) {

            // theme css / js ##
            // \add_action( 'wp_enqueue_scripts', array ( get_class(), 'wp_enqueue_scripts_theme' ), 10 );

        }

        // add extra options in libraries select API ##
        // \add_filter( 'acf/load_field/name=q_option_library', [ get_class(), 'filter_acf_library' ], 10, 1 );

        // load templates ##
        self::load_libraries();

    }




    /**
     * Example of how to add a select option for a new library
     * 
     * @since 2.3.0
     */
    public static function filter_acf_library( $field )
    {

        // helper::log( $field['choices'] );
        // helper::log( $field['default_value'] );

        // pop on a new choice ##
        $view = ' ( <a href="'.helper::get( "theme/css/bootstrap.min.css", "return" ).'" target="_blank">css</a>';
        $view .= ' <a href="'.helper::get( "theme/javascript/bootstrap.min.js", "return" ).'" target="_blank"> js</a> )';
        $field['choices']['bootstrap'] = 'Bootstrap 3.3.7 JS & CSS'.$view;

        // make it selected ##
        $field['default_value'][] = 'bootstrap';

        return $field;

    }


    /**
    * Load Properties
    *
    * @since        2.0.0
    */
    private static function load_properties()
    {

        // assign values ##
        self::$plugin_version = self::version ;

        if ( 
            ! class_exists( '\q\core\options' ) 
            || ! q_options::get()
            // || ! is_object( options::get() )   
        ) {

            helper::log( 'Q classes are required, but missing or options are corrupt.' );

            return false;

        } else {

            // grab the options -- returned as an object ##
            return self::$options = q_options::get();
            // helper::log( self::$options );

        }

    }



    /**
    * Load Libraries
    *
    * @since        2.0.0
    */
    private static function load_libraries()
    {

        // templates ----

        // geo - headless template ##
        require_once self::get_plugin_path( 'library/theme/view/geo.php' );

    }


    /*
    * script enqueuer
    *
    * @since  2.0
    */
    public static function wp_enqueue_scripts_theme() 
    {

        if ( isset( self::$options->library->bootstrap ) ) {

            // bootstrap ##
            \wp_register_style( 'q-theme-bootstrap', helper::get( "theme/css/bootstrap.min.css", "return" ));
            \wp_enqueue_style( 'q-theme-bootstrap' );

        }

    }
    
}