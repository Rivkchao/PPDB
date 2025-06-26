

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <header>
        <nav class=" navbar">
            <div class="logo">
                <img class="logo-school" src="{{ asset('image/UMBRELLA-01.png')}}" alt="logo-sekolah-uihc">
            </div>
            <ul class="navbar-nav">
                <li><a class="nav-item" href="/#home">Beranda</a></li>
                <li><a class="nav-item" href="{{route('pendaftaran.form')}}">Pendaftaran</a></li>
                <li><a class="nav-item" href="{{route('beritaglobal')}}">Berita</a></li>
                <li><a class="nav-item" href="/#about">Tentang Sekolah</a></li>
                <li><a class="nav-item" href="/#kontak">Kontak</a></li>
            </ul>
            <div class="navbar-extra">
                <a class="item-login" href="{{route('choice')}}" id="item-login">Login</a>
                <i class="item-extra" data-feather="menu"></i>
            </div>
        </nav>
    </header>

    <script>
         feather.replace();
        const navbarNav = document.querySelector('.navbar-nav')

        document.querySelector('.item-extra').onclick = ()=>{
            navbarNav.classList.toggle('open')
        }

        const hamburgerMenuNav = document.querySelector('.item-extra');
        document.addEventListener('click',function (e){

            if(!hamburgerMenuNav.contains(e.target) && !navbarNav.contains(e.target)){
                navbarNav.classList.remove('open')
            }
        })


    </script>


</body>

</html>