<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags Here -->
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" />
                    </div>
                    <div class="col-8">
                        <nav>
                            <?php wp_nav_menu( array( 
                                'theme_location'    => 'top-menu',
                                'menu-class'        => 'menu-principal',
                                'container-class'   => 'container-menu' 
                             ) ) ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>