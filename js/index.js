$(function(){
    atualizaFeed();
});
function atualizaFeed(){
    $.ajax({
        url:"php/index.php",
        method:'post',
        success: function(res){
            sessionStorage.setItem('data', res);
            var response = JSON.parse(res);
            var html = "";
            if(response.length > 0){
                $("#no-news").hide();
                $("#feed").show();
                var row = $("#feed").find('div.row');
                response.forEach(element => {
                    console.log(response);
                    
                    html = "\
                    <div class='col-4'>\
                        <h4>"+element.titulo+"</h4>\
                        <img src='php/imgs/"+element.img+"' style='width:250px;'>\
                        <h6>Autor: "+element.autor+"</h6>\
                        <h6>Data: "+element.data+"</h6>\
                        <p>"+element.descricao.substr(0,150)+"</p>\
                        <p><a class='btn btn-info' href='visualizar.html?id="+element.ID+"' role='button'>Ver mais</a></p>\
                    </div>";

                    row.append(html);
                });
            }else{
                $("#no-news").html("Nenhuma notícia disponível");
                $("#no-news").show();
                $("#feed").hide();
            }
        },
        error: function(error, xhr, status){
            console.log(error, xhr, status);
        }
    });
}