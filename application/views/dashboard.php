<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">

            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Selamat Datang <?php echo $this->session->userdata('fullname') ?></strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Kamu Login sebagai <?php echo $this->session->userdata('role') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>