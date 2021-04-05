<head></head>
<nav id="sidebar">
    <div class="sidemenu">
        <ul class="list-group ">
            <li class="list-group-item list-group-item-secondary"> <a href="#"><i
                        class="ri-chat-check-line"></i><b>Employee Management</b></a> </li>
            <li class="list-group-item list-group-item-secondary"> <a href="#homeSubmenu" data-toggle="collapse"
                    aria-expanded="false" class="dropdown-toggle"><b>System Mangement</b></a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li> <a href="{{route('country.index')}}">Country</a> </li>
                    <li> <a href="{{route('state.index')}}">State</a> </li>
                    <li> <a href="{{route('city.index')}}">City</a> </li>
                    <li> <a href="{{route('department.index')}}">Department</a> </li>
                </ul>
            </li>
            <li class="list-group-item list-group-item-secondary"> <a href="#pageSubmenu" data-toggle="collapse"
                    aria-expanded="false" class="dropdown-toggle"><b>User Management</b></a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li> <a href="{{route('userdata.index')}}">User</a> </li>
                    <li> <a href="#">Role</a> </li>
                    <li> <a href="#"> Permission</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>