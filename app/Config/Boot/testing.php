<?php

    /**
     * O ambiente de teste é reservado para testes PHPUnit.
     * Ele possui condições especiais incorporadas em vários
     * pontos do framework para auxiliar nesse processo. Você
     * não pode usá-lo para desenvolvimento.
     */

    /**
     *--------------------------------------------------------------------------
     * ERROR DISPLAY
     *--------------------------------------------------------------------------
     * Durante o desenvolvimento, queremos mostrar o máximo de erros
     * possível para garantir que eles não cheguem à produção. Isso
     * nos poupa horas de depuração árdua.
     */
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    /**
     *--------------------------------------------------------------------------
     * DEBUG BACKTRACES
     *--------------------------------------------------------------------------
     * Se true, essa constante instruirá as telas de erro a
     * exibirem rastreamentos de pilha de depuração juntamente
     * com as outras informações de erro. Se preferir não ver
     * isso, defina esse valor como false.
     */
    defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

    /**
     *--------------------------------------------------------------------------
     * DEBUG MODE
     *--------------------------------------------------------------------------
     * O modo de depuração é uma opção experimental que permite
     * alterações em todo o sistema. Atualmente, não é amplamente
     * utilizado e pode não ser mantido após o lançamento da versão
     * final do framework.
     */
    defined('CI_DEBUG') || define('CI_DEBUG', true);
