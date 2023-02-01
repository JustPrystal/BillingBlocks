<?php
    global $post; 
    get_header();
    
    $lines = get_field("lines", $post->ID);
?>
    <div class="billing-block">
        <div class="inner">
            <div class="billing-block-container">
                <?php foreach($lines as $line){
                    ?>
                        <div class="line-item">
                            <?php foreach( $line['text_item'] as $text){?>
                                <div class="text-item <?php echo $text['text_type']['value']; ?>">
                                    <?php if($text['text_type']['value'] == "sbt"){
                                        echo $text['text_field'];
                                    }
                                    else if($text['text_type']['value'] == "sst"){
                                        echo $text['text_field'];
                                    }
                                    else if($text['text_type']['value'] == "dst"){
                                        ?>
                                            <div class="top-text"><?php echo $text['text_field']; ?></div>
                                            <div class="bottom-text"><?php echo $text['second_line_text']; ?></div>
                                        <?php
                                    }?>
                                </div>
                            <?php }?>
                        </div>
                    <?php 
                }?>
            </div>
        </div>
    </div>
<?php get_footer()?>