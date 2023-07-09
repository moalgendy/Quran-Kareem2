<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QURAAN</title>
    <!-- STYLE -->
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/all.min.css') }}">

    <!-- LOGO -->
    <link rel="icon" href="{{ asset('home/logo.png') }}">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,700&family=Anton&family=Cairo:wght@300;500;800&family=Reem+Kufi:wght@600&family=Righteous&display=swap" rel="stylesheet">
</head>
<body>

    <!-- START HEADER -->
    <header>
        <div class="container" id="header">
            <p class="logo" style="font-size: 20px">QURAN KAREEM</p>
            <nav>
                <ul class="main-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="https://evonscompany.com/" target="blank">Company Website</a></li>

                    @if (Route::has('login'))
          @auth
          <li>

             {{-- <ul class="dropdown-menu"> --}}
                @if (Auth::user())
                {{-- <li><a class="dropdown-item"  href="{{ url('dashboard') }}">Dashboard</a></li> --}}
                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>

                @else

                @endif
                  <li><a class="dropdown-item"  href="{{ url('user/profile') }}">Profile</a></li>
                  <li><a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form></li>
                  <li><img class="h-8 w-8 rounded-full object-cover nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 2rem;height:2rem;border-radius: 9999px;margin-top:20px;margin-right: 10px" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></li> 
                {{-- <span class="caret"></span></a> --}}
             {{-- </ul> --}}
          </li>
       @else
          <li class="nav-item dropdown">
            {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SignUp --}}
            </a>
            
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>

              {{-- <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li> --}}
              {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            

            
          </li>
          @endauth
          @endif
                    {{-- <li><a href="/">Contact</a></li> --}}
                    <form class="d-flex" role="search" method="get" action="{{ url('search_surahs') }}">
                        @csrf
                        <input style="margin-top: 22px;height: 30px; width:200px; padding: 10px;border-radius: 0;" name="search" type="search" placeholder="Search From Surah ...." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="background-color: #045C44;color: white;width: 100px;height: 30px;cursor: pointer;">Search</button>
                    </form>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START LANDING -->
    <div class="landing">
        <div class="container">
            <div class="text">
                <h1>Welcome, To Quran World</h1>
                <p>QURAAN is a Sadaqah Jariyah. We hope to make it easy for everyone to read, study, and learn The Noble Quran. The Noble Quran has many names including Al-Quran Al-Kareem, Al-Ketab, Al-Furqan, Al-Maw'itha, Al-Thikr, and Al-Noor.</p>
            </div>
            <div class="image">
                <img src="{{ asset('home/landing.png') }}" alt="landing">
            </div>
        </div>
        <a href="#main" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </div>
    <!-- END LANDING -->

    <!-- START MAIN CONTENT -->
    <div class="quran">
        <div class="container" id="main">
            @foreach ($ayats as $aya)
            <P dir="rtl" class="pragOne">
                {{ $aya->text_arabic }}
            </P>
            @endforeach
            {{-- "وَنُنَزِّلُ مِنَ القرآن مَا هُوَ شِفَآءٌ وَرَحْمَةٌ لِّلْمُؤْمِنِينَ" --}}

            <p class="pragTwo">صدق الله العظيم</p>
            <br>
            <br>
            <h2 class="main-title">Surah</h2>
            <div class="box-card">


                @foreach ($surahs as $surah)
                    
                <div class="card">
                    <a href="{{ route('surah.listener',$surah->surah_name) }}">
                        <span class="num">{{ $surah->surah_number }}</span>
                        <p class="name">{{ $surah->surah_name }}</p>
                    </a>
                </div>
                
                @endforeach
                
                
            </div>
        </div>
        </div>
    <!-- End MAIN CONTENT-->
    <!-- START NEXT AND BACK SECTION -->
    <div class="container">
        <nav>
            <ul class="last-nav">
                <li><a href="#header">Top Page</a></li>
            </ul>
        </nav>
    </div>
    <!-- END NEXT AND BACK SECTION -->

    <!-- START FOOTER -->
    <footer id="footer" class="footer">
        <div class="container">
            <p class="dad">Designed and developed by</p>
            <h4>Evons Company Team</h4>
        </div>
    </footer>
    <!-- END FOOTER -->
</body>
</html>