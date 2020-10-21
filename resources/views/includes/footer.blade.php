<section id="footer-container" class="@if(\Request::is('/'))index-class @endif">

    <section class="container">

        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-4 text-center text-sm-left">
                <a href="/" class="site-logo" style="text-decoration:none; color:#000;">
                    <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto,w_180,h_87/v1601875287/postalandzipcodes.ph/full-logo.svg" class="img-fluid" width="180" height="87" alt="postalandzipcodes.ph logo">
                </a>
            </div> <!-- END .col-lg-6 -->

            <div class="col-lg-6 col-md-7 col-sm-8">
                <div class="number-count-part d-flex">
                    <div class="number-count-item">
                        <span class="number">{{ session('sess_contributors') ?? 0 }} 🌱</span>
                        <p>contributed zip codes</p>
                    </div>

                    <div class="number-count-item">
                        <span class="number">{{ session('sess_contributed_zip_codes') ?? 0 }} 🧑‍🤝‍🧑</span>
                        <p>total contributors</p>
                    </div>
                </div>
            </div> <!-- END .col-lg-6 -->
        </div> <!-- END .row -->


        <div class="footer-top-second">
          
            <div class="row justify-content-between">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget widget-about">
                  <h3 class="widget-title">Useful</h3>
                  <ul class="footer-list-menu">
                    <li><a href="/what-is-my-zip-code" title="Get your current location's zip code information.">What is Your Zip Code</a></li>
                    <li><a href="/how-it-works" title="How it works?">How it Works</a></li>
                    <li><a href="/about-us" title="About us">About us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget widget-links">
                  <h3 class="widget-title">Links</h3>
                  <ul class="footer-list-menu">
                    <li><a href="/terms-of-service" target="" title="Terms of Service">Terms of Service</a></li>
                    <li><a href="/privacy-policy" target="" title="Privacy Policy">Privacy Policy</a></li>
                    <li><a href="/sitemap" target="" title="Sitemap">Sitemap</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget widget-subscribe">
                <h3 class="widget-title">
                    Didn't find what you are looking for?
                </h3>
                  <div class="submit-zipcode-part">
                    <p>
                        Help us maintain an updated <u>DIRECTORY FOR ZIP CODES</u> by submitting your location's zip code information. So others will find it easily here with your help!
                    </p>
                    
                    <a href="{{ route('submit-zip-code') }}" title="Submit and share zip code information.">Submit ZIP Code</a> 🥰
                  </div>
                </div>
              </div>
            </div>
          
        </div>
    </section> <!-- END container -->
</section> <!-- END footer-container -->

<section id="planet-vibration" >

    <section class="container">
        <div class="row">
            <div class="col-lg-6">
                <address>
                    <strong>&copy; {{ date('Y') }} postalandzipcodes.ph</strong>
                    <br>
                    <small title="Filled with love just for you my countrymen.">Pinuno ng <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/w_15,c_fill/v1558095370/lottopcso.ph/heart_gif_c9btz0.gif" alt="Pagmamahal" /> para sa'yo Kabayan.</small>
                </address>
            </div>

            <div class="col-lg-6" hidden>
              <div class="social-buttons">
                <small>Connect with us:</small>
                <a href="#" title="Facebook"><i class="fa fa-facebook fa-fw fa-2x"></i></a>
                <a href="#" title="Twitter"><i class="fa fa-twitter fa-fw fa-2x"></i></a>
                <a href="#" title="Youtube"><i class="fa fa-youtube fa-lw fa-2x"></i></a>
              </div>
            </div>
        </div>
    </section> <!-- END container -->
</section>