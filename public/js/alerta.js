var alerta = [];

alerta.showAlertMensage = function(type, msg) {
	console.log(type);
	console.log(msg);
	if (type != "error" && type != "success") {
		return;
	}
	if (msg.length == 0) {
		return;
	}

	var modal;
	if (type == "error") {
		console.log("to aqui");
		modal = '<div class="modal fade" id="alert-modal" role="dialog" aria-hidden="true">\
					<div class="modal-dialog">\
						<div class="modal-content">\
							<div class="modal-header">\
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">\
									<span aria-hidden="true">&times;</span>\
								</button>\
								<h4 class="modal-title">Error</h4>\
							</div>\
			<div class="modal-body">' + msg + '</div> \
		</div>\
	</div>\
		</div>';
	}

	if (type == "success") {
		//definir modal
	}

	$(".alert-modal-content").empty();
	$(".alert-modal-content").append(modal);
	$("#alert-modal").modal('show');
}

$(document).ready(function() {
	alerta.showAlertMensage();
});