<!-- Footer Start -->


<!-- fotter end -->
</div>
<!-- ============ Body content End ============= -->
</div>
<!--=============== End app-admin-wrap ================-->

<script src="{{asset('asset/js/vendor/jquery-3.3.1.min.js')}} "></script>
<script src="{{asset('asset/js/vendor/bootstrap.bundle.min.js')}} "></script>
<script src="{{asset('asset/js/vendor/perfect-scrollbar.min.js')}} "></script>
<script src="{{asset('asset/js/vendor/echarts.min.js')}} "></script>
<script src="{{asset('asset/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('asset/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('asset/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('asset/js/vendor/ladda.js')}}"></script>
<script src="{{asset('asset/js/es5/dashboard.v4.script.min.js')}} "></script>
<script src="{{asset('asset/js/vendor/toastr.min.js')}}"></script>
<script src="{{asset('asset/js/es5/script.min.js')}}"></script>
<script src="{{asset('asset/js/es5/sidebar.large.script.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script>
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN'  : $("meta[name=csrf-token]").attr('content')
        }
    })
        </script>
<script>
    @if(Session::has('msg'))
        toastr.success('{{Session::get("msg")}}');
    @endif
    @if(Session::has('err'))
        toastr.error('{{Session::get("err")}}');
    @endif
</script>
@yield('js')
</body>

</html>
