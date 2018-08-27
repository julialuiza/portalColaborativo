$(function(){
    renderNoticia();
});

function renderNoticia(){
    var data = JSON.parse(sessionStorage.getItem('data'));
    var param = location.search.split('id=')[1];
    data.forEach(element => {
        if(element.ID == param){
            $("#img").attr("src","php/imgs/"+element.img);
            $("#titulo").html(element.titulo);
            $("#autor").html("Autor: "+element.autor);
            $("#data").html(element.data);
            $("#descricao").html(element.descricao);
        }
    });
    
}