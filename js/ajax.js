$(document).ready(function() {
    listar();
	
} );


function excluir(id, nome){
    $('#id-excluir').val(id);
    $('#nome-excluido').text(nome);
    var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), {       });
    myModal.show();
    $('#mensagem-excluir').text('');
}



function inserir(){
    $('#mensagem').text('');
    $('#tituloModal').text('Inserir Registro');
    var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {       });
    myModal.show();
    limparCampos();
}



$("#form").submit(function () {
	event.preventDefault();
	var formData = new FormData(this);

	$.ajax({
		url: pag + "/inserir.php",
		type: 'POST',
		data: formData,

		success: function (mensagem) {
            $('#mensagem').text('');
			$('#mensagem').removeClass()
			if (mensagem.trim() == "Salvo com Sucesso") {
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    listar();
                } else {

                	$('#mensagem').addClass('text-danger')
                    $('#mensagem').text(mensagem)
                }

               
            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

});



function listar(){
    $.ajax({
        url: pag + "/listar.php",
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",

        success:function(result){
            $("#listar").html(result);
        }
    });
}




$("#form-excluir").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: pag + "/excluir.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-excluir').text('');
            $('#mensagem-excluir').removeClass()
            if (mensagem.trim() == "Excluído com Sucesso") {
                    $('#btn-fechar-excluir').click();
                    listar();
                } else {

                    $('#mensagem-excluir').addClass('text-danger')
                    $('#mensagem-excluir').text(mensagem)
                }

               
            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

});
