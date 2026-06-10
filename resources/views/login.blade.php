<html>
<head>
    <meta charset="UTF-8">
    <title>Foundist Hub</title>
    {{--Link to external CSS file--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header>
    <h1>
        <img src="kpm.png" style='width: 60px;'>
        KPMIM Foundist Hub
        <img src="logo.png" style='width: 50px;'>
    </h1>
    </header>
    <main>
        <div class="box">
            <h2>Welcome to KPMIM Foundist Hub!</h2>
            <p>A digital platform where you can add and find<p> 
            <p>your lost or found items securely.</p><br><br>
            {{--Display validation error--}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="color: red;">
                    @foreach ($errors->all() as $error)
                    {{$error}}
                    @endforeach
                </ul>
            </div>
            @endif
            {{--Login form--}}
            <form method="POST" action="{{route('login')}}" style="margin: 0 auto; display: block; width: fit-content;">
                @csrf
                <table>
                <tr>
                    <th><label>Email:</label></th>
                    <td><input type="email" name="email" required style="width:250px;"><br><br></td>
                </tr>
                <tr>
                    <th><label>Password:</label></th>
                    <td><input type="password" name="password" required style="width:250px;"><br><br></td>
                </tr>
                </table>
                <button type="submit">Login</button>
            </form><br>
            {{--Sign up link to click--}}
            <p>Doesn't have an account? <a href="{{route('signup')}}">Sign Up</a></p><br>
            <b><p>Please log in first to use our platform.</p>
            <p>Thankyou.</p></b>
        </div>
    </main>
</body>
<footer>
    <p>&copy; 2025 KPMIM Lost and Found Management System | @lostfoundkpmim@gmail.com</p>
</footer>
</html>