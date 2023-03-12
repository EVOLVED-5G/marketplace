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
                                <a href="#"
                                   class="list-link link-arrow
                                   {{ UrlMatchesMenuItem('edit-netapp', 'active link-current') }}
                                   {{ UrlMatchesMenuItem('revenue-page', 'active link-current') }}">
                                    <span class="list-icon">
                                        <img class="me-2" loading="lazy" src="/img/netapp-icon.png" alt="netapp-icon"/></span>
                                    My Network Apps
                                </a>
                                <!-- list items, second level -->
                                <ul class="list-unstyled list-hidden p-2">
                                    @forelse($netapps as $netapp)
                                        <li>
                                            <a href="#"
                                               class="list-link link-arrow
                                               {{ UrlMatchesMenuItem('edit-netapp/' . $netapp->id, 'active link-current') }}
                                               {{ UrlMatchesMenuItem('revenue-page/' . $netapp->id, 'active link-current') }}">
                                                {{ $netapp->name }}
                                            </a>
                                            <!-- list items, third level -->
                                            <ul class="list-unstyled list-hidden p-2">
                                                <li class="list-item">
                                                    <a href="{{ route('edit-netapp', $netapp->id) }}"
                                                       class="list-link {{ UrlMatchesMenuItem('edit-netapp/' . $netapp->id, 'link-current') }}">
                                                        Details
                                                    </a>
                                                </li>
                                                <li class="list-item">
                                                    <a href="{{route('revenue-page',$netapp->id)}}"
                                                       class="list-link {{ UrlMatchesMenuItem('revenue-page/' . $netapp->id, 'link-current') }}">
                                                        Purchases
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @empty
                                        <li class="list-item">
                                            <p>You haven’t created any NetApps yet</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="mb-2">
                                <a href="{{route('my-purchased-netapps')}}"
                                   class="list-link {{ UrlMatchesMenuItem('my-purchased-netapps', 'link-current') }}">
                                    <span class="list-icon"><i class="fas fa-cloud-download-alt"></i></span>
                                    My purchases
                                </a>
                            </li>
                            <li>
                                <a href="{{route('saved-netapp')}}"
                                   class="list-link {{ UrlMatchesMenuItem('saved-netapp', 'link-current') }}"><span
                                        class="list-icon"><i class="fas fa-bookmark"></i></span>Saved items</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr/>
                <p class="text-note"><b>Action</b></p>
                <a class="mouse-cursor-gradient-tracking btn btn--tertiary mt-2" href="{{ route('create-netapp') }}">
                    Create new Network App
                </a>
            </div>
        </div>
    </div>
</nav>
