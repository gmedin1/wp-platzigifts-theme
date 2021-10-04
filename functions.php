<?php
    // Cargar al iniciar el tema.
    function init() {
        
        // Permitir las imagenes destacadas en la pagina
        add_theme_support( 'post-thumbnails' );

        // Añadir la etiqueta title.
        add_theme_support( 'title-tag' );

        // Registrar un Menu de Navegación
        register_nav_menus( array( 'top-menu' => 'Main Menu' ) );

    }

    function assets() {
        
        // Estilos
        // Registros
        wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css', '', '5.1.1', 'all' );
        wp_register_style( 'font', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', '', '1.0.0', 'all' );

        // Encolar
        wp_enqueue_style( 'styles', get_stylesheet_uri(), array( 'bootstrap', 'font' ), '1.0.0', 'all' );

        // JavaScript
        // Registros
        wp_register_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js', '', '2.9.3', true );
        
        // Encolar
        wp_enqueue_script( 'bootstraps', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', array( 'popper' ), '5.1.1', true );
        wp_enqueue_script( 'custom', get_template_directory_uri().'/assets/js/custom.js', '', '1.0.0', true );

    }

    function sidebar() {

        // Registrar
        register_sidebar( 
            array(
                'name'          => 'Footer',
                'id'            => 'footer',
                'description'   => 'Widgets Section for Footer',
                'before_title'  => '<p>',
                'after_titel'   => '</p>',
                'before_widget' => '<div id="%1$s" class="%2$s">',
                'after_widget'  => '</div>'
            ) 
        );
    }

    function product_type() {
        
        $labels = array(
            'name'              => 'Products',
            'singular_name'     => 'Product',
            'menu_name'         => 'Products'
        );

        $args = array(
            'label'                 => 'products',
            'description'           => 'Platzi Products',
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'public'                => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-cart',
            'can_export'            => true,
            'publicly_queryable'    => true,
            'rewrite'               => true,
            'show_in_rest'          => true
        );

        register_post_type( 'product', $args );
    }

    function pgRegisterTax() {

        $args = array(
            'hierarchical'      => true,
            'labels'            => array(
                'name'              => 'Categorías de Productos',
                'singular_name'     => 'Categoría de Productos'
            ),
            'show_in_nav_menu'  => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'              => 'category-products'
            )
        );

        register_taxonomy( 'category-products', array('product'), $args );
    }

    // Hooks
    add_action( 'after_setup_theme', 'init' );
    add_action( 'wp_enqueue_scripts', 'assets' );
    add_action( 'widgets_init', 'sidebar' );
    add_action( 'init', 'product_type' );
    add_action( 'init', 'pgRegisterTax');

?>