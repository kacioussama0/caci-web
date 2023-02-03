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


                <li
                    class="sidebar-item {{request()->is('admin/profile') ? "active" : '' }}">
                    <a href="{{route('admin/profile')}}" class='sidebar-link'>
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/users*') ? "active" : '' }}">
                    <a href="{{route('users.index')}}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Utilisateurs</span>
                    </a>
                </li>

                @role('super_admin|moderator')

                <li
                    class="sidebar-item {{request()->is('admin/semesters*') ? "active" : '' }}">
                    <a href="{{route('semesters.index')}}" class='sidebar-link'>
                        <i class="bi bi-bar-chart-steps"></i>
                        <span>Semestres</span>
                    </a>
                </li>

                @endrole

                <li
                    class="sidebar-item {{request()->is('admin/modules*') ? "active" : '' }}">
                    <a href="{{route('modules.index')}}" class='sidebar-link'>
                        <i class="bi bi-journals"></i>
                        <span>Modules</span>
                    </a>
                </li>


                <li
                    class="sidebar-item {{request()->is('admin/lessons*') ? "active" : '' }}">
                    <a href="{{route('lessons.index')}}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet"></i>
                        <span>Leçons</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/exercices*') ? "active" : '' }}">
                    <a href="{{route('exercices.index')}}" class='sidebar-link'>
                        <i class="bi bi-activity"></i>
                        <span>Exercices</span>
                    </a>
                </li>




            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
