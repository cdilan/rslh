<?php
/**
 * Template Name: Página inicial
 */
get_header(); ?>            
                    <section id="home">
                        <div class="container">
                            <div class="row">
                                <div class="span6">
                                    <div class="entry">
                                        <?php if (have_posts()) : ?>
                                            <?php while (have_posts()) : the_post(); ?>
                                                <?php the_content(); ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    $args = array(
                                        'posts_per_page' => 1,
                                        'post__in' => get_option('sticky_posts')
                                    );
                                    query_posts($args);

                                    if (have_posts()) :
                                    
                                        while (have_posts()) : the_post();
                                    ?>
                                            
                                            <article class="home-news">
                                                <p>
                                                    <strong><?php the_title(); ?></strong>
                                                </p><p>
                                                    <?php echo get_the_excerpt(); ?>
                                                    <a href="<?php the_permalink(); ?>">saiba mais &raquo;</a>
                                                </p>
                                                
                                            </article>

                                        <?php endwhile; wp_reset_postdata(); ?>
                                    <? endif; ?>
                                </div>
                                <div class="span6">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="home-links">
                        <div class="container">
                            <div class="row">
                                <div class="span4">
                                    <div class="well">
                                        <h2>Reinvente sua lanhouse</h2>
                                        <p class="lead">Navegue nos episódios e descubra novas estórias com mais atividades e ganhe pontos reinventando sua lanhouse</p>
                                        <a href="<?php bloginfo('url'); ?>/episodios/" class="btn btn-primary">Navegar nos episódios</a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="well">
                                        <h2>Colabore com outros jogadores</h2>
                                        <p class="lead">Conheça outros jogadores e avalie suas atividades votando e enviando sua opnião</p>
                                        <a href="#" class="btn disabled">Conhecer outros jogadores</a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="well">
                                        <h2>Participe das corridas</h2>
                                        <p class="lead">Ganhe prêmios! Saiba como funcionam as corridas, conheça as regras e veja o que fazer para começar a participar</p>
                                        <a href="#" class="btn disabled">Ler a regulamentação</a>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </section>
                


<?php get_footer(); ?>