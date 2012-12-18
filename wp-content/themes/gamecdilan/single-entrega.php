<?php get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <section id="texto-inspirador">
                        <div class="container">
                            <div class="page-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <?php the_content(); ?>
                                </div>
                                <div class="span4">
                                    <?php echo get_avatar( get_the_author_meta('ID'), 128 ); ?>
                                    <h3><?php the_author(); ?></h3>
                                    <h4><?php echo get_user_meta(get_the_author_meta('ID'),'lanhouse', true); ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="comentarios">
                        <div class="container" >
                            <?php comments_template( '', true ); ?>
                        </div>
                    </section>



                    <?php
                    // pega tag_atividade deste post
                    $tag_atividade_id = ( wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids")));

                    //lista entregas com essa tag_atividade
                    ?>
            <section id="lista-entregas">
                <div class="container">
                    <div class="page-header">
                        <h3>Jogadores que entregaram essa atividade</h3>
                    </div>
                    <ul class="thumbnails">
                        <?php
                        $args = array(  'numberposts' => 20,
                                        'post_type'=>'entrega',
                                        'orderby'=>'rand',
                                        'tax_query'=> array ( array (   'taxonomy'=>'tag_atividade',
                                                                        'field'=>'id',
                                                                        'terms'=>$tag_atividade_id[0] ))) ;
                        $myposts = get_posts( $args );
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
            </section>
                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>