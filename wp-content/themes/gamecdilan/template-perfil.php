<?php
/**
 * Template Name: Perfil
 */
get_header(); ?>            
                    <section id="player">
                        <div class="container">
                            <div class="row">
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post(); ?>                            
                                        <div class="span8">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <aside id="sidebar" class="span4">
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </section>

<?php get_footer(); ?>