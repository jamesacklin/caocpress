<?php
/*
Template Name: Category Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="main">
    <div class="container-fluid">
        <div class="row">
            <article>
                <div class="col-xs-12"><?php the_breadcrumb(); ?></div>
                <? the_post_thumbnail('full'); ?>
                <div class="content">
                    <header>
                        <h2 class="subheading"><?php the_title(); ?></h2>
                    </header>
                    <?php the_content(); ?>
                    <div class="related-pages">
                    <? // Gets child pages
                        $args = array(
                            'post_type' => 'page',
                            'post_parent' => $post->ID
                        );
                        $children = get_posts( $args );
                        if ($children): ?>
                            <hr>
                            <h3 class="subheading">Articles</h3>
                            <div class="category-navigation">
                            <? foreach ( $children as $post ) : setup_postdata( $post ); ?>
                                <div class="section-link">
                                    <h4><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h4>
                                    <? if ( has_post_thumbnail() ){
                                        echo "<p>";
                                        the_post_thumbnail('full');
                                        echo "</p>";
                                    } ?>
                                    <? the_excerpt(); ?>
                                    <!-- <a class="btn" href="<? the_permalink(); ?>">Read Article &rarr;</a> -->
                                </div>
                            <? endforeach;
                            wp_reset_postdata(); ?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <footer>
                    <p class="byline">Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> by <?= get_the_author(); ?></p>
                    <div class="share">
                        <p><span class="smallcaps">Share:</span>
                            <a href="#" class="text-btn">Facebook</a>
                            <a href="#" class="text-btn">Twitter</a>
                            <a href="#" class="text-btn">G+</a>
                            <a href="#" class="text-btn">LinkedIn</a>
                        </p>
                    </div>
                </footer>
            </article>
            <aside>
                <? // Tag list ?>
                <?php the_tags('<div class="section"><h4 class="subheading">Tags</h4><ul class="tag-list"><li>','</li><li>','</li></ul></div>'); ?>
                <? // Gets sibling pages
                global $post;
                $post_parent = $post->ID;
                $post_parent = $post->post_parent;
                $args = array(
                    'posts_per_page' => -1,
                    'post_parent' =>$post_parent,
                    'post_type'=> 'page',
                    'exclude' => '7, '.$post->ID,
                );
                $siblings = get_posts( $args );
                if ($siblings): ?>
                    <div class="section navigation">
                    <h4 class="subheading" style="color: #5b4472">Learn More</h4>
                    <? foreach ( $siblings as $post ) : setup_postdata( $post ); ?>
                        <div class="section-link">
                            <h5><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h5>
                            <? if ( has_post_thumbnail() ){ ?>
                                <p><a href="<? the_permalink(); ?>"><? the_post_thumbnail('full') ?></a></p>
                                <?
                            }
                            the_excerpt(); ?>
                            <p><a class="btn alt" href="<? the_permalink(); ?>">Explore &rarr;</a></p>
                            <hr />
                        </div>
                    <?php endforeach;
                    echo '</div>';
                endif;
                wp_reset_postdata(); ?>
                <?php if(get_field('content_areas')): ?>
                    <?php while(has_sub_field('content_areas')) :?>
                        <div class="section">
                                <h4 class="subheading"><?php the_sub_field('header') ?></h4>
                                <?php the_sub_field('content'); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
