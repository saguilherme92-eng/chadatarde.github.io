<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>BabyShower</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="stylesheets/foundation.min.css">
<link rel="stylesheet" href="stylesheets/main.css">
<link rel="stylesheet" href="stylesheets/app.css">
<script src="javascripts/modernizr.foundation.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script src="javascripts/blur/blur.min.js"></script>
<script>
$(document).ready(function ($) {
	$('.blur').blurjs({
		source: 'body',
		radius: 7,
		overlay: 'rgba(255,255,255,0.4)',
		optClass: 'blurred',
		cache: false
	});
});
</script>

<script>
  let maxAcompanhantes = 4;
  
  function adicionarAcompanhante() {
      const lista = document.getElementById("listaAcompanhantes");
      let total = lista.children.length;
      if (total < maxAcompanhantes) {
          const index = total + 1;
          const div = document.createElement("div");
          div.classList.add("acompanhante");
          div.innerHTML = `<label>Nome do Acompanhante ${index}:</label>
                           <input type="text" name="acompanhantes[]">`;
          lista.appendChild(div);
      } else {
          alert("Você só pode adicionar até " + maxAcompanhantes + " acompanhantes.");
      }
  }
  
  function removerAcompanhante() {
      const lista = document.getElementById("listaAcompanhantes");
      if (lista.children.length > 0) {
          lista.removeChild(lista.lastChild);
      } else {
          alert("Nenhum acompanhante para remover.");
      }
  }
  </script>
  </head>
  <body>
  <div class="container">
      <h2>Confirmação de Presença</h2>
      <form action="salvar.php" method="POST">
          <label>Seu Nome:</label>
          <input type="text" name="nome" required>
  
          <label>Telefone para contato:</label>
          <input type="tel" name="telefone" required pattern="[0-9]{8,15}" placeholder="Somente números">
  
          <div id="listaAcompanhantes"></div>
  
          <div class="botoes">
              <button type="button" onclick="adicionarAcompanhante()">+ Adicionar Acompanhante</button>
              <button type="button" onclick="removerAcompanhante()">- Remover Acompanhante</button>
          </div>
  
          <button type="submit">Confirmar Presença</button>
      </form>
  </div>
  </body>
  </html>