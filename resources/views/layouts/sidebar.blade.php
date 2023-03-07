<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'User' }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span class="ellipsis">
                            {{-- @php
                                dd(Auth::user()) ;    
                            @endphp --}}
                            {{ Auth::user()->nama ?? 'User' }}
                            {{-- <span class="user-level">{{ ucfirst(Auth::user()->role) ?? 'Guest' }}</span> --}}
                            <span class="user-level">{{ Auth::user()->role ?? 'User' }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ (request()->is('*dashboard*') || @$dashboard) ? 'active' : '' }}">
                    <a href="/" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('*user*')) ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <p>Admin</p>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('*test*')) ? 'active' : '' }}">
                    <a href="{{ route('test.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-file-signature"></i>
                        <p>Hashmicro Test</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
