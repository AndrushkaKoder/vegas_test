<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css') }}">
    <title>Авторизация</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.auth') }}" method="post" class="login_form">
                @csrf
                <h1 class="text-center mt-5">Авторизация</h1>

                <label for="login">
                    Логин
                    <input type="text" name="login" class="form-control" required>
                </label>

                <label for="password">
                    Пароль
                    <input type="password" name="password" class="form-control" required>
                </label>

                <button type="submit" class="btn btn-success login_btn">Войти</button>
            </form>
        </div>

        <div class="col-12 text-center mt-5">
            <a href="{{ route('frontend.index') }}" class="login_back">Назад</a>
        </div>
    </div>
</div>


<style>
    .login_form{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label{
        width: 30%;
        margin: 10px 0;
        text-align: center;
    }

    .login_btn{
        width: 30%;
    }
    .login_back{
        font-size: 20px;
        font-weight: bold;
        color: black;
        text-decoration: none;

    }


</style>

</body>
</html>
