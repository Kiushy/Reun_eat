<title>Gestion des Sessions - Web DEV [0222]</title>
<script type="text/javascript">
    $().ready(function () {

    });
</script>
<style type="text/css">
    .zone_login{
        padding: 10px;
        font-family: arial;
        font-size: 12px;
        color: black;
        text-align: center;
        min-width:320px;
        height: 450px;
        background-color: rgba(255,255,255,0.8);
        border: 1px solid rgba(255,255,255,0.8);
        border-radius: 3px;
        position: absolute;
        top: calc( (100vh - 220px) / 4);
        left: calc( (100vw - 320px) / 2);
        z-index: 10000;
        box-shadow: 1px 1px 12px #555;
    }

    .zone_login h1{
        margin-top: 80px;
        margin-bottom: 40px;
    }

    .zone_login input[type="button"],
    .zone_login input[type="submit"]{
        background: #018dc3;
        padding: 8px 20px 8px 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        font: normal 30px 'Bitter', serif;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        border: 1px solid #666666;
        font-size: 15px;
        margin-top: 40px;
    }
    .zone_login input[type="button"]:hover,
    .zone_login input[type="submit"]:hover{
        background: #00a7e7;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
    }

    .zone_login input[type="text"],
    .zone_login input[type="password"]{
        text-align: center;
        display: block;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 90%;
        margin: auto;
        padding: 8px;
        border-radius: 6px;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border: 2px solid #fff;
        box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    }
    .login_ok{
        width: 70%;
        margin:auto;
        height: 40px;
        line-height: 40px;
        background-color: rgba(0,255,0,0.4);
        border: 1px solid rgba(0,255,0,0.6);
        color: black;
        border-radius: 5px;
        text-align: center;
    }
    .login_ko{
        width: 100vw;
        margin:auto;
        height: 40px;
        line-height: 40px;
        background-color: rgba(255,0,0,0.4);
        border: none;
        border-bottom: 1px solid rgba(255,0,0,0.6);
        color: white;
        font-size: 20px;
        text-align: center;
    }
</style>
