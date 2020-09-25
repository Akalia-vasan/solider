
@include('admin.partials.header')

	@yield('content')
	@yield('_')
    <!-- Footer Start -->
    <div class="flex-grow-1"></div>
    <div class="app-footer">

                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">

                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">

                        <div>
{{--                            <p class="m-0">&copy; 2020 copyright comes here</p>--}}
{{--                            <p class="m-0">with All rights reserved</p>--}}
                        </div>
                    </div>
                </div>
    </div>
    <!-- fotter end -->
</div>
</div>
{{-- @include('admin.partials.model') --}}
@include('admin.partials.footer')

</body>

</html>
