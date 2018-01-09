
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Sheep App</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('spending.index') }}">Spending</a></li>
                <li><a href="{{ route('spending.create') }}">Create</a></li>
                <li><a href="{{ route('user.index') }}">Users</a></li>
                <li><a href="{{ route('balance') }}">Balance</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!-- Authentication Links -->
                    @guest
                        <p class="control">
                            <a class="button is-primary" href="{{ route('login') }}">
                            <span class="icon">
                                <i class="fa fa-user-circle"></i>
                            </span>
                                <span>Login</span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="button is-info" href="{{ route('register') }}">
                            <span class="icon">
                                <i class="fa fa-user-circle"></i>
                            </span>
                                <span>Register</span>
                            </a>
                        </p>
                    @else
                        <p class="control">
                            <a class="button is-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </span>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </p>
                    @endguest
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1 class="text-center">Total: <span class="count">{{$total}}</span></h1>

@section('scripts')
    <script>
        var a = 0;
        if (a == 0) {
            $('.count').each(function () {
                var $this = $(this),
                    countTo = $this.text();
                console.log(countTo);
                $({countNum: 0}).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(countTo);
                        //alert('finished');
                    }
                });
            });
        }
    </script>
@endsection