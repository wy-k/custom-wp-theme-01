<?php get_header(); ?>

<div class="container-404">
    <h2 class="page-heading">404 Error</h2>
    <h3>Sorry, we can't find the page you're looking for.<br>
    Please try the following links:</h3>

    <div id="404-redirect-links">
        <a href="<?php echo site_url('/news') ?>">Recent News</a><br>
        <a href="<?php echo site_url('/projects') ?>">Our Projects</a><br>
        <a href="<?php echo site_url('/about') ?>">About our Company</a><br>
        <a href="<?php echo site_url('') ?>">Our Home Page</a><br>
    </div>
    
</div>

<?php get_footer(); ?>