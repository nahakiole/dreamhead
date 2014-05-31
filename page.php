<?php get_header(); ?>



    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3 single-page">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile;
                else: ?>


                <?php endif ?>
            </div>


        </div>

    </div>
<?php
get_footer();
?>