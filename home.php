<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron main-article"
         style="background-image: url('<?php echo get_template_directory_uri() ?>/img/nerdvsgeek.png')">


    </div>


    <div class="container ">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-4">

                    <h2>
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </h2>
                <?php $categories = get_the_category();
                if ($categories) {
                    foreach ($categories as $category) {
                        echo '<span class="label label-default" style="background: '.genColorCodeFromText($category->name).'">'.$category->name . '</span> ';
                    }
                    echo "<br/>";
                }
                echo get_the_post_thumbnail(null, 'thumbnail')
                ?>

                    Am <?php  echo the_date(); ?> von <?php the_author(); ?>

                <br/>
                    <?php echo substr(get_the_content(),0, 200)."..." ?>




            </div>
            <?php endwhile;
            else: ?>
            <?php endif ?>

        </div>

    </div>
<?php
get_footer();
?>