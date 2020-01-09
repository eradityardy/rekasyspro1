<?php
// Cek apakah terdapat session nama message
if($this->session->flashdata('message')){ // Jika ada
  echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
}
?>

<form action="<?php echo base_url() ?>auth/login" method="post" class="login100-form validate-form">
    <div class="wrap-input100 validate-input m-b-18">
        <span class="label-input100">Username</span>
        <input class="input100" type="text" name="username" placeholder="Username">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Password">
        <span class="focus-input100"></span>
    </div>

    <div class="flex-sb-m w-full p-b-30">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
                Ingat Saya
            </label>
        </div>
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn" name="sign_in">
            Masuk
        </button>
    </div>
</form>