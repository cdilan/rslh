<?php get_header(); ?>

<?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

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

                                <div id="atividades-episodio" class="widget">
                                    <h3>Outras atividades</h3>
                                    <div class="well">
                                        chamar as atividades deste episódio
                                    </div>
                                </div>



                        </aside>                            
                    </div>
                </div>
            </section>

            <?php
            // pega tag_atividade deste post
            $tag_atividade_id = ( wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids")));

            //lista entregas com essa tag_atividade
            ?>
            <section id="comentarios">
                <div class="container" >
                    <?php comments_template( '', true ); ?>
                </div>
            </section>

            <?php
            $args = array(  'numberposts' => 20,
                            'post_type'=>'entrega',
                            'orderby'=>'rand',
                            'tax_query'=> array ( array (   'taxonomy'=>'tag_atividade',
                                                            'field'=>'id',
                                                            'terms'=>$tag_atividade_id[0] ))) ;
            $myposts = get_posts( $args );
            if ($myposts) { ?>


                <section id="lista-entregas">
                    <div class="container">
                        <div class="page-header">
                            <h3>Jogadores que entregaram essa atividade</h3>
                        </div>
                        <ul class="thumbnails">
                            <?php
                            foreach( $myposts as $post ) :  setup_postdata($post); ?>
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                        <span class="pull-left"><?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?></span>
                                        <h5><?php the_author(); ?></h5>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section> ?>
            <?php
            }
        endwhile;
    endif;

    wp_reset_postdata();

get_footer(); ?>