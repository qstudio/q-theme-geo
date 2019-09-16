<?php

namespace q\theme\geo\theme\template\geo; 

use q\theme\theme\view\page\page as page;
use q\theme\geo\theme\view\geo\geo as geo;
use q\theme\theme\template\generic\generic as generic;

// header ##
\get_header();

// open content ##
generic::the_content_open([ 'layout' => 'full_width' ]);

?>
<div class="container">
    <div class="row">
        <div class="col-12">
<?php

// title ##
generic::the_title();

// -------

// get all page content ##
page::render();

// -------

?>
        </div>
    </div>
</div>
<div class="q-clear"></div>
<!-- END PAGE CONTENT CONTAINER -->
<?php

// close content ##
generic::the_content_close();

\get_footer();