<!DOCTYPE html>
<!-- HEADER -->
<?php include "header.php" ?>
<!-- FIM HEADER -->

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
