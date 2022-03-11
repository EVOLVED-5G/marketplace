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
                                <a href="#" class="list-link link-arrow"><span class="list-icon">
                                        <img class="me-2" loading="lazy" src="/img/netapp-icon.png" alt="netapp-icon" /></span>My
                                    Net
                                    Apps</a>
                                <!-- list items, second level -->
                                <ul class="list-unstyled list-hidden">
                                    @forelse($netapps as $netapp)
                                    <li>
                                        <a href="#" class="list-link link-arrow">{{ $netapp->name }}</a>
                                        <!-- list items, third level -->
                                        <ul class="list-unstyled list-hidden">
                                            <li>
                                                <a href="{{ route('edit-netapp', $netapp->id) }}" class="list-link">Details</a>
                                            </li>
                                            <li>
                                                <a href="#" class="list-link">Track/revenue</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                            <!-- comments -->
                            <li class="mb-2">
                                <a href="#" class="list-link link-arrow"><span class="list-icon"><i class="fas fa-cloud-download-alt"></i></span>My
                                    purchased
                                    NetApp</a>
                                <!-- list items, second level -->
                                <!-- <ul class="list-unstyled list-hidden">
                                    <li>
                                        <a href="#" class="list-link">NetApp 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="list-link">NetApp 2</a>
                                    </li>
                                </ul> -->
                            </li>
                            <li>
                                <a href="#" class="list-link link-current"><span class="list-icon"><i class="fas fa-bookmark"></i></span>Saved items</a>
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