<style>
@font-face {

}
* {
}
#bannieres {
}
#slideshow {

}
#slideshow * {
    cursor : pointer;
    margin-top: 10px;
    margin-left: 10px;
}
#slideshow a {
    width : 855px;
    height : 250px;
    position : absolute;
    z-index : 0;
    top : 0;
    left : 0;
}
#slideshow a.active {
    z-index : 1;
}
#slideshow img {
    float : left;
}
#slideshow h4 {
    position : absolute;
    bottom : 0;
    left : 0;
    width : 854px;
    height : 40px;
    bottom: -42px;
    line-height : 40px;
    vertical-align : middle;
    font-family : EpicFusion;
    font-size : 23px;
    background-color : rgba(0,0,0,0.5);
    font-weight : normal;
    color : #ff8811;
    padding : 0 20px 0;
}
#slideshow ul {
    position : absolute;
    top : 15px;
    left : 25px;
    width : 800px;
    height : 20px;
    z-index : 2;
    text-align : center;
}

#slideshow li {
    display : inline-block;
    height : 20px;
    width : 20px;
    border : 2px solid #808080;
    background-color : rgba(255,136,17);
    margin : 0 5px;
    transition : border-color 0.5s, background-color 0.5s;
    -webkit-transition : border-color 0.5s, background-color 0.5s;
}
#slideshow li.active {
    border-color : #ff8811;
}
#slideshow li:hover {
    background-color : #ffffff;
}
#slideshow button {
    position : absolute;
    top : 0;
    width : 100px;
    height : 210px;
    opacity : 0;
    z-index : 2;
    transition : opacity 0.5s;
    -webkit-transition : opacity 0.5s;
    background-color : rgba(0,0,0,0.5);
    border : none;
}
#slideshow button:hover {
    opacity : 1;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    var pos = 0;
    var timer = null;
    var li = $('#slideshow li');
    var slides = $('#slideshow a');
    var nb = slides.length-1;
    li.bind('click', direct);
    $('#slideshow button.next').bind('click', next);
    $('#slideshow button.previous').bind('click', previous);
    function direct() {
        if(pos != li.index(this)) {
            clearTimeout(timer);
            pos = li.index(this);
            updatePos();
        }
    }

    function next() {
        clearTimeout(timer);
        nextTimer();
    }
    function nextTimer() {
        if(pos == nb)
             pos = 0;
        else pos++;
        updatePos();
    }
    function updatePos() {
        li.removeClass('active').eq(pos).addClass('active');
        slides.removeClass('active').eq(pos).hide().appendTo(slides.parent()).addClass('active').fadeIn(0);
        timer = setTimeout(nextTimer, 5000);
    }
    updatePos();
});
</script>
<div id="bannieres">
<?php $bannieres = $this->requestAction(array('controller' => 'bannieres', 'action' => 'element_sidebar','plugin' => 'article','admin'=>false)); ?>
    <body id="noJS"><script type="text/javascript">document.body.id='JS';</script>
        <div id="slideshow">
            <ul>
    <?php foreach ($bannieres as $banniere): ?>
                <li></li>
    <?php endforeach; ?>
            </ul>
    <?php foreach($bannieres as $k=>$v): $v = current($v); ?>
            <a href="<?php echo $v['link']; ?>">
                <img src="<?php echo $this->html->url('/files/banniere/photo/'.($v['photo_dir'].'/'.$v['photo'])); ?>" />
                <h4><?php echo $v['bannieres_title']; ?></h4>
            </a>
    <?php endforeach; ?>
        </div>
    </body>
</div>