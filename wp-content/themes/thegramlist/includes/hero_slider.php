<section id="hero">
<?php
global $template_url;
$hero_slides = get_field('slides');
if($hero_slides)
{
    echo '<div id="hero-carousel" style="background-color: #131C45; ">';
    foreach($hero_slides as $hero_slide)
    {   

        echo '<div class="slide"';
            // if( $hero_slide['slide_background_type'] == 'Image' ){
            // 	echo ' style="background-image:url('.$hero_slide['slide_background_image'].');" ';
            // }
            if( $hero_slide['slide_background_type'] == 'Color' ){
            	echo ' style="background-color:'.$hero_slide['slide_background_color'].';" ';
            } 
            echo '>';

            echo '<div class="max-width-container">';

                if( $hero_slide['slide_heading_image'] ){
                    echo '<img class="slide-heading-image" src="'.$hero_slide['slide_heading_image'].'" />';
                }

                if( $hero_slide['slide_heading'] ){
                    echo '<h1 class="slide-heading">'.$hero_slide['slide_heading'].'</h1>';
                }

                if( $hero_slide['slide_sub_heading'] ){
                    echo '<h2 class="slide-sub-heading">'.$hero_slide['slide_sub_heading'].'</h2>';
                }

                if( $hero_slide['slide_content'] ){
                    echo '<div class="slide-content">'.$hero_slide['slide_content'].'</div>';
                }

                if( $hero_slide['button_1_language'] || $hero_slide['button_2_language'] ) {
                    echo '<div class="slide-buttons">';
                        if( $hero_slide['show_button_1'] ){
                            echo '<a class="rotating-button" href="'.$hero_slide['button_1_link'].'"><span class="text" data-text="'.$hero_slide['button_1_language'].'">'.$hero_slide['button_1_language'].'</span></a>';
                        }
                        if( $hero_slide['show_button_2'] ){
                            echo '<a class="bordered-button" href="'.$hero_slide['button_2_link'].'">'.$hero_slide['button_2_language'].'</a>';
                        }
                    echo '</div>';
                }

            echo '</div>';

            echo '<div class="slide-image" style="background-image:url('.$hero_slide['slide_background_image'].');"></div>';
            
        echo '</div>';
    }
    echo '</div>';
}
?>

</section>