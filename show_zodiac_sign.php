<?php include('layouts/header.php'); ?>

<?php
// Recebe a data de nascimento do formulário
$data_nascimento = $_POST['data_nascimento'];

$signos = simplexml_load_file("signos.xml");

// Converter data do usuário
$data = new DateTime($data_nascimento);
$dia_mes = $data->format("d/m");

$signo_encontrado = null;
// Percorre os signos para encontrar o correspondente à data do usuário
foreach ($signos->signo as $signo) {

    $inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', $signo->dataFim);

    $data_usuario = DateTime::createFromFormat('d/m', $dia_mes);

    if ($inicio <= $fim) {
        if ($data_usuario >= $inicio && $data_usuario <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($data_usuario >= $inicio || $data_usuario <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}

?>

<main class="container resultado-container">
 <!-- Se o signo for encontrado, mostra as informações -->
    <?php if ($signo_encontrado): ?>

        <section class="card resultado-card shadow-lg text-center">
            <div class="card-body">

                <img 
                    src="assets/imgs/<?php echo $signo_encontrado->imagem; ?>" 
                    alt="Imagem do signo <?php echo $signo_encontrado->signoNome; ?>"
                    class="signo-img"
                >

                <h1 class="mt-4">
                    <?php echo $signo_encontrado->signoNome; ?>
                </h1>

                <p class="descricao-signo">
                    <?php echo $signo_encontrado->descricao; ?>
                </p>

                <a href="index.php" class="btn btn-primary mt-3">
                    Consultar novamente
                </a>

            </div>
        </section>

    <?php else: ?>
<!-- Se o signo não for encontrado, mostra mensagem de erro -->
        <section class="card resultado-card shadow text-center">
            <div class="card-body">
                <h1>Signo não encontrado</h1>
                <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
            </div>
        </section>

    <?php endif; ?>

</main>

</body>
</html>

</body>
</html>