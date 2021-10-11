<head>
​<style>
    
@media only screen and (max-width: 500px) {
  .nav-label {
      display: none;
  }
}
</style>
</head>
<div class="row border-bottom mb-2">

    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header" style="float: right;margin: 10px;">
            <a class="togglebutton btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" method="post" action="/">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search" />
                </div>
            </form> -->
        </div>
        <ul class="nav navbar-top-links navbar-right ml-5" style="float: left;">
            <li>
                <a href="{{ url('/logout') }}">

                    <i class="fa fa-sign-out"></i> خروج
                </a>
            </li>
        </ul>
    </nav>
</div>

<script src="{{ asset('js/toggle-navbar.js') }}"></script>
