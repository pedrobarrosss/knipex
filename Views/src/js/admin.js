$(document).ready(function(){
	var open_painel_controle = true;

	$(".menu-painel-item").click(function(){
		if (open_painel_controle == true) {
			$(".block-left").css('width' , '0');
			$(".block-right").css('width' , '100%');
			$(".menu-painel-item").html("&#xf152");
			open_painel_controle = false;
		}else{
			$(".block-left").css('width' , '20%');
			$(".block-right").css('width' , '80%');
			$(".menu-painel-item").html("&#xf191");
			open_painel_controle = true;
		}
	});
	var open_painel_post = true;
	$(".icon-button").click(function(){
		if (open_painel_post == true) {
			$(".block-two").css('width' , '0').css("display" , "none");
			$(".block-one").css('width' , '100%');
			$(".icon-button").html("&#xf191");
			open_painel_post = false;
		}else{
			$(".block-two").css('width' , '20%').css("display" , "block");
			$(".block-one").css('width' , '80%');
			$(".icon-button").html("&#xf152");
			open_painel_post = true;
		}
	});

	var open_posts = false;
	$(".posts-title").click(function(){
		if (open_posts == false) {
			$(".option-content-posts").css("display" , "block");
			$(".posts-title i").html("&#xf077");
			open_posts = true;
		}else{
			$(".option-content-posts").css("display" , "none");
			$(".posts-title i").html("&#xf078");
			open_posts = false;
		}
	});




	$(".editor-container").keydown(function(e){
			var titulo = $(".titulo-post").val();
			var content = $(".ck-content").html();
			var categoria = $(".select-categoria").val();
			var tags = $(".tags-value").val();
			var id = $("#id").val();
			var valores = {
			     	action : "updatePost",
			        id : id,
			        content : content,
			        titulo : titulo,
			        categoria : categoria,
			        tags : tags,
			        pdo_connect : "savePosts",
	          		metodo_pdo : "postsMetodos"
			}
			$.ajax({
			     url : includePath+"/Models/PDO/pdo.php",
			     type : 'post',
			     data : valores,
			     beforeSend : function(){
			          $(".status-post").html("<h4>Salvando...</h4>");
			     },
			     success : function(valor){
			     	console.log(valor);
			     	if(valor){
						 $(".status-post").html("<h4 style='color: #0eeb3a;' class='fa'>Salvo &#xf058</h4>");
					}else{
						// alert("ERRO");
					}
				} 
			});
	});
});