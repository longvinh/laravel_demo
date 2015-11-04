@extends("main")

@section('title')
Đăng Nhập
@endsection

@section('content')
<form method="post" action="{{Asset('login')}}" id="form-login">
    <h2>Đăng Nhập</h2>
    <input type='text' name='username' id='username' placeholder="Username" class="form-control"/>
    <input type='password' name='password' id='password' placeholder="password" class="form-control"/>
    <button class="btn btn-lg btn-primary btn-block">Đăng Nhập</btn>
</form>
@endsection