<h2>Lista de Links</h2>
<a href="/dashboard/links/create">Novo Link</a>


<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Nome</th>
<th>URL</th>
<th>Nova Aba?</th>
<th>Ações</th>
</tr>


<?php foreach ($links as $link): ?>
<tr>
<td><?= $link['id'] ?></td>
<td><?= $link['name'] ?></td>
<td><a href="<?= $link['url'] ?>" target="<?= $link['open_in_new_window'] ? '_blank' : '_self' ?>">
<?= $link['url'] ?></a>
</td>
<td><?= $link['open_in_new_window'] ? 'Sim' : 'Não' ?></td>
<td>
<a href="/dashboard/links/edit/<?= $link['id'] ?>">Editar</a> |
<a href="/dashboard/links/delete/<?= $link['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</table>