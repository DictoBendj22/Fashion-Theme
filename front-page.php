<?php get_header() ?>

<!-- LATEST -->
    <section class="latest ">
        <div class="container">
            <div class="latest__grid">
                <div class="latest__main">
                <?php 
                    $main = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_key' => "group",
                        'meta_value' => "latest-main"
                    ))
                ?>
                <?php if($main->have_posts()) : while($main->have_posts()) : $main->the_post()?>
                    <article class="card card--md latest--md">
                        <?php 
                            if(has_post_thumbnail()) {
                            the_post_thumbnail();
                        }?>
                        <ul class="card__info">
                            <li>
                                <span class="date"><?php the_date('M j')?></span>
                                <span class="dot"></span> 
                                <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                            </li>
                            <li>By: <?php echo get_the_author_meta('first_name')?></li>
                        </ul>
                        <h2><?php the_title()?></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 35)?></p>
                        <a href="<?php the_permalink()?>">Read More...</a>
                    </article>
                </div>
                <?php 
                    endwhile;
                else:
                    echo "no post";
                endif;
                    wp_reset_postdata();
                ?>
                <div class="latest__side">
                <?php 
                    $side = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'latest-side',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($side->have_posts()) : while($side->have_posts()) : $side->the_post()?>
                    <article class="card card--sm latest--sm">
                        <?php 
                            if(has_post_thumbnail()) {
                            the_post_thumbnail();
                        }?>
                        <ul class="card__info">
                            <li>
                                <span class="date"><?php echo get_the_date('M j')?></span>
                                <span class="dot"></span> 
                                <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                            </li>
                            <li>By: <?php echo get_the_author_meta('first_name')?></li>
                        </ul>
                        <h2><?php the_title()?></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 35)?></p>
                    </article>
                    <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>

<!-- TRENDING -->
    <section class="trending py--10">
        <div class="container">
            <h2 class="block__header align--left">Hot Trending Arcticle</h2>
            <?php 
                    $trend = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'meta_key' => "group",
                        'meta_value' => "trend"
                    ))
                ?>
                <?php if($trend->have_posts()) : while($trend->have_posts()) : $trend->the_post()?>
            <div class="trending__card card card--full">
                <ul class="card__info--full">
                    <li><small><?php echo get_the_category()[0]->name?></small></li>
                    <li><span><?php echo get_the_date('m.j.y')?></span>  <span>by: <?php echo get_the_author_meta('first_name')?></span></li>
                </ul>
                <h3><?php the_title()?></h3>
                <?php 
                    if(has_post_thumbnail()) {
                    the_post_thumbnail();
                }?>
            </div>
            <?php 
            endwhile;
                else:
                    echo "no post";
            endif;
                    wp_reset_postdata();
            ?>
        </div>
    </section>

<!-- STORY -->
    <section class="story py--5">
        <div class="container">
            <h2 class="block__header align--center">The Latest Stories</h2>
            <div class="story__grid">
                <?php 
                    $grid1 = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'story-first',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($grid1->have_posts()) : while($grid1->have_posts()) : $grid1->the_post()?>
                <article class="card card--xs story-a">
                    <?php 
                        if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }?>
                    <ul class="card__info">
                        <li>
                            <span class="date"><?php echo get_the_date('M j')?></span>
                            <span class="dot"></span> 
                            <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                        </li>
                        <li>By: <?php echo get_the_author_meta('first_name')?></li>
                    </ul>
                    <h4><?php the_title()?></h4>
                </article>
                <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                ?>

                <?php 
                    $grid2 = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'story-mid',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($grid2->have_posts()) : while($grid2->have_posts()) : $grid2->the_post()?>
                <article class="card card--xs story-b">
                    <?php 
                        if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }?>
                    <ul class="card__info">
                        <li>
                            <span class="date"><?php echo get_the_date('M j')?></span>
                            <span class="dot"></span> 
                            <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                        </li>
                        <li>By: <?php echo get_the_author_meta('first_name')?></li>
                    </ul>
                    <h4><?php the_title()?></h4>
                </article>
                <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                ?>

                <?php 
                    $grid3 = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'story-second',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($grid3->have_posts()) : while($grid3->have_posts()) : $grid3->the_post()?>
                <article class="card card--xs story-c">
                    <?php 
                        if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }?>
                    <ul class="card__info">
                        <li>
                            <span class="date"><?php echo get_the_date('M j')?></span>
                            <span class="dot"></span> 
                            <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                        </li>
                        <li>By: <?php echo get_the_author_meta('first_name')?></li>
                    </ul>
                    <h4><?php the_title()?></h4>
                </article>
                <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                ?>

                <?php 
                    $grid4 = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'story-third',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($grid4->have_posts()) : while($grid4->have_posts()) : $grid4->the_post()?>
                <article class="card card--xs story-d">
                    <?php 
                        if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }?>
                    <ul class="card__info">
                        <li>
                            <span class="date"><?php echo get_the_date('M j')?></span>
                            <span class="dot"></span> 
                            <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                        </li>
                        <li>By: <?php echo get_the_author_meta('first_name')?></li>
                    </ul>
                    <h4><?php the_title()?></h4>
                </article>
                <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                ?>

                <?php 
                    $grid5 = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'group',
                                'value' => 'story-fourth',
                                'compare' => '='
                            )
                        ),
                    ))
                ?>
                <?php if($grid5->have_posts()) : while($grid5->have_posts()) : $grid5->the_post()?>
                <article class="card card--xs story-e">
                    <?php 
                        if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }?>
                    <ul class="card__info">
                        <li>
                            <span class="date"><?php echo get_the_date('M j')?></span>
                            <span class="dot"></span> 
                            <span class="time"><?php echo get_post_meta(get_the_ID() , 'reading', true)?></span> 
                        </li>
                        <li>By: <?php echo get_the_author_meta('first_name')?></li>
                    </ul>
                    <h4><?php the_title()?></h4>
                </article>
                <?php 
                    endwhile;
                        else:
                            echo "no post";
                    endif;
                        wp_reset_postdata();
                ?>

            </div>
        </div>
    </section>

<!-- SUBSCRIBE -->
    <section class="subscribe">
        <div class="container">
            <div class="subscribe__wrapper">
                <h2>Subscribe to get more</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, tempore magni voluptate quam illum id ad temporibus itaque fuga necessitatibus</p>

                <ul class="d--flex justify--center">
                    <li class="mx--1"><a href="#" class="btn btn--light">Subscribe Now</a></li>
                    <li class="mx--1"><a href="#" class="btn btn--outline">Leader More</a></li>
                </ul>
            </div>
        </div>
    </section>

<?php get_footer() ?>