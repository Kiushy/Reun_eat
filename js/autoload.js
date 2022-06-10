$(document).ready(function(){
    setInterval(check_message, 5000);
});

function check_message(){
    var nb_non_lu = $('#unread_mail').text();
    if(nb_non_lu.length>0)
        url_ajax = 'index.php?to=ajax_common&_ajax_action=check_message&notif='+nb_non_lu;
    else
        url_ajax = 'index.php?to=ajax_common&_ajax_action=check_message&notif=0';

    $.ajax({
        url : url_ajax,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            Xfill(code_html);
        }
    });
}
