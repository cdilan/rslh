<?php
/**
 * Template Name: Ranking
 */

#REFERENCIAS - Criado por Francisco Matelli
#http://codex.wordpress.org/Function_Reference/get_users
#http://www.javascriptkit.com/javatutors/arraysort2.shtml
#http://stackoverflow.com/questions/4282413/php-sort-array-of-objects-by-object-fields
#http://php.net/manual/en/function.strlen.php
#http://php.net/manual/pt_BR/function.usort.php
#http://stackoverflow.com/questions/2852621/strcmp-equivelant-for-integers-intcmp-in-php - SOLUCAO AQUI
#http://codex.wordpress.org/Function_Reference/bloginfo
#http://formidablepro.com/topic-tags/custom-display/


 get_header(); ?>

<?php
    $blogusers = get_users('role=jogador&meta_key=cpoints');
    //
    /*function cmp($a, $b)
    {
        //echo strlen($a)." b ".strlen($b);
        return strcmp($b->cpoints,$a->cpoints); // problema na hora de usar números de 3 digitos
        //return ($a-$b) ? ($a-$b)/abs($a-$b) : 0;
        //return $x = $a==$b ? 0 : ($a>$b ? 1 : ($a<$b ? -1 : null));
        //if ($a == $b) {//return 0;}
        //return ((int)$a < (int)$b ) ? -1 : 1;
    }*/
    function compara_valores_do_array_para_ordenar($a,$b)
    {
        $a = (int)$a->cpoints;
        $b = (int)$b->cpoints;
        return ($a-$b) ? ($a-$b)/abs($a-$b)*(-1) : 0;
        //return $a==$b ? 0 : ($a>$b ? 1 : ($a<$b ? -1 : null));
    }
    //print_r($blogusers);
    usort($blogusers, "compara_valores_do_array_para_ordenar");
    //
    
?>


        <section id="page" class="lista-jogadores">
            <div class="container">
                <div class="page-header header-fixed span12">

                    <h1><?php the_title(); ?></h1>
                    <h4>Se você não está aparecendo no ranking <a href="<?php bloginfo( url ); ?>/episodios"> faça uma atividade</a></h4>
                </div>
                
                <a class="btn btn-primary" href="#<?php echo get_current_user_id(); ?>">Ir para a minha posição.</a>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Posição</th>
                            <!--th>Foto</th-->
                            <th>Jogador</th>
                            <th>Lan House</th>
                            <!---th>Redes Sociais</th>
                            <th>Medalhas</th-->
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $pos=1; foreach ($blogusers as $user) { ?>
                        <tr <?php if($user->ID==get_current_user_id()) echo " class=success "; ?> >
                            <?php if($user->cpoints>0) { ?>
                            <td><a name="<?php echo $user->ID ?>" style="padding-top:300px;"><?php echo $pos; $pos++; ?></a></td>
                            <!--td><?php echo get_avatar($user->id); ?></td-->
                            <td><strong><a href="<?php bloginfo( url ) ?>/perfil-publico-do-jogador/?uid=<?php echo $user->ID ?>"><?php echo $user->display_name ; ?></a></strong></td>
                            <td><!--a href="<?php echo $user->user_url ?>"--><?php echo $user->lanhouse ?></td>
                            <!--td><?php echo FrmProDisplaysController::get_shortcode(array('id' => 3)); ?></td>
                            <td>
                                <?php echo FrmProDisplaysController::get_shortcode(array('id' => 41, 'filter' => 1, 'uid' => $user->ID)); ?>
                                <?php /*echo do_shortcode( "[display-frm-data id=5 filter=1]" ); */?>
                                <?php /*<a href="<?php echo do_shortcode( '[medalhasjogador-medalha show=medalha-logo]') ?>" style="color:#000">
                                <img class="medalha-em-linha thumb-64" title="[medalhasjogador-medalha show=medalha-nome]" src="<?php do_shortcode( '[medalhasjogador-medalha show=medalha-logo]') ?>" alt="<?php do_shortcode( "[medalhasjogador-medalha show=medalha-nome]") ?>" width="36" height="36" />
                                <h5><?php do_shortcode( "[medalhasjogador-medalha show=medalha-nome]") ?></h5>
                                </a> */ ?>
                            </td-->
                            <td><?php echo $user->cpoints; ?></td>
                        </tr>   
                        <?php  } ?>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </section>
>

<?php get_footer(); ?>