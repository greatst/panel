<?= $this->extend('Layout/Starter') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->include('Layout/msgStatus') ?>
    </div>

    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header text-white"style="background: linear-gradient(0.9turn, #FF0000, #000000, #FF0000);">
                Registration History
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover text-center">
                        <tbody>
                            <?php foreach ($history as $h) : ?>
                                <?php $in = explode("|", $h->info) ?>
                                <tr>
                                    <td><span class="align-middle badge text-success">#3812<?= $h->id_history ?></span></td>
                                    <td><?= $in[0] ?></td>
                                    <td><span class="align-middle badge text-info"><?= $in[1] ?>**</span></td>
                                    <td><span class="align-middle badge text-warning"><?= $in[2] ?> Hours</span></td>
                                    <td><span class="align-middle badge text-primary"><?= $in[3] ?> Devices</span></td>
                                    <td><i class="align-middle badge text-danger"><?= $time::parse($h->created_at)->humanize() ?></i></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header text-center text-white"style="background: linear-gradient(0.9turn, #FF0000, #000000, #FF0000);">
                Information
            </div>
            <div class="card-body">
                <ul class="list-group list-hover mb-3">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Roles
                        <span class="badge text-danger">
                            <?= getLevel($user->level) ?>
                        </span>
                    </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Saldo
                        <span class="badge text-danger">
                            $<?= $user->saldo ?>
                        </span>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Login Time
                        <span class="badge text-danger">
                            <?= $time::parse(session()->time_since)->humanize() ?>
                        </span>
                    </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Auto Logout
                        <span class="badge text-danger">
                            <?= $time::now()->difference($time::parse(session()->time_login))->humanize() ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>