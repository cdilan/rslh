<?php get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <section>
                        <div class="container">
                            <div class="page-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <div id="entrega" class="thumbnail entry">
                                        <?php the_content(); ?>
                                    </div>
                                    <section id="comentarios">
                                        <?php comments_template( '', true ); ?>
                                    </section>                   
                                </div>
                                <aside class="span4">
                                    <div id="entrega-jogador" class="well well-small">
                                        <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                                        <h3><?php the_author(); ?></h3>
                                        <h4><?php echo get_user_meta(get_the_author_meta('ID'),'lanhouse', true); ?></h4>
                                    </div>

                                    <?php
                                        global $post;
                                        $tmp_post = $post;
                                        // pega tag_atividade deste post
                                        $tag_atividade_id = (wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids")));
                                        //lista entregas com essa tag_atividade
                                        $args = array(  'numberposts' => 20,
                                                        'post_type'=>'entrega',
                                                        'orderby'=>'rand',
                                                        'exclude' => $post->ID,
                                                        'tax_query'=> array ( array (   'taxonomy'=>'tag_atividade',
                                                                                        'field'=>'id',
                                                                                        'terms'=>$tag_atividade_id[0] ))) ;
                                        $myposts = get_posts( $args );
                                        if(!empty($myposts)) :
                                    ?>
                                        <section id="entrega-jogadores">
                                            <h3>Jogadores que também fizeram esta atividade</h3>
                                            <ul class="thumbnails">
                                                <?php
                                                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                                                    <li class="span4">
                                                        <div class="thumbnail">
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_avatar( get_the_author_meta('ID'), 48 ); ?></a>
                                                            <h5><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></h5>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </section>
                                    <?php endif; ?>
                                    <?php $post = $tmp_post; ?>
                                </aside>
                            </div>
                        </div>
                    </section>
                    
                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>