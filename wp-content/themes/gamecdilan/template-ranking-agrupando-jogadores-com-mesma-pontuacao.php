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
*/

#http://codex.wordpress.org/Function_Reference/get_users
#http://www.javascriptkit.com/javatutors/arraysort2.shtml
#http://stackoverflow.com/questions/4282413/php-sort-array-of-objects-by-object-fields
#http://php.net/manual/en/function.strlen.php
#http://php.net/manual/pt_BR/function.usort.php
#http://stackoverflow.com/questions/2852621/strcmp-equivelant-for-integers-intcmp-in-php - SOLUCAO AQUI
#http://codex.wordpress.org/Function_Reference/bloginfo
?>

<?php
    $blogusers = get_users('role=jogador&meta_key=cpoints');
    //
    function cmp($a, $b)
    {
        //echo strlen($a)." b ".strlen($b);
        return strcmp($b->cpoints,$a->cpoints); // problema na hora de usar números de 3 digitos
        //return ($a-$b) ? ($a-$b)/abs($a-$b) : 0;
        //return $x = $a==$b ? 0 : ($a>$b ? 1 : ($a<$b ? -1 : null));
        //if ($a == $b) {//return 0;}
        //return ((int)$a < (int)$b ) ? -1 : 1;
    }

    $engloba_pos_iguais = array();
    function intcmp($a,$b)
    {
        $a = (int)$a->cpoints;
        $b = (int)$b->cpoints;
         ($a-$b) ? $var = ($a-$b)/abs($a-$b)*(-1) : $var = 0;
        
        //array_push($engloba_pos_iguais, $var);
        return $var;
        //return $a==$b ? 0 : ($a>$b ? 1 : ($a<$b ? -1 : null));
    }
    //print_r($blogusers);
    usort($blogusers, "intcmp");
    print_r($engloba_pos_iguais);
    //
    
?>


        <section id="page" class="lista-jogadores">
            <div class="container">
                <div class="page-header">
                    <h1><?php the_title(); ?></h1>
                </div>

                <table class="table table-hover">
                    <caption>Ranking de jogadores</caption>
                    <thead>
                        <tr>
                            <th>Posição</th>
                            <th>Foto</th>
                            <th>Jogador</th>
                            <th>Lan House</th>
                            <!--th>Redes Sociais</th--><!--td><div class="player-social"><?php echo do_shortcode("[display-frm-data id=3 filter=1 uid=".$user->ID."]"); ?></div></td-->
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $pos=1; foreach ($blogusers as $user) { ?>
                            <?php if($pontos_do_ultimo_loop!=$user->cpoints) ?>
                                <tr rowspan="<?php count($jogadores_com_mesma_pontucao) ?>">
                                    <?php echo $tabela_joga ?>
                                </tr>
                            <?php } else { ?>
                                $tabela_joga .= "
                                                <td><?php echo $pos; $pos++; ?></td>
                                                <td><?php echo get_avatar($user->id); ?></td>
                                                <td><a href="<?php bloginfo( url ) ?>/perfil-publico-do-jogador/?uid=<?php echo $user->ID ?>"><?php echo $user->display_name ; ?></a></td>
                                                <td><a href="<?php echo $user->user_url ?>"><?php echo $user->lanhouse ?></a></td>
                                                <td><?php $pontos_do_ultimo_loop = $user->cpoints; echo $user->cpoints; ?></td>"
                            <?php } ?>
                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </section>
>

<?php get_footer(); ?>