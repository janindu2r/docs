<?php if ( $docs ) : ?>


<div class="wedocs-shortcode-wrap">
    <ul class="wedocs-docs-list col-<?php echo $col; ?>">

        <?php foreach ($docs as $main_doc) : ?>
            <li class="wedocs-docs-single">
                <?php
                $thumb_id = get_post_thumbnail_id($main_doc['doc']->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_id, true);
                ?>

                <?php 
                if($thumb_url):?>
                <img src="<?php echo $thumb_url[0]; ?>" class="doc-logo" />
                
                <?php endif; ?>
                <h3><a href="<?php echo get_permalink( $main_doc['doc']->ID ); ?>"><?php echo $main_doc['doc']->post_title; ?></a></h3>

                <?php if ( $main_doc['sections'] ) : ?>

                    <div class="inside">
                        <ul class="wedocs-doc-sections">
                            <?php foreach ($main_doc['sections'] as $section) : ?>
                                <li><a href="<?php echo get_permalink( $section->ID ); ?>"><?php echo $section->post_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                <?php endif; ?>

                <div class="wedocs-doc-link">
                    <a href="<?php echo get_permalink( $main_doc['doc']->ID ); ?>"><?php echo $more; ?></a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php endif;