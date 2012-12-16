<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>
        </title>
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <?php //echo Asset::theme_css( 'bootstrap.css'); ?>
        <?php //echo Asset::theme_css( 'sortable.css'); ?>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            .navbar .divider-vertical {
                height: 40px;
                margin: 0 2px;
                border-left: 1px solid #e2e2e2;
                border-right: 1px solid white;
        </style>

        <script type="text/javascript">
        {
            <?php
                echo"var baseURL='".Uri::base(false)."';";
            ?>
        }
        </script>   
    </head>
    
    <body>

        <?php echo \Theme::instance()->get_partial('navigation', 'partials/navigation'); ?>
        
        <?php //echo \Theme::instance()->get_partial('subnavigation', 'partials/subnavigation'); ?>

        <div class="container">
                  		
      		<?php echo \Theme::instance()->view('partials/alert'); ?>

            <div class="row">
                
                <div class="span12">
                    <?php echo \Breadcrumb::create_links(); ?>
                    <?php echo $content; ?>
                </div>
                
                
            </div><!--/row-->
    
            <?php //echo \Template::theme_partial('footer'); ?>
        
        </div>
        
        
        <?php //echo Asset::theme_js('jquery.js'); ?>
        <?php //echo Asset::theme_js('bootstrap.js'); ?>
        <?php //echo Asset::theme_js('bootstrap-tooltip.js'); ?>
        <?php //echo Asset::theme_js('modernizr.min.js'); ?>
        <?php //echo Asset::theme_js('respond.min.js'); ?>
        <?php //echo Asset::theme_js('jquery-ui.min.js'); ?>
        <?php // echo Asset::theme_js('jquery.ui.nestedSortable.js'); ?>
        <?php //echo Asset::theme_js('admin.js'); ?>

    </body>

</html>