<html>
   
<body>    
<nav class="navbar">
    <div class="navbar-container">
        <!-- Brand/Logo -->
        <a class="navbar-brand">
            <div class="logo"></div>
            <span class="brand-text">FACTORY</span>
        </a>

        <!-- Navigation Links -->
        <ul class="navbar-nav">
            <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">Home</a></li>
            <li><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="#">About</a></li>
            <li><a class="nav-link {{ request()->routeIs('softwares') ? 'active' : '' }}" href="#">Softwares</a></li>
            <li><a class="nav-link {{ request()->routeIs('tender') ? 'active' : '' }}" href="#">Tender</a></li>
            <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="#">Contact Us</a></li>
        </ul>

        <!-- Sign Up Button -->
        <a href="register" class="signUp-btn">Sign Up</a>
        
    </div>
</nav>
</body>
</html>

