<section id="the-effect" class="explore">
    <div class="max-width-container">
    <h2 class="heading"><?php echo get_field('gramlist_effect_heading'); ?></h2>
    <?php
    $gramlist_degrees = get_field('gramlist_degrees');
    $degree_index = 1;
    if($gramlist_degrees): ?>
        <ul id="degrees-list">
        <?php foreach($gramlist_degrees as $gramlist_degree) { ?>
            <li class="degree-<?php echo $degree_index; ?>">
                <div class="degree-wrapper">
                    <span class="icon">
                        <?php include('svg/degrees/degree_icon_'.$degree_index.'.svg');?>
                    </span>
                    <h3 class="title"><?php echo $gramlist_degree['title']; ?></h3>
                    <div class="text"><?php echo $gramlist_degree['text']; ?></div>         
                </div>
            </li>
        <?php 
        $degree_index ++;
        } ?>
        </ul>
    <?php endif; ?>
</div>
</section>