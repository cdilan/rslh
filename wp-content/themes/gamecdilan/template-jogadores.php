<?php
/**
 * Template Name: Lista Jogadores
 */
 get_header(); ?>
<?php
/*$cpoints_rows = $wpdb->get_results( "SELECT id, SUM(points) FROM wp_cp GROUP BY uid ORDER BY SUM(points) DESC" );
foreach ( $cpoints_rows as $user_points ) 
{
    print_r($user_points);
    echo $user_points->id." - ";
    echo $user_points["id"]."<br />";
}
echo "FIM DE";*/
?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <section id="page" class="lista-jogadores">
                    <div class="container">
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php the_content(); ?>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>