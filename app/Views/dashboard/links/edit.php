<h2>Editar Link</h2>
<form method="post" action="/dashboard/links/update/<?= $link['id'] ?>">
<label>Nome:</label>
<input type="text" name="name" value="<?= $link['name'] ?>" required><br><br>


<label>URL:</label>
<input type="text" name="url" value="<?= $link['url'] ?>" required><br><br>


<label>Abrir nova aba?</label>
<input type="checkbox" name="open_in_new_window" value="1" <?= $link['open_in_new_window'] ? 'checked' : '' ?>><br><br>


<button type="submit">Atualizar</button>
</form>