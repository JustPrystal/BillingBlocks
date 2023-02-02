<?php
    global $post; 
    get_header();
    $font  = get_field("font_family", $post->ID);
    $color  = get_field("color", $post->ID);
    $line_height  = get_field("line_height", $post->ID);
    $letter_spacing  = get_field("letter_spacing", $post->ID);
    $content_styles  = get_field("content_styles", $post->ID);
    $lines = get_field("lines", $post->ID);
?>
<style>
body{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.billing-block .inner {
    height: 100%;
    max-width: 1660px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
}
.billing-block .inner .billing-block-container {
    border: 2px solid <?php if($color){echo $color;}else{echo "#000000";} ;?>;
    width: 100%;
    padding: 20px; 
}
.billing-block .inner .billing-block-container .line-item {
    display: flex;
    justify-content: center;
    align-items: flex-end; 
    margin-bottom:<?php if($line_height){echo $line_height;}else{echo "-3";} ;?>px;
}
.billing-block .inner .billing-block-container .line-item .text-item {
    white-space: nowrap;
    font-family: <?php echo $font ;?>; 
    color: <?php if($color){echo $color;}else{echo "#000000";} ;?>;
    margin-right: <?php if($letter_spacing){echo $letter_spacing;}else{echo "6";} ;?>px;
}
.billing-block .inner .billing-block-container .line-item .text-item:last-child{
    margin-right:0;
}
.billing-block .inner .billing-block-container .line-item .text-item.sbt {
    font-size: <?php if($content_styles["single_line_big_text"]["font_size"]){echo $content_styles["single_line_big_text"]["font_size"] ;}else{ echo "40";}?>px;
    line-height: <?php if($content_styles["single_line_big_text"]["line_height"]){echo $content_styles["single_line_big_text"]["line_height"] ;}else{ echo "50";}?>px;
    letter-spacing: <?php if($content_styles["single_line_big_text"]["letter_spacing"]){echo $content_styles["single_line_big_text"]["letter_spacing"] ;}else{ echo "-0.5";}?>px;
}
.billing-block .inner .billing-block-container .line-item .text-item.sst {
    font-size: <?php if($content_styles["single_line_small_text"]["font_size"]){echo $content_styles["single_line_small_text"]["font_size"] ;}else{ echo "19";}?>px;
    line-height: <?php if($content_styles["single_line_small_text"]["line_height"]){echo $content_styles["single_line_small_text"]["line_height"] ;}else{ echo "31";}?>px;
    letter-spacing: <?php if($content_styles["single_line_small_text"]["letter_spacing"]){echo $content_styles["single_line_small_text"]["letter_spacing"] ;}else{ echo "-0.25";}?>px;
}
.billing-block .inner .billing-block-container .line-item .text-item.dst{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}
.billing-block .inner .billing-block-container .line-item .text-item.dst .dst-line {
    font-size: <?php if($content_styles["dual_line_small_text"]["font_size"]){echo $content_styles["dual_line_small_text"]["font_size"] ;}else{ echo "19";}?>px;
    line-height: <?php if($content_styles["dual_line_small_text"]["line_height"]){echo $content_styles["dual_line_small_text"]["line_height"] ;}else{ echo "17";}?>px;
    letter-spacing: <?php if($content_styles["dual_line_small_text"]["letter_spacing"]){echo $content_styles["dual_line_small_text"]["letter_spacing"] ;}else{ echo "0";}?>px;
}
.billing-block .inner .billing-block-container .line-item .text-item.dst .bottom-text {
    padding-bottom: 7px; 
}

#previewImg{
    display: flex;
    flex-direction: column;
    align-items: center;
}
#previewImg canvas{
    display: none;
}
#previewImg a{
    background-color: <?php if($color){echo $color;}else{echo "#000000";} ;?>80;
    z-index: 1; 
    transition: 200ms ease;
    position: absolute;
    display: flex;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0;
    color: white;
    text-decoration: none;
    font-size: 100px; 
    font-family: <?php echo $font ;?>;
    text-transform: uppercase;
    letter-spacing: 25px;
}
#previewImg a:hover{
    opacity: 1;
    transition: 200ms ease;
}
.app{
    position: relative;
}
</style>
    <div class="app">
        <div class="billing-block">
            <div class="inner">
                <div id="billing-block-container" class="billing-block-container">
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
                                                <div class="top-text dst-line"><?php echo $text['text_field']; ?></div>
                                                <div class="bottom-text dst-line"><?php echo $text['second_line_text']; ?></div>
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
        <div id="previewImg">

        </div>
    </div>
    <script>
        $(document).ready(function(){
            html2canvas(document.getElementById("billing-block-container"),{
                backgroundColor: null
            }).then(function(canvas) {
                var anchorTag = document.createElement("a");
                document.getElementById("previewImg").appendChild(anchorTag);
                document.getElementById("previewImg").appendChild(canvas);
                anchorTag.download = "filename.png";
                anchorTag.href = canvas.toDataURL('image/png');
                anchorTag.innerHTML = "Download Image";
                anchorTag.target = '_blank';
            });
        })  
    </script>
<?php get_footer()?>

