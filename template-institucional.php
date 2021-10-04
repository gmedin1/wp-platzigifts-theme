<?php 
// Template name: Pagina Institucional
get_header(); 
$fields = get_fields();
?>

<main class="container my-5">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <h1 class="my-3"><?php echo $fields['titulo']; ?></h1>
            <img src="<?php echo $fields['imagen']; ?>" alt="">
            <hr>
            <?php the_content(); ?>
    <?php }
    }
    ?>
</main>

<?php get_footer(); ?>