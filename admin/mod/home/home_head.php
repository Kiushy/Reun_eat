<title>Accueil Web DEV [Qualif]</title>

<style type="text/css">
    .zone_accueil{
        width:50vw;
        margin: auto;
        margin-top: 100px;
        font-size: 40px;
        color: #FFFFFF;
        text-align: center;
    }
    .zone_reception_ajax{
        width:50vw;
        margin: auto;
        margin-top: 100px;
        text-align: center;
        background-color: rgba(255,255,255,0.4);
        border: 1px solid rgba(255,255,255,0.7);
        border-radius: 1px;
    }
</style>

<script type="text/javascript">
    _post_onload.URL = 'index.php?to=ajax_home';

    function first_ajax(){
        _ajax_post('first_ajax');
    }

    function second_ajax(){
        var content_input = $('#zone_texte_ajax').val();
        _post.inputSecond = content_input;
        _ajax_post('second_ajax');
    }
</script>