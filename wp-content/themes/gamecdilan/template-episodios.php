<?php
/**
 * Template Name: Lista de episódios
 */
get_header(); ?>
    
            <section id="lista-episodios">
                <div class="container">
                    <div class="page-header">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <ul id="episodios">
                    <?php 
                        $terms = get_terms('episodio', 'orderby=count&hide_empty=0');
                        $count = count($terms);
                        
                        if ($count > 0) {                
                            foreach ($terms as $term) {        
                    ?>
                        <li>
                            <div class="thumbnail">
                                
                                <h2><?php echo $term->name; ?></h2>
                                <p>
                                    
                                    
                                    <?php 
                                    /*<strong><?php echo $term->count; ?> Atividades</strong> */
                                    
                                    $query_inside_loop = query_posts('episodio='.$term->slug.'');
                                    $quantidade_de_atividades_desse_episodio = sizeof($query_inside_loop);
                                    $porcentagem_progresso = 0;
                                    $atividades_completadas=0;
                                    // The Loop
                                    while ( have_posts() ) : the_post();
                                        //the_title();
                                        $ja_completou_essa_atividade = get_user_meta( get_current_user_id(), $key = $post->ID, $single = true );
                                        //echo $ja_completou_essa_atividade;
                                        if($ja_completou_essa_atividade=="completed") {
                                            $atividades_completadas++;
                                        }
                                    endwhile;
                                    
                                    if($atividades_completadas>0) {
                                        //echo $atividades_completadas."/".$quantidade_de_atividades_desse_episodio."<br/>";
                                        $porcentagem_progresso = ($atividades_completadas/$quantidade_de_atividades_desse_episodio)*100;
                                        //echo $porcentagem_progresso;
                                    }
                                    //echo $atividades_completadas;
                                    // Reset Query
                                    wp_reset_query();
                                    ?>

                                    <?php echo substr($term->description, 0, 280); ?>...
                                </p>
                                <div class="progress progress-striped progress-warning">
                                      <?php echo "($atividades_completadas/$quantidade_de_atividades_desse_episodio"." atividades)"; ?>  
                                      <div class="bar" style="width: <?php echo $porcentagem_progresso ?>%;color:#000;"></div>
                                </div>
                                <a href="<?php echo get_term_link($term->slug, 'episodio'); ?>" class="btn btn-primary">Ver episódio <i class="icon-chevron-right icon-white"></i></a>
                                <!--h4>Seu progresso </h4-->
                                <br />
                                <br />
                                
                            </div>
                        </li>
                    <?php                    
                            }  
                        }
                    ?>
                    </ul>
                </div>
            </section>

<?php get_footer(); ?>
