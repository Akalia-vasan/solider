
<footer>
    <div class="row mainDiv py-5">
       <div class="col-md-5 align-self-center" >
         <div class=" col-md-10">

         </div>
         <div class=" col-md-7 mt-5">
         </div>
       </div>
       <div class="col-md-7">
          <div class="row Footerlist">
             <div class="col-md-2">
                <ul class="list-unstyled">
                   <h6 class="Ofw-600  lh-2	 fs-15">Site Links </h6>
                   <li class="Ofw-600  lh-2	 fs-13 " > <a href="{{URL::to('/')}}" style="cursor: pointer;text-decoration:none;"> Home </a> </li>
                   <li class="Ofw-600  lh-2	 fs-13 " > <a href="#" style="cursor: pointer;text-decoration:none;"> About Us </a></li>
                   <li class="Ofw-600  lh-2	 fs-13 " > <a href="#" style="cursor: pointer;text-decoration:none;">Contact Us </a> </li>
                </ul>
             </div>
             <div class="col-md-2">
                 <ul class="list-unstyled">
                   <h6 class="Ofw-600  lh-2	 fs-15">Important Links</h6>
                   <li class="Ofw-600  lh-2	 fs-13 " > <a href="#" style="cursor: pointer;text-decoration:none;"> T & C </a> </li>
                   <li class="Ofw-600  lh-2	 fs-13 " > <a href="#" style="cursor: pointer;text-decoration:none;"> Privacy Policy </a></li>
                </ul>
             </div>
             <div class="col-md-2">
                 <ul class="list-unstyled">

                   <h6 class="Ofw-600  lh-2	 fs-15">Contact Info</h6>
                   <li class="Ofw-600  lh-2	 fs-13">Email</li>
                   <li class="Ofw-600  lh-2	 fs-13">Phone</li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome Link -->
    <script src="https://kit.fontawesome.com/f545d1845e.js" crossorigin="anonymous"></script>
    <!-- Slik Slider -->
    <!--script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
       <!-- vr -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/aframe/0.7.1/aframe.min.js"></script> >
       <!-- chart js -->
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> --}}
    <!-- main.js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

    <script>
        const urls = {
            home : '{{asset("/")}}',
            login: '{{url("/login")}}',
            logout: '{{URL('/logout')}}',
        };
          @if(Session::has('msg'))
             toastr.success('{{Session::get("msg")}}');
          @endif
          @if(Session::has('err'))
              toastr.error('{{Session::get("err")}}');
              setTimeout(function(){
                  toastr.fadeOut(4000);
              }, 5000);
          @endif
          $('#loginModal').on('hidden.bs.modal', function () {
              $('#loginModal form input#loginEmail + p').remove();
              $('#loginModal form input#loginPassword + p').remove();
              var element = document.getElementById("loginEmail");
              var password = document.getElementById("loginPassword");
              element.classList.remove("ErrorMsg");
              password.classList.remove("ErrorMsg");
          });
    </script>
    @yield('js')
    <script src="{{asset('assets/js/script.js')}}"></script>
    </body>
    </html>
