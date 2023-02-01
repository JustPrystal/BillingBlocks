<?php
    global $post; 
    get_header();
    
    $lines = get_field("lines", $post->ID);
?>
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
    <div id="previewImg">

    </div>
    <script>
        $(document).ready(function(){
            console.log(document);
            html2canvas(document.getElementById("billing-block-container"),{
                backgroundColor: null
            }).then(function(canvas) {
                console.log(canvas);
                var anchorTag = document.createElement("a");
                document.getElementById("previewImg").appendChild(anchorTag);
                document.getElementById("previewImg").appendChild(canvas);
                anchorTag.download = "filename.png";
                anchorTag.href = canvas.toDataURL('image/png');
                anchorTag.innerHTML = "Download";
                anchorTag.target = '_blank';
            });
        })  
    </script>
<?php get_footer()?>

