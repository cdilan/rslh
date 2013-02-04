<?php
/**
 * Template Name: Ranking
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
echo "FIM DE";

http://codex.wordpress.org/Function_Reference/get_users
http://www.javascriptkit.com/javatutors/arraysort2.shtml
http://stackoverflow.com/questions/4282413/php-sort-array-of-objects-by-object-fields
*/?>

<?php
    $blogusers = get_users('role=jogador&meta_key=cpoints');
    //
    function cmp($a, $b)
    {
        return strcmp($b->cpoints,$a->cpoints);
    }

    print_r($blogusers);
    usort($blogusers, "cmp");
    //
    
?>


        <section id="page" class="lista-jogadores">
            <div class="container">
                <div class="page-header">
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php foreach ($blogusers as $user) {
echo '<li>' . get_avatar($user->id) . "<br /><b>" . $user->user_nicename . "</b><br />" . $user->user_email . "<br /><b>Pontos:".$user->cpoints . '</b></li>';
} 
print_r($blogusers);?>
            </div>
        </section>
>

<?php get_footer(); ?>