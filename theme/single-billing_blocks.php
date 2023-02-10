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
    .settings-icon{
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
    }
    .settings-icon svg{
        width: 50px;
        height: 50px;
        transition: 200ms ease;
    }
    .settings-icon svg:hover{
        transition: 200ms ease;
        transform: rotate(50deg);
    }
    .app{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .billing-block{
        position: relative;
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
        border: 2px solid #<?php if($color){echo $color;}else{echo "000000";} ;?>;
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
        color: #<?php if($color){echo $color;}else{echo "000000";} ;?>;
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
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    #previewImg canvas{
        display: none;
    }
    #previewImg a{
        background-color: #<?php if($color){echo $color;}else{echo "000000";} ;?>80;
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
        font-size: 50px; 
        font-family: <?php echo $font ;?>;
        text-transform: uppercase;
        letter-spacing: 15px;
    }
    #previewImg a:hover{
        opacity: 1;
        transition: 200ms ease;
    }
    .app{
        position: relative;
    }
    .bg{
        position: absolute;
        z-index: -1;
        height: 100vh;
        opacity: 0.3;
        overflow: hidden;
    }
    .bg img{
        object-fit: cover;
        width: 100%;
    }
</style> 
<div class="popup">
    <div class="settings">
        <h1 class="heading" >Settings</h1>
        <?php acf_form(); ?>
    </div>
    <div class="cross">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M16,0C11.726,0,7.708,1.664,4.687,4.687C1.665,7.708,0,11.727,0,16s1.665,8.292,4.687,11.313 C7.708,30.336,11.726,32,16,32s8.292-1.664,11.313-4.687C30.335,24.292,32,20.273,32,16s-1.665-8.292-4.687-11.313 C24.292,1.664,20.274,0,16,0z M26.606,26.606C23.773,29.439,20.007,31,16,31s-7.773-1.561-10.606-4.394S1,20.007,1,16 S2.561,8.227,5.394,5.394S11.993,1,16,1s7.773,1.561,10.606,4.394S31,11.993,31,16S29.439,23.773,26.606,26.606z"></path> <path fill="#ffffff" d="M22.01,9.989c-0.195-0.195-0.512-0.195-0.707,0L16,15.293l-5.303-5.304c-0.195-0.195-0.512-0.195-0.707,0 s-0.195,0.512,0,0.707L15.293,16L9.99,21.304c-0.195,0.195-0.195,0.512,0,0.707c0.098,0.098,0.226,0.146,0.354,0.146 s0.256-0.049,0.354-0.146L16,16.707l5.303,5.304c0.098,0.098,0.226,0.146,0.354,0.146s0.256-0.049,0.354-0.146 c0.195-0.195,0.195-0.512,0-0.707L16.707,16l5.303-5.304C22.206,10.501,22.206,10.185,22.01,9.989z"></path> </g> </g></svg>
    </div>
