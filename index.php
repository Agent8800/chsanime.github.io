<?php get_header(); ?>

<main class="container">
    <!-- Slider Section (Latest 3 Posts) -->
    <div class="slider-section">
        <div class="slider-container">
            <?php 
            $slider_query = new WP_Query(array('posts_per_page' => 3, 'post_type' => 'page')); 
            if($slider_query->have_posts()) : while($slider_query->have_posts()) : $slider_query->the_post(); ?>
            <div class="slide">
                <?php the_post_thumbnail('large', array('class' => 'slide-img')); ?>
                <div class="slide-content">
                    <div class="slide-title"><?php the_title(); ?></div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>

    <!-- Latest Anime Grid -->
    <div class="section-title">Latest Anime</div>
    <div class="media-grid">
        <?php 
        if(have_posts()) : while(have_posts()) : the_post(); 
        // Only show Parent pages (Series), not child pages (Episodes)
        global $post;
        if($post->post_parent == 0) : 
        ?>
        <div class="card">
            <a href="<?php the_permalink(); ?>" class="card-poster">
                <?php the_post_thumbnail('medium'); ?>
                <div class="card-overlay">
                    <div class="card-title"><?php the_title(); ?></div>
                </div>
            </a>
        </div>
        <?php endif; endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
