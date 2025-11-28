<?php

    /**
     *--------------------------------------------------------------------------
     * ERROR DISPLAY
     *--------------------------------------------------------------------------
     * Não exiba NENHUM erro em ambientes de produção. Em vez disso,
     * deixe o sistema detectá-lo e exibir uma mensagem de erro genérica.
     *
     * Se você definir 'display_errors' como '1', o relatório de erros
     * detalhado do CI4 será exibido.
     */
    error_reporting(E_ALL & ~E_DEPRECATED);

    /**
     * Se você deseja suprimir mais tipos de erros.
     * error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
     */
    ini_set('display_errors', '0');

    /**
     *--------------------------------------------------------------------------
     * DEBUG MODE
     *--------------------------------------------------------------------------
     * O modo de depuração é uma opção experimental que permite alterações
     * em todo o sistema. Atualmente, não é amplamente utilizado e pode não
     * ser mantido após o lançamento da versão final do framework.
     */
    defined('CI_DEBUG') || define('CI_DEBUG', false);
