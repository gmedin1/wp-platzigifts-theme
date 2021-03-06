<?php get_header(); ?>

<main class="container">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <h1 class="my-3"> <?php the_title(); ?>!!</h1>
            <?php the_content(); ?>

    <?php }
    } ?>

    <div class="lista-productos my-5">
        <h2 class="text-center">PRODUCTOS</h2>
        <div class="row">
            <div class="col-12">
                <select name="category-products" id="category-products">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type'         => 'product',
                'post_per_page'     => -1,
                'order'             => 'ASC',
                'orderby'           => 'title'
            );

            $products = new WP_Query($args);

            if ($products->have_posts()) {
                while ($products->have_posts()) {
                    $products->the_post(); ?>

                    <div class="col-4">
                        <figure>
                            <?php the_post_thumbnail('large'); ?>
                        </figure>
                        <h4 class="my-3 text-center">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>