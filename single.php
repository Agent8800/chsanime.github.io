<?php get_header(); ?>

<main class="container">
    <div class="post-header">
        <?php the_post_thumbnail('large', array('class' => 'poster-img')); ?>
    </div>

    <div class="info-section">
        <h1 class="post-title"><?php the_title(); ?></h1>
        
        <!-- Tags (Categories) -->
        <div class="tags-container">
            <?php the_tags('<span class="tag">', '</span><span class="tag">', '</span>'); ?>
        </div>

        <div class="synopsis-box">
            <span class="synopsis-title">Synopsis</span>
            <?php the_content(); ?>
        </div>
    </div>

    <!-- DOWNLOAD SECTION -->
    <div class="download-section">
        <div class="download-header">
            <div class="download-title">Downloads</div>
        </div>

        <div class="download-list-container">
            <!-- 1. Batch Row (From Custom Fields on Parent Page) -->
            <?php 
            $batch_1080 = get_post_meta(get_the_ID(), 'batch_1080', true);
            $batch_720 = get_post_meta(get_the_ID(), 'batch_720', true);
            ?>
            <div class="dl-row batch-row">
                <div class="dl-ep-name">Batch (All)</div>
                <div class="dl-quality-group">
                    <?php if($batch_1080): ?><a href="<?php echo esc_url($batch_1080); ?>" class="q-btn q-1080">1080p</a><?php endif; ?>
                    <?php if($batch_720): ?><a href="<?php echo esc_url($batch_720); ?>" class="q-btn q-720">720p</a><?php endif; ?>
                </div>
            </div>

            <!-- 2. Episode List (Query Child Pages) -->
            <?php 
            $child_query = new WP_Query(array(
                'post_parent' => get_the_ID(),
                'post_type' => 'page',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if($child_query->have_posts()) : 
                while($child_query->have_posts()) : $child_query->the_post(); 
                
                // Get Episode Links (Assuming stored in Content or Custom Field)
                // Here I assume they are stored in standard Custom Fields for Episodes
                $ep_1080 = get_post_meta(get_the_ID(), 'ep_1080', true);
                $ep_720 = get_post_meta(get_the_ID(), 'ep_720', true);
                ?>
                <div class="dl-row">
                    <div class="dl-ep-name">
                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;">
                            <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="dl-quality-group">
                        <?php if($ep_1080): ?><a href="<?php echo esc_url($ep_1080); ?>" class="q-btn q-1080">1080p</a><?php endif; ?>
                        <?php if($ep_720): ?><a href="<?php echo esc_url($ep_720); ?>" class="q-btn q-720">720p</a><?php endif; ?>
                    </div>
                </div>
                <?php 
                endwhile; 
            endif; 
            wp_reset_postdata(); 
            ?>
        </div>
    </div>

    <!-- Comments -->
    <div class="comment-section">
        <h3 class="comment-header" style="margin-bottom:20px;">Discussion</h3>
        <?php comments_template(); ?>
    </div>

</main>

<?php get_footer(); ?>
