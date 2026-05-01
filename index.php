<?php include('layouts/header.php'); ?>
<!-- Tela inicial -->
<main class="container d-flex justify-content-center align-items-center min-vh-100">
    <section class="card shadow formulario-card">
        <div class="card-body text-center">
            <h1 class="mb-4">Descubra seu signo</h1>
<!-- Formulário para pegar a data de nascimento -->
            <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">
                        Data de nascimento
                    </label>

                    <input 
                        type="date" 
                        class="form-control" 
                        id="data_nascimento" 
                        name="data_nascimento" 
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Descobrir
                </button>
            </form>
        </div>
    </section>
</main>

</body>
</html>