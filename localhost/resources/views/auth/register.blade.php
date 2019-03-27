@extends('layouts.app')

@section('content')


    <script type="text/javascript">

        window.addEventListener('DOMContentLoaded',function(){
            var btn_captcha = document.getElementById("btn-refresh");
            btn_captcha.addEventListener('click', function(e){

        // $(document).ready(function() {
        //     $('#btn_captcha').on('click', function (e) {
                // $('.btn_captcha').click(function(e){

                e.preventDefault();
                $.ajax({
                   // dataType: 'json',
                    type: 'GET',
                    // url: '/refresh_captcha',
                    url: "{{ route('refresh_captcha') }}",
                    success: function (data) {
                      //console.log($("#img_captcha").attr('src', data.captcha_src))
                      // console.log(data.captcha_src);
                        $("#img_captcha").attr('src', data.captcha_src);
                    }, error: function (msg) {console.log(msg);}
                });
            });
        });
    </script>




    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Адрес') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('Введите символы, указанные на картинке') }}</label>
                            <div class="col-md-6">
                                <p>
                                    <img src="{{ captcha_src('flat') }}" alt="" id="img_captcha">
                                    <a  id="btn-refresh" class="links" href="">Обновить</a>
                                </p>
                                <p>
                                <input id="captcha"  class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" value="" required>

                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                                </p>
                        </div>






                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
