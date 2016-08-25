            <div class="mobile-navigation-wrapper-outer mb1">            
                <div class="mobile-navigation-wrapper">
                    <div class="mobile-navigation-wrapper-inner">                    
                        <ul id="mobile-navigation" class="">
                        <?php
                        $menuitems = wp_get_nav_menu_items( 'Header Navigation', array( 'order' => 'DESC' ) );
                        foreach( $menuitems as $item ) {
                            $title = $item->title;
                            $link = $item->url;
                            ?>
                            <li class="<?php echo ($title == 'Lists') ? '' : 'menu-item'; ?>">
                                <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                <?php
                                if( $title == 'Lists' ){
                                    include('category_submenu.php');
                                }
                                ?>
                            </li>
                            <?php
                        }
                        ?>
                        </ul> 
                    </div>                
                </div>
            </div>