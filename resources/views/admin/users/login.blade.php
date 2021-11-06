@extends('admin.base')

@section('content')
    <div class="authentication">
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="company_detail">
                            <h4 class="logo"><img src="/admin/images/logo.svg" alt=""> Alpino</h4>
                            <h3>Admin Dashboard</h3>
                            <p>Khu vực quản trị website <br>Đây là project môn lập trình website tại EAUT</p>
                            <div class="footer">
                                <ul class="social_link list-unstyled">
                                    <li><a target="_blank" href="https://techcats.dev" title="TechCats"><i
                                                class="zmdi zmdi-globe"></i></a></li>
                                    <li><a target="_blank" href="https://www.linkedin.com/in/tuanp24/" title="LinkedIn"><i
                                                class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a target="_blank" href="https://www.facebook.com/tuanpham5024"
                                           title="Facebook"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a target="_blank" href="http://twitter.com/tuanp24" title="Twitter"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 offset-lg-1">
                        <div class="card-plain">
                            <div class="header">
                                <h5>Log in</h5>
                            </div>
                            @include('admin.alert')
                            <form action="/dashboard/login/store" method="POST" class="form" id="form__login">
                                <div class="input-group">
                                    <input name="email" type="text" class="form-control" placeholder="Địa chỉ Email">
                                    <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                <div class="input-group">
                                    <input name="password" type="password" placeholder="Mật khẩu" class="form-control"/>
                                    <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                                @csrf
                            </form>
                            <div class="footer">
                                <a style="color: white" onclick="document.getElementById('form__login').submit()" class="btn btn-primary btn-round btn-block">Đăng nhập</a>
                            </div>
                            <a href="#" class="link">Quên mật khẩu?</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

