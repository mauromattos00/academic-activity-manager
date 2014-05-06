$(function() {

	$('.submenu').click(function() {
		$(this).next().slideToggle();
	});
	
	$('#formLogin').click(function() {
		$(this).next().slideToggle();
	});
	
	$('input:submit').button();
	$('button').button();
	
	$('#validar').click(function() {
		qtds = [];
		$('.questao').each(function(i, label) {
			qtds[i] = 0;
		});
		
		$('.resposta').each(function(i, checkbox) {
			if($(checkbox).is(':checked')) {
				numeroQuestao = $(checkbox).attr('name').substring(7);
				qtds[numeroQuestao - 1]++;
			}
		});
		
		$('p.ui-state-error, h3.ui-state-highlight').remove();
		
		entrou = false;
		for (i=0; i < qtds.length; i++) {
			if (qtds[i] > 2) {
				$($('.questao').get(i)).after('<p class="ui-state-error">Marque no máximo duas respostas.</p>');
				entrou = true;
			}
		}
		
		if (!entrou)
			$('button').before('<h3 class="ui-state-highlight">Parabéns!</h3>');
	});

});