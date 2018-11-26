<nav id="sidebar" class="active" >
    <div class="sidebar-header">
        <h3></h3>
    </div>

    <ul class="list-unstyled components">
        <p> <a href="{{route('home')}}"> <i class="fas fa-home"></i> home</a></p>

        <li class="active">
            <a href="#leadSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leads Stats </a>
            <ul class="collapse list-unstyled" id="leadSubmenu">

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
                    <a href="{{route('kpi_indicators.leads.btw2dates')}}">KPI indicator Between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('leads.pending')}}">Pending leads</a>
                </li>


                <li>
                    <a href="{{route('leads.search')}}"><i class="fas fa-search"></i> Lead Search</a>
                </li>
            </ul>
        </li>

        <li class="active">
            <a href="#applicationsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Applications Stats </a>
            <ul class="collapse list-unstyled" id="applicationsSubmenu">


                <li>
                    <a href="{{route('application.byofficebtw2dates')}}">New Applications by Offices between 2 dates</a>
                </li>
                <li>
                    <a href="{{route('applications.bysources')}}">New Applications by Sources between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('appEvents.list.btwdates.offices')}}">Application Events Between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('applications.filter')}}">Application Filter</a>
                </li>


                <li>
                    <a href="{{route('kpi_indicators.leads.btw2dates')}}"> KPI indicator Between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('applications.pending')}}">Pending Applications</a>
                </li>


                <li>
                    <a href="{{route('applications.search')}}"><i class="fas fa-search"></i> Application Search</a>
                </li>
            </ul>
        </li>

        <li class="active">
            <a href="#ContactSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contacts Stats </a>
            <ul class="collapse list-unstyled" id="ContactSubmenu">


                <li>
                    <a href="{{route('contact.byofficebtw2dates')}}">New Contacts by Offices between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('contactEvents.list.btwdates.offices')}}">Contacts Events Between 2 dates</a>
                </li>


                <li>
                    <a href="{{route('kpi_indicators.leads.btw2dates')}}"> KPI indicator Between 2 dates</a>
                </li>

                <li>
                    <a href="{{route('contacts.search')}}"><i class="fas fa-search"></i> Contacts Search</a>
                </li>
            </ul>
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
                    <a href="{{route('counselors.counselor.index')}}">Counselors</a>
                </li>

                <li>
                    <a href="{{route('admissions.admissions.index')}}">Admissions</a>
                </li>
                <li>
                    <a href="{{route('kpi_indicators.kpi_indicator.index')}}">KPI Indicator</a>
                </li>

                <li>
                    <a href="{{route('holidays.holiday.index')}}">Hollydays</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#">About</a>
        </li>

    </ul>

    <ul class="list-unstyled CTAs">

    </ul>
</nav>