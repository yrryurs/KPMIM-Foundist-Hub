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
            <h2>Sign Up</h2>
            <p>A first time user? Please sign up first.</p><br>
            {{--Display validation error--}}
            @if ($errors->any())
                <ul style="color: red;">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{route('signup.submit')}}">
                @csrf
                <table>
                    <tr>
                        <th><label>Name:</label></th>
                        <td><input type="text" name="name" required style="width:250px;"><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Email:</label></th>
                        <td><input type="email" name="email" required style="width:250px;"><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Password:</label></th>
                        <td><input type="password" name="password" required style="width:250px;"><br><br></td>
                    </tr>   
                    <tr>
                        <th><label>Confirm Password:</label></th>
                        <td><input type="password" name="password_confirmation" required style="width:250px;"><br><br></th>
                    </tr>
                </table><br>
                <button type="submit" style="width:70px;">Sign Up</button>
            </form><br>
            {{--Login link if user already have an account--}}
            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
        </div>
    </main>
</body>
<footer>
    <p>&copy; 2025 KPMIM Lost and Found Management System | @lostfoundkpmim@gmail.com</p>
</footer>
</html>