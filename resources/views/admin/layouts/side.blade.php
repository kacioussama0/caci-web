<div id="sidebar" class="active">
    <div class="sidebar-wrapper active border-end border-1 ">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">

                    <a href=""> <img src="{{asset('imgs/logo.svg')}}"  alt="Logo" class = "main-logo "></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">

            <ul class="menu">
                <li class="sidebar-title">List</li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="" class='sidebar-link'>
                        <span>Profile</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="{{route('users.index')}}" class='sidebar-link'>
                        <span>Utilisateurs</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('semeters') ? "active" : '' }}">
                    <a href="{{route('semesters.index')}}" class='sidebar-link'>
                        <span>Semestres</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('modules') ? "active" : '' }}">
                    <a href="{{route('modules.index')}}" class='sidebar-link'>
                        <span>Modules</span>
                    </a>
                </li>


                <li
                    class="sidebar-item {{request()->is('lessons') ? "active" : '' }}">
                    <a href="{{route('lessons.index')}}" class='sidebar-link'>
                        <span>Leçons</span>
                    </a>
                </li>



            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
