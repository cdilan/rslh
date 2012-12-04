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
                
                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>