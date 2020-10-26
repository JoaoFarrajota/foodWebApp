function showfield(name){

	if(name=='ambos' || name=="vendedor")document.getElementById('div1').innerHTML=
		'<label>Tipo de comida que fornece (Poderá selecionar mais que 1)</label>'+
       '<div class="form-check-inline"><label class="form-check-label">' +
          '<input type="checkbox" class="form-check-input" value="portuguesa" name="tipoComida">Portuguesa</label></div>'+

       '<div class="form-check-inline"><label class="form-check-label">'+
          '<input type="checkbox" class="form-check-input" value="italiana" name="tipoComida">Italiana</label></div>'+

        '<div class="form-check-inline"><label class="form-check-label">'+
            '<input type="checkbox" class="form-check-input" value="indiana" name="tipoComida">Indiana</label></div>'+

        '<div class="form-check-inline"><label class="form-check-label">'+
            '<input type="checkbox" class="form-check-input" value="japonesa" name="tipoComida">Japonesa</label></div><br><br>'+

    '<label>Pretende fornecer (Poderá selecionar mais que 1)</label>'+
        '<div class="form-check-inline"><label class="form-check-label">'+
           '<input type="checkbox" class="form-check-input" value="semana" name="tempoFornecer">Durante a semana</label></div>'+
        '<div class="form-check-inline"><label class="form-check-label">'+
           '<input type="checkbox" class="form-check-input" value="fds" name="tempoFornecer">Fim de semana</label></div><br><br>'+

    '<label>Período (Poderá selecionar mais que 1)</label>'+
       '<div class="form-check-inline"><label class="form-check-label">'+
           '<input type="checkbox" class="form-check-input" value="almoco" name="periodo">Hora de Almoco</label></div>'+
        '<div class="form-check-inline"><label class="form-check-label">'+
           '<input type="checkbox" class="form-check-input" value="jantar" name="periodo">Jantar</label></div><br><br>'+

    '<input type="text" class="form-control" name="especialidade" value="" placeholder="Especialidade do restaurante"><br>'

  else document.getElementById('div1').innerHTML='';
};
