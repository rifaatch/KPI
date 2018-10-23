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
                    <a href="{{route('leads.bysources')}}">New leads by Sources between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('LeadEvents.LeadEvent.list.btwdates.offices')}}">Events Between 2 dates</a>
                </li>


                <li>
                    <a href="{{route('kpi_indicators.leads.btw2dates')}}">Leads KPI indicator Between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('leads.pending')}}">Pending leads</a>
                </li>


                <li>
                    <a href="{{route('leads.search')}}"><i class="fas fa-search"></i> Lead Search</a>
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
                    <a href="{{route('employees.employee.index')}}">Employees</a>
                </li>
                <li>
                    <a href="{{route('offices.office.index')}}">Offices</a>
                </li>
                <li>
                    <a href="{{route('kpi_indicators.kpi_indicator.index')}}">KPI Indicator</a>
                </li>

                <li>
                    <a href="{{route('holidays.holiday.index')}}">Hollydays</a>
                </li>

            </ul>
        </li>

    </ul>

    <ul class="list-unstyled CTAs">

    </ul>
</nav>