<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-BR">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>BabyShower | Gallery</title>
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
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Ranchers' rel='stylesheet' type='text/css'>

<style>
  .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
      margin-top: 20px;
  }
  .galeria img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0px 2px 6px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
  }
  .galeria img:hover {
      transform: scale(1.05);
  }
  </style>
</head>
<body>
  <div class="container">
    <h2>Galeria de Fotos do Evento</h2>
    <div class="galeria">
      <?php
        $pasta = __DIR__ . "/fotos/";
        $imagens = [];

        if (is_dir($pasta)) {
            // Busca arquivos jpg, jpeg, png e gif - insensível a maiúsculas
            $imagens = glob($pasta . "*.{jpg,JPG,jpeg,JPEG,png,PNG,gif,GIF}", GLOB_BRACE);
        }

        if ($imagens && count($imagens) > 0) {
            foreach ($imagens as $imagem) {
                $nomeArquivo = basename($imagem);
                $caminhoRelativo = "fotos/" . $nomeArquivo;
                echo "<a href='$caminhoRelativo' target='_blank'><img src='$caminhoRelativo' alt='Foto do evento'></a>";
            }
        } else {
            echo "<p>Nenhuma foto enviada ainda.</p>";
        }
      ?>
    </div>
    <br>
    <a href="enviar_fotos.php">Enviar novas fotos</a>
  </div>
</body>
</html>
