<html>
<head>
    <title>Foundist Hub</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script>
    //function to confirm logout
    function confirmLogout(){
        if (confirm('Are you sure you want to log out?')){
            document.getElementById('logout-form').submit();
        }
    }
    </script>
</head>
<body>
    <header>
    <h1>
        <img src="{{asset('kpm.png')}}" style='width: 60px;'>
        KPMIM Foundist Hub
        <img src="{{asset('logo.png')}}" style='width:50px;'>
    </h1>
</header>
    <nav>
        <a href="{{url('/home')}}">Home</a>
        <a href="{{url('/items')}}">Add Items</a>
        <a href="{{url('/view')}}">View Items</a>
        @auth
        <!-- Only show "Trash if user is an admin -->
        @if(auth()->user()->role==='admin')
        <a href="{{route('trash')}}">Trash</a>
        @endif
        @endauth
        <a href="{{url('aboutus')}}">About Us</a>
        @auth
        <a href="#" onclick="event.preventDefault(); confirmLogout();">Logout</a>
        <!--Form used for logging out-->
        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        @csrf
        </form>
        @endauth
    </nav>
    <!--Main content section that is different in each pages-->
    <div class="container">
        @yield('content')
    </div>
<footer>
    <p>&copy; 2025 KPMIM Lost and Found Management System | @lostfoundkpmim@gmail.com</p>
</footer>
</body>
</html>