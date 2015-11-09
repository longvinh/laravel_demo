@extends("main")

@section('title')
Đăng ký
@endsection

@section('content')
<form method="post" action="{{Asset('register')}}" id="form-register">
    <h2>Đăng ký</h2>
    <input type='text' name='username' id='username' placeholder="Username" class="form-control"/>
    <input type='password' name='password' id='password' placeholder="password" class="form-control"/>
    <input type='password' name='re_password' id='re_password' placeholder="re_password" class="form-control"/>
    <input type='email' name='email' id='email' placeholder="email" class="form-control"/>
    <button class="btn btn-lg btn-primary btn-block">Đăng ký</btn>
</form>
<script type="text/javascript">
    $("#form-register").validate({
        rules:{
            username:{
                required:true,
                minlength:3,
                remote:{
                    url:"{{Asset('check\check-username')}}",
                    type:"POST"
                }
            },
            password:{
                required:true,
                minlength:6
            },
            re_password:{
                required:true,
                equalTo:"#password"
            },
            email:{
                required:true,
                email:true,
                remote:{
                    url:"{{Asset('check\check-email')}}",
                    type:"POST"
                }
            }
        },
        messages:{
            username:{
                required:"Chưa nhập username",
                minlength:"username từ 3 ký tự trở lên",
                remote:"username đã tồn tại"
            },
            password:{
                required:"Chưa nhập password",
                minlength:"password từ 6 ký tự trở lên"
            },
            re_password:{
                required:"Chưa nhập re_password",
                equalTo:"Xác nhận không đúng"
            },
            email:{
                required:"Chưa nhập email",
                email:"Không đúng định dạng email",
                remote:"email đã tồn tại"
            }
        }
    })
</script>
@endsection
