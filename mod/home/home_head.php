<title>Reun'eat</title>

<style type="text/css">

</style>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.ajax.js"></script>

<script type="text/javascript">
     _post_onload.URL = 'index.php?to=ajax_home';
//parallaxe sourie    
//https://codepen.io/oscicen/pen/zyJeJw

$().ready(function() {
    // Add event listener
    document.addEventListener("mousemove", parallax);
    const elem = document.querySelector("#parallax");
    // Magic happens here
    function parallax(e) {
        let _w = window.innerWidth/2;
        let _h = window.innerHeight/2;
        let _mouseX = e.clientX;
        let _mouseY = e.clientY;
        let _depth1 = `${50 - (_mouseX - _w) * 0.01}% ${50 - (_mouseY - _h) * 0.01}%`;
        let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
        let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
        let x = `${_depth3}, ${_depth2}, ${_depth1}`;
        console.log(x);
        elem.style.backgroundPosition = x;
    }
    function(){
        _ajax_post('mea');
    }
})();

    $().ready(function(){
    });

    function mea(sens){
        _post.sens = sens;
        _ajax_post('mea');
    }

</script>