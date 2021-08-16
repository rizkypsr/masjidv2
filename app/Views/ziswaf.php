<?= $this->extend("templates/index")  ?>
<?= $this->section("content") ?>

<div class="container my-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "wakaf" ? "active" : ""  ?>" id="wakaf-tab" data-bs-toggle="tab"
                data-bs-target="#wakaf" type="button" role="tab" aria-controls="wakaf"
                aria-selected="true">Wakaf</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "zakat" ? "active" : ""  ?>" id="zakat-tab" data-bs-toggle="tab"
                data-bs-target="#zakat" type="button" role="tab" aria-controls="zakat"
                aria-selected="false">Zakat</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $type == "infaq" ? "active" : ""  ?>" id="infaq-tab" data-bs-toggle="tab"
                data-bs-target="#infaq" type="button" role="tab" aria-controls="infaq"
                aria-selected="false">Infaq</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Wakaf -->
        <?= $this->include("partials/wakaf/index") ?>

        <!-- Zakat -->
        <?= $this->include("partials/zakat/index") ?>

        <!-- Infaq -->
        <?= $this->include("partials/infaq/index") ?>

    </div>
</div>

<?= $this->endSection() ?>