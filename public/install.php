<?php

    /**
     * Caminho do .env (ajuste se necessário)
     */
    $envPath = dirname(__DIR__) . '/.env';

    /**
     * Se não existir .env, redireciona para install.php
     */
    if (file_exists($envPath))
    {
        header('Location: index.php');
        exit;
    }

    /**
     * Valida sé o campo está vazio.
     * 
     * @param $key string | Nome do campo.
     * @return bool
     */
    function is_empty($key)
    {
        /**
         * Questão: A chave $key foi enviado nesse form ?
         */
        if (array_key_exists($key, $_POST))
        {
            /**
             * Obtem o valor de $key.
             */
            $value = $_POST[$key];

            /**
             * Limpa espaços em branco.
             */
            $value = trim($value);

            /**
             * Faz a validação.
             */
            return strlen($value) == 0;
        }

        /**
         * Devolve um false.
         */
        return false;
    }

    /**
     * Variável com erros de formulário.
     */
    $errors = array();

    /**
     * Questão: é um envio de formulário ?
     */
    if (strtoupper($_SERVER["REQUEST_METHOD"]) == "POST")
    {
        /**
         * Questão: a variável de passo existe ?
         */
        if (array_key_exists("step", $_GET))
        {
            /**
             * Passo 1.
             */
            if ($_GET["step"] == "1")
            {
                echo "Entrou aqui";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
<head>

    <!--
      - Charset.
     -->
    <meta charset="utf-8">

    <!--
      - Viewport.
     -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
      - Título.
     -->
    <title>Kwrite Installer</title>

    <!--
      - Estilos.
     -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-5.3.7.css">

    <!--
      - Scripts.
     -->
    <script type="text/javascript" src="dist/js/bootstrap.bundle-5.3.7.js"></script>

</head>
<body>

    <div style="text-align: center;" class="mt-5 mb-3">
        <img src="dist/img/logo.png" style="width: 75px; height: 75px;">
    </div>

    <?php if (array_key_exists("step", $_GET)): ?>
        <?php if ($_GET["step"] == "1"): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <form action="/install.php?step=1" method="POST">
                                    <!--
                                      - Nav tabs
                                     -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="app-tab" data-bs-toggle="tab" data-bs-target="#app" type="button" role="tab">
                                                App
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="database-tab" data-bs-toggle="tab" data-bs-target="#database" type="button" role="tab">
                                                Database
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                                                Email
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="token-tab" data-bs-toggle="tab" data-bs-target="#token" type="button" role="tab">
                                                Token
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="app" role="tabpanel">
                                            <div class="mb-3">
                                                <label for="app_name" class="form-label">
                                                    Nome do site
                                                </label>

                                                <input type="text" name="app_name" id="app_name" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="app_url" class="form-label">
                                                    URL
                                                </label>

                                                <input type="text" name="app_url" id="app_url" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="app_rate" class="form-label">
                                                    Taxa do site
                                                </label>

                                                <div class="input-group mb-3">
                                                    <input type="text" name="app_rate" id="app_rate" class="form-control">

                                                    <span class="input-group-text">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="database" role="tabpanel">
                                            <div class="mb-3">
                                                <label for="database_hostname" class="form-label">
                                                    Hostname
                                                </label>

                                                <input type="text" name="database_hostname" id="database_hostname" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="database_port" class="form-label">
                                                    Porta
                                                </label>

                                                <input type="text" name="database_port" id="database_port" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="database_name" class="form-label">
                                                    Nome do banco de dados
                                                </label>

                                                <input type="text" name="database_name" id="database_name" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="database_username" class="form-label">
                                                    Usuário
                                                </label>

                                                <input type="text" name="database_username" id="database_username" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="database_password" class="form-label">
                                                    Senha
                                                </label>

                                                <input type="text" name="database_password" id="database_password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="email" role="tabpanel">
                                            <div class="mb-3">
                                                <label for="email_from_email" class="form-label">
                                                    Do Email
                                                </label>

                                                <input type="text" name="email_from_email" id="email_from_email" class="form-control" placeholder="nao-responder@kwrite.com.br">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_from_name" class="form-label">
                                                    Do Nome
                                                </label>

                                                <input type="text" name="email_from_name" id="email_from_name" class="form-control" placeholder="Kwrite">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_protocol" class="form-label">
                                                    Protocolo
                                                </label>

                                                <input type="text" name="email_protocol" id="email_protocol" class="form-control" value="smtp" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_host" class="form-label">
                                                    Host
                                                </label>

                                                <input type="text" name="email_host" id="email_host" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_user" class="form-label">
                                                    Usuário
                                                </label>

                                                <input type="text" name="email_user" id="email_user" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_password" class="form-label">
                                                    Senha
                                                </label>

                                                <input type="text" name="email_password" id="email_password" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_port" class="form-label">
                                                    Porta
                                                </label>

                                                <input type="text" name="email_port" id="email_port" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email_crypto" class="form-label">
                                                    Criptografia
                                                </label>

                                                <input type="text" name="email_crypto" id="email_crypto" class="form-control" value="tls">
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="token" role="tabpanel">
                                            <div class="mb-3">
                                                <label for="token_melhorenvio" class="form-label">
                                                    Melhor Envio
                                                </label>

                                                <textarea name="token_melhorenvio" id="token_melhorenvio" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark">
                                        Salvar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            Passo Desconhecido
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                Boas-vindas ao Kwrite. Antes de iniciar, você
                                precisará conhecer os seguintes itens.
                            </p>

                            <ol>
                                <li>Informações do banco de dados</li>
                                <li>Informações do servidor smtp</li>
                                <li>Informações da app</li>
                                <li>Informações de tokens de serviços</li>
                            </ol>

                            <p>
                                Esta informação está sendo usada para criar um arquivo
                                <strong>.env</strong>. Se por algum motivo a criação
                                automática deste arquivo não funcionar, não se preocupe.
                                Tudo que isto faz é preencher as informações do banco de
                                dados, smtp, app e token's de serviços em um arquivo de
                                configuração. Você também pode simplesmente abrir
                                <strong>.env.sample</strong> em um editor de texto,
                                preencher suas informações e salvar como
                                <strong>.env</strong>.
                            </p>

                            <p>
                                Provavelmente esses itens foram fornecidos a você pela
                                sua hospedagem. Se não tiver essa informação, então
                                precisará entrar em contato com eles antes de continuar.
                                Se estiver pronto…
                            </p>

                            <a href="/install.php?step=1" class="btn btn-outline-primary">
                                Vamos lá!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>
