<nav role="navigation" class="sidebar sidebar-bg-white" id="navigation">
    <!-- sidebar -->
    <div class="sidebar-menu">
        <!-- menu fixed -->
        <div class="sidebar-menu-fixed">
            <!-- menu scrollbar -->
            <div class="scrollbar scrollbar-use-navbar scrollbar-bg-white">
                <p class="text-note mb-0">
                    <b>My list</b>
                </p>
                <!-- menu -->
                <ul class="list list-unstyled list-bg-white list-icon-purple mb-0">
                    <!-- multi-level dropdown menu -->
                    <li class="list-item">
                        <!-- list items -->
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="list-link link-arrow {{ UrlMatchesMenuItem('edit-netapp', 'link-current') }}"><span class="list-icon">
                                        <img class="me-2" loading="lazy" src="/img/netapp-icon.png" alt="netapp-icon" /></span>My
                                    Net
                                    Apps</a>
                                <!-- list items, second level -->
                                <ul class="list-unstyled list-hidden p-2">
                                    @forelse($netapps as $netapp)
                                    <li>
                                        <a href="#" class="list-link link-arrow">{{ $netapp->name }}</a>
                                        <!-- list items, third level -->
                                        <ul class="list-unstyled list-hidden p-2">
                                            <li class="list-item">
                                                <a href="{{ route('edit-netapp', $netapp->id) }}" class="list-link">Details</a>
                                            </li>
                                            <li class="list-item">
                                                <a href="{{route('revenue-page',$netapp->id)}}" class="list-link">Track/revenue</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @empty
                                    <li class="list-item">
                                        <p>You haven’t created any netapps yet</p>
                                    </li>
                                    @endforelse
                                </ul>
                            </li>
                            <!-- comments -->
                            <li class="mb-2">
                                <a href="#" class="list-link link-arrow {{ UrlMatchesMenuItem('my-purchased-netapp', 'link-current') }}">
                                    <span class="list-icon"><i class="fas fa-cloud-download-alt"></i></span>My purchased NetApps
                                </a>
                                <!-- list items, second level -->
                                <ul class="list-unstyled list-hidden">
                                    @forelse($purchasednetapps as $purchased)
                                    <li>
                                        <a href="{{route('my-purchased-netapp',$purchased->hash)}}" class="list-link">{{$purchased->netapp->name}}</a>
                                    </li>
                                    @empty
                                    <li>
                                        <p>You haven’t purchased any netapp yet</p>
                                    </li>
                                    @endforelse

                                </ul>
                            </li>
                            <li>
                                <a href="{{route('saved-netapp')}}" class="list-link {{ UrlMatchesMenuItem('saved-netapp', 'link-current') }}"><span class="list-icon"><i class="fas fa-bookmark"></i></span>Saved items</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr />
                <p class="text-note"><b>Action</b></p>
                <a class="btn btn--tertiary mt-2" href="{{ route('create-netapp') }}">Create new
                    NetApp</a>
            </div>
        </div>
    </div>
</nav>