</div>
<div class="app">
        <div class="bg">
            <img src="http://html-to-image-app.local/wp-content/uploads/2023/02/grid-bg.jpg" alt="">
        </div>
        <div class="settings-icon">
            <svg fill="#3c9fe7" height="200px" width="200px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M29.6,12.7c-0.1-0.5-0.6-0.8-1.1-0.8c-1.2,0.2-2.4-0.4-3-1.5c-0.6-1-0.5-2.4,0.2-3.3c0.3-0.4,0.3-1-0.1-1.3 C24,4.3,22.1,3.2,20,2.6c-0.5-0.1-1,0.1-1.2,0.6C18.3,4.3,17.2,5,16,5s-2.3-0.7-2.8-1.8C13,2.7,12.5,2.4,12,2.6 C9.9,3.2,8,4.3,6.4,5.9C6,6.2,6,6.8,6.3,7.2c0.7,1,0.8,2.3,0.2,3.3c-0.6,1-1.8,1.6-3,1.5c-0.5-0.1-1,0.3-1.1,0.8 C2.1,13.8,2,14.9,2,16s0.1,2.2,0.4,3.3C2.5,19.8,3,20.1,3.5,20c1.2-0.2,2.4,0.4,3,1.5c0.6,1,0.5,2.4-0.2,3.3c-0.3,0.4-0.3,1,0.1,1.3 c1.6,1.5,3.6,2.7,5.7,3.3c0.5,0.1,1-0.1,1.2-0.6c0.5-1.1,1.6-1.8,2.8-1.8s2.3,0.7,2.8,1.8c0.2,0.4,0.5,0.6,0.9,0.6 c0.1,0,0.2,0,0.3,0c2.1-0.6,4.1-1.8,5.7-3.3c0.4-0.4,0.4-0.9,0.1-1.3c-0.7-1-0.8-2.3-0.2-3.3c0.6-1,1.8-1.6,3-1.5 c0.5,0.1,1-0.3,1.1-0.8c0.3-1.1,0.4-2.2,0.4-3.3S29.9,13.8,29.6,12.7z M16,20c-2.2,0-4-1.8-4-4s1.8-4,4-4s4,1.8,4,4S18.2,20,16,20z"></path> </g></svg>
        </div>
        <div class="billing-block">
            <div class="inner">
                <div id="billing-block-container" class="billing-block-container">
                    <?php 
                    if ($lines){
                        foreach($lines as $line){
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
                    }}?>
                </div>
            </div>
            <div id="previewImg">
            
            </div>
        </div>
    </div>

    <script>

        // image
        
        $(document).ready(function(){
            html2canvas(document.getElementById("billing-block-container"),{
                backgroundColor: null,
                scale: 2
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
        $(".acf-form-submit input").click(function(){
            html2canvas(document.getElementById("billing-block-container"),{
                backgroundColor: null,
                scale: 2
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
        
        // popup close
        $(".settings-icon").click(function(){
            $(".popup").fadeIn(200);
            $(".popup").css("display","flex");
        })
        $(".cross").click(function(){
            $(".popup").fadeOut(200);
        })
    </script>

    <!-- Anas 1 (SVG Error) ------------------------------------------------------ -->
    
    <!-- <script src="../dom-to-image.js"></script> -->
    <!-- <script>
        let text = document.getElementById('billing-block-container');
        let download = document.getElementById('download');

        download.addEventListener("click",()=>{
            domtoimage.toSvg(text).then((data)=>{
                let link = document.createElement("a");
                link.download = "text.svg";
                link.href = data;
                link.click();
            })
        });
    </script> -->

    <!-- Anas 2 (nehh, doesnt convert already created canvases)---------------------------------------------------------------------- -->
    
    <!-- <script src="../html2canvas.js"></script>
    <script src="../canvas2svg.js"></script> -->
    <!-- <script>
        const text = document.querySelector('#billing-block-container');
        html2canvas(text).then(function(canvas){
            document.querySelector(".result").append(canvas);
            //make a mock canvas context using canvas2svg. We use a C2S namespace for less typing:
            var ctx = new C2S(500,500); //width, height of your desired svg file
            //do your normal canvas stuff:
            //ok lets serialize to SVG:
            ctx.canvas = canvas
            var myRectangle = ctx.getSerializedSvg(true); //true here will replace any named entities with numbered ones.
            //Standalone SVG doesn't support most named entities.
            console.log(myRectangle);
            canvas.getContext("2d").imageSmoothingEnabled = false;
            console.log(canvas.getContext("2d"));
            console.log(ctx);
        });


    </script> -->

    <!-- the legend of the guy who got lucky but no one knows how -->
<!-- 
    <script>
        var fauxCanvas = {   
            ctx: new C2S(1456,232),
            getContext: function(){
                return this.ctx;
               },   
            style: {},
            ownerDocument: document 
        }; 
        html2canvas(document.getElementById("billing-block-container"),{
                canvas: fauxCanvas,  
        }).then(function(canvas){
            // document.querySelector(".result").append(canvas);
            console.log(canvas.getContext());
        });
        html2canvas(domNode, {canvas: fauxCanvas}).then(function(canvas){
            document.querySelector(".result").append(canvas);})
    </script> -->

    <!-- Anas 3 (man idek at this point wtf is happening its generating the svg but its like the gayest most useless svg you'll ever see its like messed up spaces and fromat and shit idk man) -->

    <!-- <script>
    var node = document.getElementById('billing-block-container');

    // domtoimage.toPng(node)
    domtoimage.toSvg(node)
    .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            document.body.appendChild(img);
            document.body.appendChild(img);
            var anchorTag = document.createElement("a");
            document.getElementById("previewImg").appendChild(anchorTag);
            anchorTag.download = "text.svg";
            anchorTag.href = dataUrl;
            anchorTag.innerHTML = "Download Image";
            anchorTag.target = '_blank';
    })
    .catch(function (error) {
        console.error('oops, something went wrong!', error);
    });
    </script> -->

<?php get_footer()?>

