<?php get_header(); 

while(have_posts()) {
    the_post();
?>

<h2 class="page-heading"><?php the_title() ?></h2>
<div id="article-container">
    <section id="newsarticle">
        <div id="card">
            <div class="card-meta-newsarticle">
                Posted on <?php the_time('F j, Y');?> 
                <?php if (get_post_type() == 'post') { ?>
                    in <a href="#"><?php echo get_the_category_list(', '); ?></a>
                <?php } ?> 
            </div>
            <div class="card-image">
                <a href="<?php echo the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
                </a>
            </div>
            <div class="card-description">
                <?php the_content(); ?>                    
            </div>
        </div>

        <div id="comments-section">
            <?php 
                    
            $fields = array(
                'author' => 
                    '<input  placeholder="Name" id="author" name="author" type="text" size="30" maxlength="245"%s />',
                    esc_attr( $commenter['comment_author'] ),
                    $html_req
                ,
                'email'  => 
                    '<input placeholder="Email" id="email" name="email" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                    esc_attr( $commenter['comment_author_email'] ),
                    $html_req
                ,
            );

            $args = array(
                'title_reply' => 'Share your thoughts',
                'fields' => $fields,
                'comment_field' => '<textarea placeholder="Your Comment" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>',
                'comment_notes_before' => '<p class="comment-notes">Your Email address will not be published. All fields are required.</p>'
            );
                    
            comment_form($args); 
                    
            $comments_number = get_comments_number();
            if($comments_number != 0) {
                ?>
                        
                <div class="comments">
                    <h3>What others say</h3>
                    <ol class="all">
                        <?php
                                
                        $comments = get_comments(array(
                            'post_id' => $post->ID,
                            'status' => 'approve'
                        ));
                        wp_list_comments(array(
                            'per_page' => 15
                        ), $comments);
                        ?>
                    </ol>
                </div>

            <?php
            }        
            ?>
        </div>
    </section>

<?php } ?>

    <aside id="sidebar">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </aside>
</div>



<?php get_footer(); ?>

