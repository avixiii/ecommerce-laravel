@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="margin-left: -30px;text-align: start">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert show showAlert alert-success">
        <div class="alert">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">{{ Session::get('error') }}</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert show showAlert alert-success">
        <div class="alert">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">{{ Session::get('success') }}</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
    </div>
@endif




