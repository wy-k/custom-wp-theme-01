<?php get_header(); ?>

    <div id="banner">
        <h1>Company Name</h1>
        <h3>Tagline goes here</h3>
    </div>

    <main>
        <a href="<?php echo site_url('/news') ?>">
            <h2 class="section-heading">News</h2>
        </a>

        <section>

        <?php 
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
            );

            $articles = new WP_Query($args);

            while($articles->have_posts()) {
                $articles->the_post();
        ?>
                <div class="card">
                    <div class="card-image">
                        <a href="<?php echo the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
                        </a>
                    </div>

                    <div class="card-description">
                        <a href="<?php the_permalink() ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <p>
                            <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
                    </div>
                </div> 
        <?php
            }
            wp_reset_query(); 
        ?>

        </section>

        <h3 class="section-heading">Projects</h3>

        <section>
            <?php 
            
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 2,
            );

            $projects = new WP_Query($args);

            while($projects->have_posts()) {
                $projects->the_post();
        ?>
                <div class="card">
                    <div class="card-image">
                        <a href="<?php echo the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
                        </a>
                    </div>

                    <div class="card-description">
                        <a href="<?php the_permalink() ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <p>
                            <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
                    </div>
                </div> 
        <?php
            }
            wp_reset_query(); 
        ?>
        </section>

        <h2 class="section-heading">Call to Action</h2>

        <section id="section-callaction">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum dignissimos optio culpa saepe facilis deserunt similique, deleniti doloribus error dolorum earum quisquam vitae fugit? Error similique harum deleniti quisquam architecto!
            </p>
            <a href="<?php echo site_url('/contact')?>" class="btn-readmore">Contact Us</a>
        </section>

    <?php get_footer(); ?>   