<?= $this->extend('system/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Contato
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>index.php/dashboard">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Contato
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('dashboard/contact') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            Telefone
                        </label>

                        <input type="text" name="phone" id="phone" class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" maxlength="15"  value="<?= esc($phone) ?>" placeholder="(DDD) 00000-0000">

                        <?php if (isset($errors['phone'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['phone']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    /**
     * Máscara simples de telefone (suporta 8 ou 9 dígitos)
     */
    $('#phone').on('input', function()
    {
        var v = $(this).val().replace(/\D/g, '');

        if (v.length > 11)
        {
            v = v.slice(0, 11);
        }

        if (v.length > 10)
        {
            v = v.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
        } else if (v.length > 5)
        {
            v = v.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
        } else if (v.length > 2)
        {
            v = v.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
        } else
        {
            v = v.replace(/^(\d*)/, '($1');
        }

        $(this).val(v);
    });

    /**
     * Remove a mascara de telefone quando o usuario clica
     * no submit.
     */
    $('form').on('submit', function()
    {
        var phone = $('#phone').val();

        // Remove tudo que não for número
        phone = phone.replace(/\D/g, '');

        $('#phone').val(phone);
    });
</script>
<?= $this->endSection() ?>
