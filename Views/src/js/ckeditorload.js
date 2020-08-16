$(document).ready(function(){

loadCategorias();
loadPost();
carregarEditor();

function carregarEditor(){
	ClassicEditor
			.create( document.querySelector( '.editor' ), {
				ckfinder: {
		           uploadUrl: 'https://programacaoa2.com/blog/Views/pages/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		        },
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo',
						'codeBlock',
						'alignment',
						'fontBackgroundColor',
						'exportPdf',
						'code',
						'fontColor',
						'highlight',
						'fontFamily',
						'fontSize',
						'ChemType',
						'MathType',
						'horizontalLine',
						'restrictedEditingException',
						'specialCharacters',
						'strikethrough',
						'subscript',
						'underline',
						'todoList',
						'superscript',
						'CKFinder'
					]
				},
				language: 'pt-br',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
				$(".status-post").html("<h4 style='color: #0eeb3a;' class='fa'>Salvo &#xf058</h4>");
		     	$(".load").css("display", "none");
		     	$(".content-edition").css("display" , "block");
				
				
			} )
			.catch( error => {
				console.error( 'Oops, something gone wrong!' );
				console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
				console.warn( 'Build id: 79gvil9c01x3-29ircbxwhx1l' );
				console.error( error );
			} );
			
}

function loadPost(){
	var id = $("#id").val();
	$.ajax({
		     url : includePath+"/Models/PDO/pdo.php",
		     type : 'post',
		     dataType : 'json',
		     data : {
		     	action : "carregarUmPost",
		        id : id,
		        pdo_connect : "carregarPost",
	          	metodo_pdo : "postsMetodos"
		     },
		     beforeSend : function(){
		          
		     },
		     success : function(valor){
		     	valor['post_content'] = valor[0]['post_content'].replace('&', '&amp;');
		     	$(".titulo-post").val(valor[0]['post_title']);
		     	$("div#editor").html(valor[0]['post_content']);
		     	$(".tags-value").val(valor[0]['post_tags']);
		     	if (valor[0]['post_img'] == "") {
		     		$(".thumb").attr("src",includePathFull+"img/thumb-posts/img-not-found.png");
		     	}else{
		     		$(".thumb").attr("src",includePathFull+"img/thumb-posts/"+valor[0]['post_img']);
		     	}
			} 
	});
}

function loadCategorias(){
	var id = $("#id").val();
	$.ajax({
		     url : includePath+"/Models/PDO/pdo.php",
		     type : 'post',
		     dataType : 'html',
		     data : {
		     	action : "carregarCategoriasSelect",
		     	id : id,
		     	pdo_connect : "carregarPost",
	          	metodo_pdo : "postsMetodos"
		     },
		     beforeSend : function(){
		          
		     },
		     success : function(valor){
		     	$(".select-categoria").append(valor);
			} 
	});
}


var openCategorias = false;
$(".title-painel-categorias").click(function(){

	if (openCategorias) {
		$(".content-categorias").css("display" , "none");
		openCategorias = false;
	}else{
		$(".content-categorias").css("display" , "block");
		openCategorias = true;
	}


});

var openData = false;
$(".title-painel-data").click(function(){

	if (openData) {
		$(".content-data").css("display" , "none");
		openData = false;
	}else{
		$(".content-data").css("display" , "block");
		openData = true;
	}


});

var openTags = false;
$(".title-painel-tags").click(function(){

	if (openTags) {
		$(".content-tags").css("display" , "none");
		openTags = false;
	}else{
		$(".content-tags").css("display" , "block");
		openTags = true;
	}


});

$("#imagem").change(function(e){
	const file = $(this)[0].files[0];
	const fileReader = new FileReader();
	fileReader.onloadend = function(){
		$(".thumb").css("display" , "block");
		$('.thumb').attr("src",fileReader.result);
		$('#img-thumb-file').val(fileReader.result);
		$("label.fa").css("opacity" , "0");
		salvarImagem();
	}
	fileReader.readAsDataURL(file);
		

	function salvarImagem(){
		// Captura os dados do formulário
		if (e.target.files != null && e.target.files.length > 0) {
			// Instância o FormData passando como parâmetro o formulário
		var arquivo = e.target.files[0];
		var formData = new FormData();
		formData.append('imagem',arquivo);
		// Envia O FormData através da requisição AJAX
			$.ajax({
			   url: includePath+"/Models/PDO/saveImagem.php",
			   type: "POST",
			   data: formData,
			   dataType: 'html',
			   processData: false,  
			   contentType: false,
			   success: function(valor){
		   			salvarImagemNoBanco(valor);
		   	   }
			});
		}
		
	}

	function salvarImagemNoBanco(nameImg){
		var values = {
			action : 'somarNumeros',
			pdo_connect : 'calculadoraPdo',
			val1 : 1,
			val2 : 2
		}
		var nameImg = nameImg;
		var id = $("#id").val();
		var action = "salvarNomeImg";
		$.ajax({
		   url: includePath+"/Models/PDO/pdo.php",
		   type: "POST",
		   data: values,
		   dataType: 'html',
		   success: function(valor){
	   			
	   	   }
		});

	}
		
});



});