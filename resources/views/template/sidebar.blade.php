<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-plane-departure"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Project One</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- Nav Item - Menu --}}
    @php
        // mengambil role_id pada table user
        $role_id = Auth::user()->role_id;
        //mengambil nama menu yang dapat diakses oleh user yang mempunyai role_id
        //yang dijoin antara menu table dan access table
        $query = DB::table('menu')
                ->join('access','menu.id','=','access.menu_id')
                ->where('access.role_id','=',$role_id)
                ->orderBy('menu.id','asc')
                ->select('menu.id','title')
                ->get();
        // json decode untuk mengubah stdarray menjadi array
        $menu = json_decode($query,true)
    @endphp

    {{-- looping menu --}}
    @foreach ($menu as $m)
    <div class="sidebar-heading">
            {{$m['title']}}
    </div>

    {{-- QUERY SUBMENU --}}
    @php
        $menuID = $m['id'];
        $query = DB::table('submenu')
                ->join('menu','submenu.menu_id','=','menu.id')
                ->where('submenu.menu_id','=',$menuID)
                ->where('submenu.is_active','=',1)
                ->select('submenu.title','submenu.url','submenu.icon')
                ->get();
        $submenu = json_decode($query,true)
    @endphp

    @foreach ($submenu as $sm)
    @if ($title == $sm['title'])
        <li class="nav-item active border-left-danger">
    @else
        <li class="nav-item">
    @endif
            <a class="nav-link" href="{{$sm['url']}}">
                    <i class="{{$sm['icon']}}"></i>
                <span>{{$sm['title']}}</span>
            </a>
        </li>

    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endforeach

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
