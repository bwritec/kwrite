<?php

    /**
     *--------------------------------------------------------------------------
     * ERROR DISPLAY
     *--------------------------------------------------------------------------
     * 
     * Durante o desenvolvimento, queremos mostrar o máximo de erros possível
     * para garantir que eles não cheguem à produção. Isso nos poupa horas de
     * depuração árdua.
     *
     * Se você definir 'display_errors' como '1', o relatório de erros
     * detalhado do CI4 será exibido.
     */
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    /**
     *--------------------------------------------------------------------------
     * DEBUG BACKTRACES
     *--------------------------------------------------------------------------
     * Se true, essa constante instruirá as telas de erro a exibirem
     * rastreamentos de pilha de depuração juntamente com as outras
     * informações de erro. Se preferir não ver isso, defina esse
     * valor como false.
     */
    defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

    /**
     *--------------------------------------------------------------------------
     * DEBUG MODE
     *--------------------------------------------------------------------------
     * O modo de depuração é uma opção experimental que permite
     * alterações em todo o sistema. Isso controla se o Kint é
     * carregado e alguns outros itens. Ele também pode ser usado
     * dentro do seu próprio aplicativo.
     */
    defined('CI_DEBUG') || define('CI_DEBUG', true);
