<?php get_header(); ?>



    <div class="container ">
        <div class="row ">
            <div class="col-md-8 col-md-offset-2 single-page">
                <h1>Über <?php the_author_meta('first_name');
                    echo ' ';
                    the_author_meta('last_name'); ?></h1>

                <div class="row">
                    <div class="col-lg-2 col-sm-2  col-xs-3">
                        <?php

                        echo get_avatar(get_the_author_meta('ID'));
                        ?>   </div>
                    <div class="caption col-lg-10 col-sm-10 col-xs-9">
                        <?php
                        the_author_meta('description');

                        ?>
                    </div>
                </div>
                <h2 class="top30">Beiträge von <?php the_author_meta('first_name');
                    echo ' ';
                    the_author_meta('last_name'); ?></h2>

                <?php
                if (get_query_var('paged')) {
                    $paged = get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }

                query_posts('posts_per_page=10&order=DESC&author=' . get_the_author_meta('ID') . '&paged=' . $paged);
                ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="row top30">
                        <div class="col-lg-4">
                            <a
                                href="<?php the_permalink() ?>">
                                <?php
                                echo get_the_post_thumbnail(null, 'large', "class=img-responsive")
                                ?>
                            </a>
                        </div>
                        <div class="caption col-lg-8">
                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <span class="autor-name"> Am <?php the_date('d.m.Y'); ?> von  <?php echo get_the_author(
                                ); ?></span>

                            <p> <?php
                                echo substr(strip_tags(get_the_excerpt()), 0, 180) . "..." ?></p> <a
                                href="<?php the_permalink() ?>">Weiterlesen
                            </a>


                        </div>
                    </div>
                <?php endwhile;
                else: ?>


                <?php endif ?>

                <?php get_navigation(); ?>

            </div>


        </div>

    </div>
<?php
get_footer();
?>