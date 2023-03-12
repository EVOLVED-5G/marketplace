
    <footer class="footer">
        <div class="footer__info">
            <div class="content row">
                <div class="col-lg-6 col-md-4 col-sm-5 col-xs text-md-start text-sm-center mb-2 d-flex justify-content-md-between justify-content-around flex-column  ">
                    <a href="#">
                        <img class="img-fluid mb-4" loading="lazy" src="/img/logo-footer.png" alt="logo-footer">
                    </a>
                    <div class="social d-flex justify-content-between">
                        <a href="https://www.facebook.com/evolved5g" target="_blank"> <i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/evolved5g" target="_blank"> <i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/in/evolved-5g-project" target="_blank"> <i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/evolved5g/" target="_blank">    <i class="fab fa-instagram-square"></i></a>
                        <a href="https://www.youtube.com/channel/UClGygB1TMxeZlWMOl3vajlA" target="_blank"> <i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-7 col-xs ">
                    <div class="footer__info--links">
                        <div class="d-flex  justify-content-sm-start">

                            <ul>
                                <li class="mb-4">
                                    <h2><b>Useful links</b></h2>
                                </li>
                                <li class="mb-2"><a href="https://forum.evolved-5g.eu/" target="_blank">Forum</a></li>

                                <li class="mb-2"><a href="https://github.com/EVOLVED-5G/SDK-CLI" target="_blank">EVOLVED-5G SDK</a></li>
                                <li class="mb-2"><a href="https://evolved-5g.eu/" target="_blank">Project webpage</a></li>
                                <li class="mb-2"><a href="https://evolved5g-cli.readthedocs.io/en/latest/" target="_blank">Network App development instructions</a></li>
                            </ul>
                        </div>
                        {{-- <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-start">
                            <ul>
                                <li class="mb-4">
                                    <h2><b>Check more</b></h2>
                                </li>
                                <li class="mb-2"><a href="https://evolved-5g.eu/" target="_blank">Project webpage</a></li>
                                <li><a href="#">Newsletter</a></li>

                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__copyrights p-3">
            <div class="content text-details row">
                <div class="col-lg-8 col-md-5 text-md-start text-sm-center mb-2">©Evolved-5G {{ now()->year }} | <small>{{ config('app.version') }}</small>
                </div>

                <div class="col-lg-4 col-md-4 text-md-end text-sm-center"><a href="{{ route('privacy-policy') }}"><b>Terms and Conditions & Privacy Policy</b></a></div>
            </div>
        </div>
    </footer>

