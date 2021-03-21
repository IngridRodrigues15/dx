$(document).ready(function() {
    
	// Carrega o upload de imagens do mapa
	$('#filer_input').filer({
		limit: 1,
		maxSize: 2,
		extensions: ["jpg", "png", "gif"],
		showThumbs: true,
		captions: {
			button: "Escolher Imagem",
			feedback: "Escolha uma imagem para o mapa",
			feedback2: "Imagem escolhida",
			removeConfirmation: "Tem certeza que quer remover essa imagem?",
			errors: {
				filesLimit: "Apenas arquivos {{fi-limit}} são permitidos",
				filesType: "Apenas imagens são permitidas :(",
				filesSize: "{{fi-name}} é muito grande! Por favor escolha uma imagem com no maximo 2 MB.",
				folderUpload: "Você não tem permissão para fazer upload de pastas. Escolha uma imagem."
			}
		}
	});       

});
