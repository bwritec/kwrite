<?= $this->extend('system/adminlte-3.2.0/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Endereço
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
                            Endereço
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

                <form id="form-address" action="<?= site_url('dashboard/address') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="address" class="form-label">Endereço</label>

                        <input type="text" name="address" id="address" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" value="<?= esc($address['address'] ?? '') ?>">

                        <?php if (isset($errors['address'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['address']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="neighborhood" class="form-label">Bairro</label>

                        <input type="text" name="neighborhood" id="neighborhood" class="form-control <?= isset($errors['neighborhood']) ? 'is-invalid' : '' ?>" value="<?= esc($address['neighborhood'] ?? '') ?>">

                        <?php if (isset($errors['neighborhood'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['neighborhood']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Cidade</label>

                        <input type="text" name="city" id="city" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" value="<?= esc($address['city'] ?? '') ?>">

                        <?php if (isset($errors['city'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['city']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="state" class="form-label">Estado (UF)</label>

                            <input type="text" name="state" id="state" maxlength="2" class="form-control text-uppercase <?= isset($errors['state']) ? 'is-invalid' : '' ?>" value="<?= esc($address['state'] ?? '') ?>">

                            <?php if (isset($errors['state'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc($errors['state']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="cep" class="form-label">CEP</label>

                            <input type="text" name="cep" id="cep" maxlength="9" class="form-control <?= isset($errors['cep']) ? 'is-invalid' : '' ?>" value="<?= esc($address['cep'] ?? '') ?>" placeholder="00000-000">

                            <?php if (isset($errors['cep'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc($errors['cep']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" id="submit-form" class="btn btn-dark">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    /**
     * Máscara simples de CEP
     */
    $('#cep').on('input', function()
    {
        var v = $(this).val().replace(/\D/g, '');

        if (v.length > 8)
        {
            v = v.slice(0, 8);
        }

        if (v.length > 5)
        {
            v = v.replace(/^(\d{5})(\d{0,3})/, '$1-$2');
        }

        $(this).val(v);
    });

    /**
     * Remove a mascara de cep quando o usuario clica
     * no submit.
     */
    $('form').on('submit', function()
    {
        var cep = $('#cep').val();

        // Remove tudo que não for número
        cep = cep.replace(/\D/g, '');

        $('#cep').val(cep);
    });
</script>
<?= $this->endSection() ?>
