<footer class="for-lg">
    <div class="section-wrapper">
        <div class="footer-wrapper">
            <div id="footerNav" class="layout justified">
                <div class="flex">
                    <h5>LET'S GET IN TOUCH</h5>
                    <p>Email: info@abellabateyunga.com</p><br>
                    <div id="socialMediaLinks">
                        <a href="https://www.facebook.com/abellapaul.bateyunga" target="_blank" class="social-icon facebook layout inline center-center">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/abellabateyunga" target="_blank" class="social-icon twitter layout inline center-center">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/abellabateyunga/" target="_blank" class="social-icon instagram layout inline center-center">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCucKmNIv-Vll9W1Cf8y81jA" target="_blank" class="social-icon youtube layout inline center-center">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </div>
                </div>

                <div class="fle layout inline vertical center">
                    <h5>TV SHOWS</h5>
                    <ul>
                        @foreach($shows as $show)
                            <li>
                                <a href="{{url('/show/'.$loop->iteration)}}">
                                    {{$show}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div  class="fle layout inline vertical center">
                    <h5>FEEL ME IN</h5>
                    <ul>
                        @foreach($feel_me as $show)
                            <li>
                                <a href="{{url('/feel_me/'.$loop->iteration)}}">
                                    {{$show}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div id="copyright" class="layout center-center">
            <span>
                Copyright &copy; All rights reserved Abella Bateyunga {{date('Y')}} &nbsp; | &nbsp;&nbsp;
            </span>
            <span>
                Web Strategies by
                <a href="http://ipfsoftwares.com" target="_blank" class="highlight">iPF Softwares</a>
            </span>
        </div>
    </div>
</footer>