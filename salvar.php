<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $acompanhantes = isset($_POST['acompanhantes']) ? $_POST['acompanhantes'] : [];

    // Junta nomes de acompanhantes em uma única string
    $acompanhantesLista = implode(", ", array_filter($acompanhantes));

    // Nome do arquivo na raiz do site
    $arquivo = __DIR__ . "/confirmacoes.csv";

    // Cria o arquivo se não existir e adiciona cabeçalho
    if (!file_exists($arquivo)) {
        $cabecalho = ["Nome", "Telefone", "Acompanhantes", "Data/Hora"];
        $fp = fopen($arquivo, 'w');
        fputcsv($fp, $cabecalho, ";");
        fclose($fp);
    }

    // Adiciona registro no CSV
    $fp = fopen($arquivo, 'a');
    fputcsv($fp, [$nome, $telefone, $acompanhantesLista, date("d/m/Y H:i:s")], ";");
    fclose($fp);

    echo "<h3>Obrigado, $nome! Sua confirmação foi registrada.</h3>";
    echo "<a href='index.php'>Voltar</a>";
} else {
    echo "Método inválido.";
}
?>