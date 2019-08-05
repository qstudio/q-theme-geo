<?php

namespace q\theme\geo\theme\view\geo;

use q\theme\geo\core\core as core;
use q\theme\geo\core\helper as helper;
use q\theme\geo\core\config as config;
use q\theme\geo\theme\template as template;

// Q ##
use q\controller\modal as q_modal;
use q\controller\generic as q_generic;

// load it up ##
// \q\theme\geo\theme\view\geo\geo::run();

class geo extends \q_theme_geo {
    
    public static function run()
    {

        // build ACF fields
        // \add_action( 'acf/init', array( get_class(), 'add_fields' ), 1 );

        // oembed for modal data attr ##
        // \add_filter( 'q/meta/panel/about_panel_video', array( get_class(), 'meta_oembed' ), 2, 10 );

        // add template JS ##
        // \add_action( 'wp_footer', [ get_class(), 'wp_footer' ], 1, 10 );

        // modal ajax callback
        // \add_action( 'wp_ajax_nopriv_about_modal', [ get_class(), 'about_modal' ] );
        // \add_action( 'wp_ajax_about_modal', [ get_class(), 'about_modal' ] );

        // just the URL.. ##
        // \add_filter( 'q/meta/intro/about_intro_url', array( get_class(), 'meta_url' ), 2, 10 );
        // \add_filter( 'q/meta/support/about_support_url', array( get_class(), 'meta_url' ), 2, 10 );

    }



    public static function the_header()
    {

        // helper::log( 'device: '.helper::get_device() );

        switch ( helper::get_device() ) {

            case "desktop" :
            case "tablet" :

                // helper::log( 'loading desktop header..' );

                self::the_header_desktop();

                break ;

            default :
            case 'handheld' :

                // helper::log( 'loading handheld header..' );

                self::the_header_handheld();

                break ;

        }

    }





    public static function the_header_handheld()
    {

?>
    <!DOCTYPE html>
        <html <?php \language_attributes(); ?>>
        <head>
            <meta charset="<?php \bloginfo( 'charset' ); ?>" />
            <meta content="yes" name="apple-mobile-web-app-capable" />
            <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" name="viewport" />
            <title><?php \wp_title( '|', true, 'right' ); ?></title>
            <link rel="profile" href="http://gmpg.org/xfn/11" />
            <link rel="pingback" href="<?php \bloginfo( 'pingback_url' ); ?>" />
<?php

            // standard WP head function ##
            \wp_head();

?>
        </head>
        <body <?php \body_class(); ?> data-scroll-slug="top">
<?php

        // Brand Bar ##
        // \do_action( 'q_action_body_open');

    }



public static function the_header_desktop()
{

    ?>
    <!DOCTYPE html>
        <html <?php \language_attributes(); ?>>
        <head>
            <meta charset="<?php \bloginfo( 'charset' ); ?>" />
            <meta content="yes" name="apple-mobile-web-app-capable" />
            <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" name="viewport" />
            <title><?php \wp_title( '|', true, 'right' ); ?></title>
            <link rel="profile" href="http://gmpg.org/xfn/11" />
            <link rel="pingback" href="<?php \bloginfo( 'pingback_url' ); ?>" />
<?php

            // standard WP head function ##
            \wp_head();

?>
        </head>
        <body <?php \body_class(); ?> data-scroll-slug="top">
<?php

        // Brand Bar ##
        // \do_action( 'q_action_body_open');

        // analytics ##
        // q_google::analytics();

        // main navigation ##
        // $walker_args = array(
        //     'menu'              => 'desktop-header',
        //     'items_wrap'        => '<ul class="nav navbar-nav">%3$s</ul>',
        //     'theme_location'    => 'primary',
        //     'depth'             => 2,
        //     'container'         => 'div',
        //     //'container_class'   => 'collapse navbar-collapse',
        //     'container_id'      => 'navbar',
        //     'menu_class'        => 'nav navbar-nav',
        //     'desc_depth'        => 0,
        //     'thumbnail'         => true,
        //     'thumbnail_link'    => true,
        //     'thumbnail_size'    => 'desktop-menu',
        //     'thumbnail_attr'    => [
        //         'class'     => 'lazy menu',
        //         // 'alt'       => 'menu', // @todo ##
        //         // 'title'     => 'test'  // @todo ##
        //     ],
        //     'fallback_cb'       => 'Q_Nav_Walker::fallback',
        //     'walker'            => new \Q_Nav_Walker()
        // );

        // q_navigation::the_nav_menu( $walker_args );

}





    public static function the_hamburger()
    {

        if (
            'handheld' != helper::get_device()
        ) {

            // handheld only ##
            return false;

        }

?>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <i class="icon-Hamburguer"></i>
        </button>
<?php

    }




    public static function the_logo()
    {

?>
        <a class="navbar-brand" href="<?php echo \get_site_url( '1' ); ?>" title="Greenheart Exchange">
            <img class="logo" src="<?php helper::get( 'theme/css/images/global/logo.svg'); ?>">
        </a>
<?php

    }




    public static function the_footer()
    {

?>
        <footer>
        </footer>
<?php

        // call standard wp_footer function ##
        \wp_footer(); 

?>
        </body>
    </html>
<?php

    }

    
}