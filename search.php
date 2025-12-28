<?php get_header(); ?>

<main class="container">
    <div class="search-page-header">
        <h1 class="search-page-title">Search</h1>
        <div class="search-box-wrapper">
            <input type="text" class="search-input" placeholder="Search for anime..." value="<?php echo get_search_query(); ?>">
            <button class="search-submit-btn">Search</button>
        </div>
    </div>

    <div class="results-info">
        Found <?php echo $wp_query->found_posts; ?> results for "<?php echo get_search_query(); ?>"
    </div>

    <div class="media-grid">
        <?php 
        if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="card">
            <a href="<?php the_permalink(); ?>" class="card-poster">
                <?php the_post_thumbnail('medium'); ?>
                <div class="card-overlay">
                    <div class="card-title"><?php the_title(); ?></div>
                </div>
            </a>
        </div>
        <?php endwhile; else: ?>
        <p style="text-align:center; width:100%;">No results found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
