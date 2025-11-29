<?php
// app/Views/pagers/bootstrap.php

// pega os links gerados pelo pager
$links = $pager->links();


// tenta obter a contagem de páginas caso exista
$pageCount = method_exists($pager, 'getPageCount') ? $pager->getPageCount() : (count($links) > 1 ? count($links) : 1);

// só renderiza se houver mais de 1 página
if ($pageCount > 1): ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <!-- Link anterior -->
        <?php if (method_exists($pager, 'hasPrevious') && $pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif ?>

        <!-- Links das páginas -->
        <?php foreach ($links as $link): ?>
            <li class="page-item <?= isset($link['active']) && $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= esc($link['uri']) ?>">
                    <?= esc($link['title']) ?>
                </a>
            </li>
        <?php endforeach ?>

        <!-- Link próximo -->
        <?php if (method_exists($pager, 'hasNext') && $pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif ?>

    </ul>
</nav>
<?php endif ?>