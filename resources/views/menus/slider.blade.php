<nav id="sidebar" class="active" >
    <div class="sidebar-header">
        <h3></h3>
    </div>

    <ul class="list-unstyled components">
        <p>List of stats</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stats list</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">

                <li>
                    <a href="{{route('leads.lead.byoffice')}}">New  Daily leads by Offices</a>
                </li>
                <li>
                    <a href="{{route('leads.lead.byofficebtw2dates')}}">New leads by Offices between 2 dates</a>
                </li>
                <li>
                    <a href="#">stats 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>

    </ul>

    <ul class="list-unstyled CTAs">

    </ul>
</nav>