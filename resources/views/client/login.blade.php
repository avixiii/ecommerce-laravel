<form class="form-user form-login" method="POST">
    <div class="group-input">
        <input class="input-rectangle username" name="username" placeholder="USERNAME"
               type="text">
        <input class="input-rectangle password" name="password" placeholder="PASSWORD"
               type="password">
        <span class="forget-password">Quên mật khẩu</span>
    </div>

    <div class="group-button">
        <a href="" data-url="{{ route('loginCustomer') }}" class="btn btn--rectangle login">ĐĂNG
            NHẬP</a>
        <a href="" class="btn btn--rectangle red switch-register">ĐĂNG KÝ</a>
    </div>
    @csrf
</form>
