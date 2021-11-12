<form class="form-user form-register" method="POST">
    <div class="group-input">
        <input class="input-rectangle username" name="username" placeholder="USERNAME"
               type="text">
        <input class="input-rectangle full-name" name="full_name" placeholder="HỌ VÀ TÊN"
               type="text">
        <input class="input-rectangle email" name="email" placeholder="EMAIL" type="email">
        <input class="input-rectangle phone" name="phone" placeholder="SỐ ĐIỆN THOẠI"
               type="number">
        <input class="input-rectangle address" name="address" placeholder="ĐỊA CHỈ" type="text">
        <input class="input-rectangle password" name="password" placeholder="MẬT KHẨU"
               type="password">
        <input class="input-rectangle re-password" name="password"
               placeholder="NHẬP LẠI MẬT KHẨU" type="password">
    </div>
    <div class="group-button">
        <a href="" data-url="{{ route('registerCustomer') }}" class="btn btn--rectangle red register">ĐĂNG KÝ</a>
        <a href="" class="btn btn--rectangle switch-login">ĐĂNG NHẬP</a>
    </div>
    @csrf
</form>
