<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="<?php echo base_url() ?>users"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>users/editusers"><?php echo $title3 ?></a></li>
                </ol>
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
                        <strong class="card-title"><?php echo $title2 ?></strong>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>users/updateusers" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_users" value="<?php echo $id_users ?>">
                            <div class="form-group">
                                <label for="fullname"><h6>Fullname</h6></label>
                                <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="form-control" value="<?php echo $fullname ?>">
                            </div>
                            <div class="form-group">
                                <label for="username"><h6>Username</h6></label>
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo $username ?>">
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="updateusers" class="btn btn-primary" value="Update">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>users">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>