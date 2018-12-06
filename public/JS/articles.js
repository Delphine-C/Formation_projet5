$(document).ready(function() {
    //Event sur l'affichage des articles
    $('#displayArticle').on("change", function () {
        //Variables
        var content = $('#displayArticle');
        console.log(content.val());
        //Methode ajax vers le ControllerPrice
        $.ajax({
            url: 'jquery-display-article',
            method: 'GET',
            data: "display=" + content.val(),
            success: function (data) {
                if(content.val() === 'user'){
                    $('#admin').hide();
                    $('#user').show();
                }else{
                    console.log(data);
                    $('#admin').html(data);
                    $('#user').hide();
                    $('#admin').show();
                }

            }
        })

    });
})