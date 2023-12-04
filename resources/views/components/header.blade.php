
    <div class="logo">
        <h1>DEEPLIGHT</h1>
        <h4>Restaurant</h4>
    </div>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/menu">Menu</a></li>
            <li><a href="/reservation">Reservation</a></li>
            <li><a href="/contact">Contact</a></li>
            @if(auth()->check() && auth()->user()->is_admin)
                <li><a href="/dashboard">Dashboard</a></li>
            @endif
    </nav>