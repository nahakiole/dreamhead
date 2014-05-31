<?php
/*
Template Name: About
*/

get_header(); ?>



    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-2 single-page">
                
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php $authors = get_users('orderby=post_count&order=DESC');
                    foreach($authors as $user)
                    {
                        if (!in_array( 'administrator', $user->roles )){
                            continue;
                        }

                        ?>
                        <div class="media top30">
                            <a class="pull-left" href="#">
                                <?php echo get_avatar( $user->user_email, '128' ); ?>
                            </a>
                            <div class="media-body">

                                <h2 class="authorName media-heading"><?php echo $user->display_name; ?></h2>
                                <?php
                                the_author_meta('description');

                                ?>
                                <br/>
                                <a href="<?php echo get_author_posts_url( $user->ID ); ?>">Alle Beiträge von <?php echo $user->display_name; ?> ansehen.</a>
                            </div>
                        </div>

                    <?php
                    }

                    ?>
                <?php endwhile;
                else: ?>


                <?php endif ?>
            </div>


        </div>

    </div>
<?php
get_footer();
?>