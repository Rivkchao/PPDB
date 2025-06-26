<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="header">

        <div class="sidebar">
            <span class="hamburger-menu" href="#">Menu</span>
            <div class="sidebar-nav">
                <a class="item" href="{{route('admin.dashboard_admin')}}">
                    <div class="icon-size">
                        <i class="icon" data-feather="bar-chart-2"></i>
                    </div>
                    <span class="sidebar-text">Data PPDB</span>
                </a>
                <a class="item" href="{{route('admin.gelombang.index')}}">
                    <div class="icon-size">
                        <i class="icon" data-feather="calendar"></i>
                    </div>
                    <span class="sidebar-text">Gelombang</span>
                </a>
                <a class="item" href="{{route('admin.berita')}}">
                    <div class="icon-size">
                        <i class="icon" data-feather="tag"></i>
                    </div>
                    <span class="sidebar-text">Berita</span>
                </a>
            </div>
        </div>
        <div class="navbar-admin">
            <div class="wrap">
                <a class="hamburger-menu" href="#"><i data-feather="menu"></i></a>
                <a class="user-icon" href="{{route('admin.login.submit')}}"><i data-feather="log-out"></i></a>
            </div>
        </div>
    </div>
        
        <script>
      feather.replace();

      const sideBar = document.querySelector('.sidebar');
      const hamburgerMenu = document.querySelector('.wrap .hamburger-menu');
      const sidebarText = document.querySelectorAll('.sidebar-text');
      
      hamburgerMenu.addEventListener('click',()=>{
        sideBar.classList.toggle('open')
        sidebarText.forEach((item)=>{
            item.classList.toggle('open')
            hamburgerMenu.classList.toggle('open')
        });
      });

      document.addEventListener('click',function(e){
        if (!hamburgerMenu.contains(e.target) && !sideBar.contains(e.target)){
            sideBar.classList.remove('open')
             sidebarText.forEach((item)=>{
            item.classList.remove('open')
                  hamburgerMenu.classList.remove('open')
        });
        }
      })
    </script>
    
</body>
</html>