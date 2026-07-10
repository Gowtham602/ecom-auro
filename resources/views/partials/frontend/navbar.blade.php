@guest

<a href="{{ route('login') }}">Login</a>

<a href="{{ route('register') }}">Register</a>

@endguest


@auth
<!-- 
<a href="#">
    Cart
</a>

<div class="dropdown">

{{ Auth::user()->name }}

Profile

Orders

Logout

</div> -->

@endauth