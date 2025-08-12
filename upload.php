<?php
// Pasta de destino
$pastaDestino = __DIR__ . "/fotos/";

// Cria a pasta se não existir
if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fotos'])) {
    $arquivos = $_FILES['fotos'];

    for ($i = 0; $i < count($arquivos['name']); $i++) {
        $nomeArquivo = basename($arquivos['name'][$i]);
        $tipoArquivo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        // Verifica se é imagem
        if (in_array($tipoArquivo, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Gera um nome único para evitar conflito
            $nomeUnico = uniqid() . "." . $tipoArquivo;
            $caminhoFinal = $pastaDestino . $nomeUnico;

            if (move_uploaded_file($arquivos['tmp_name'][$i], $caminhoFinal)) {
                echo "Foto enviada com sucesso: " . htmlspecialchars($nomeArquivo) . "<br>";
            } else {
                echo "Erro ao enviar a foto: " . htmlspecialchars($nomeArquivo) . "<br>";
            }
        } else {
            echo "Arquivo inválido: " . htmlspecialchars($nomeArquivo) . " (somente JPG, PNG ou GIF)<br>";
        }
    }
} else {
    echo "Nenhum arquivo enviado.";
}

echo "<br><a href='enviar_fotos.php'>Voltar</a>";
?>
