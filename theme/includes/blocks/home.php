<div class="home">
    <div class="bg">
        <img src="http://html-to-image-app.local/wp-content/uploads/2023/02/grid-bg.jpg" alt="">
    </div>
    <div class="heading-box">
        <h3 class="heading">
            Create a New Text
        </h3>
    </div>
    <div class="newpost-options">
        <?php    
            acf_form(array(
                'post_id'       => 'new_post',
                'post_title'    => true,
                'new_post'      => array(
                    'post_type'     => 'billing_blocks',
                    'post_status'   => 'publish'
                ), 
                'return'        => '%post_url%'    
            ));
        ?>
    </div>
</div>
