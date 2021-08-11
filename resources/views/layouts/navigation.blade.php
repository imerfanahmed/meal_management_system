<li class=" nav-item {{request()->is('/') ? 'active' : ''}}">
    <a class="d-flex align-items-center" href="{{url('/')}}">
        <i data-feather="activity"></i>
        <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
    </a>

</li>

<li class=" nav-item {{request()->is('members') ? 'active' : ''}}">
    <a class="d-flex align-items-center" href="{{url('/members')}}">
        <i data-feather="users"></i>
        <span class="menu-title text-truncate">Members</span>
    </a>

</li>

<li class=" nav-item {{request()->is('bazar_cost') ? 'active' : ''}}">
    <a class="d-flex align-items-center" href="{{url('/bazar_cost')}}">
        <i data-feather="shopping-bag"></i>
        <span class="menu-title text-truncate">Bazar Cost</span>
    </a>
</li>

<li class=" nav-item {{request()->is('daily_meal') ? 'active' : ''}}">
    <a class="d-flex align-items-center" href="{{url('/daily_meal')}}">
        <i class="fas fa-utensils"></i>
        <span class="menu-title text-truncate">Daily Meal</span>
    </a>
</li>
<li class=" nav-item {{request()->is('configuration') ? 'active' : ''}}">
    <a class="d-flex align-items-center" href="{{url('/configuration')}}">
        <i data-feather="settings"></i>
        <span class="menu-title text-truncate">Configuration</span>
    </a>
</li>
