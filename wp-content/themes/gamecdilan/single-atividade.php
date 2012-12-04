<?php get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <section id="atividade">
                    <div class="container">
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="row">
                            <div class="span8">
                                <div class="entry" id="texto-inspirador">
                                    <?php the_content(); ?>
                                </div>
                                <?php if(get_post_meta($post->ID, 'form_atividade', true)) : ?>
                                    <div class="well" id="formulario">
                                        <?php echo do_shortcode(get_post_meta( $post->ID, 'form_atividade', true )); ?>
                                    </div>
                                <?php endif; ?>
                                <div id="comentarios">
                                    <?php comments_template( '', true ); ?>
                                </div>
                            </div>

                            <aside class="span4">
                                <?php if(get_post_meta($post->ID, 'dicas_atividade', true)) : ?>
                                    <div id="dicas" class="widget">
                                        <h3>Dicas</h3>
                                        <div class="well">
                                            <?php echo do_shortcode(get_post_meta( $post->ID, 'dicas_atividade', true )); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_post_meta($post->ID, 'sugeridas_atividade', true)) : ?>
                                    <div id="sugeridas" class="widget">
                                        <h3>Atividades sugeridas</h3>
                                        <div class="well">
                                            <?php echo do_shortcode(get_post_meta( $post->ID, 'sugeridas_atividade', true )); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </aside>                            
                        </div>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php $tag_atividade = wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "names")); ?>

            <?php 
                // Lista as entregas relacionadas com a atividade
                if(!empty($tag_atividade)) :
                    
                    $entregas_relacionadas = new WP_Query(array(
                        'post_type' => 'entrega',
                        'tag_atividade' => $tag_atividade[0]
                    ));
                    
                    if ($entregas_relacionadas->have_posts()) :
            ?>
                <section id="entregas-relacionadas">
                    <div class="container">
                        <div class="page-header">
                            <h3>Entregas relacionadas</h3>
                        </div>                        
                        <ul class="thumbnails">
                            <?php while ( $entregas_relacionadas->have_posts() ) : $entregas_relacionadas->the_post(); ?>
                             <li class="span2">
                                <div class="thumbnail">
                                    <?php echo get_avatar( get_the_author_meta('ID'), 128 ); ?>
                                    <h3><?php the_author(); ?></h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn">Ver entrega</a>
                                </div>
                            </li>               
                            <?php endwhile; ?>              
                        </ul>
                    </div>
                </section>

            <?php endif; wp_reset_postdata(); endif; ?>

<?php get_footer(); ?>