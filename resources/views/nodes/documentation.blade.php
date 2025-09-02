<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation - Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            overflow-y: auto;
            background: white;
            color: #17a2b8;
             
        }
        
        .sidebar .nav-link {
            color: #666;
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
           
        }
        
        .sidebar .nav-link:hover,
        .sidebar button.nav-link:hover {
            color: #17a2b8;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            color: #666;
            background: rgba(255, 255, 255, 0.2);
            font-weight: bold;
        }
        
        .sidebar button.nav-link {
            color: #666;
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }
        .btn{
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content-area {
            height: 100vh;
            overflow-y: auto;
            background: #f8f9fa;
        }
        
        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 1rem;
        }
        
        .dropdown-toggle::after {
            display: none !important;
        }
        
        .fa-chevron-down {
            transition: transform 0.3s ease;
        }
        
        .collapse .nav {
            padding-left: 1rem;
            border-left: 2px solid rgba(255, 255, 255, 0.2);
            margin-left: 1rem;
        }
        
        .crud-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        .btn-floating {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(189, 23, 23, 0.1);
        }
        
        .welcome-screen {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            color: #6c757d;
        }
         /* Navbar Styles */
        .navbar {
            background-color: #fff;
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-container {
            background-color: #ffffff;
            max-width: fit-content;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            gap: 250px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }

        .logo {
            width: 40px;
            height: 40px;
            background-color: #000;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .logo::before {
            content: 'AB';
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .brand-text {
            font-weight: 600;
            font-size: 16px;
            color: #333;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #f1f3f4;
            border-radius: 25px;
            padding: 8px 12px;
            gap: 8px;
            list-style: none;
        }
       

        .nav-link {
            text-decoration: none;
            color: #666;
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 18px;
            transition: all 0.3s ease;
        }/* Add this to your existing styles in the documentation view */

/* Module controls styling */
.nav-item .dropdown .btn {
    padding: 2px 6px;
    font-size: 0.75rem;
    border: none;
    background: transparent;
    color: #6c757d;
}

.nav-item .dropdown .btn:hover {
    background: rgba(0, 123, 255, 0.1);
    color: #007bff;
}

.nav-item {
    margin: 2px 0;
}

.nav-item .d-flex {
    align-items: center;
}

/* Dropdown menu styling */
.dropdown-menu {
    font-size: 0.875rem;
    min-width: 150px;
}

.dropdown-item {
    padding: 6px 12px;
}

.dropdown-item i {
    width: 16px;
    margin-right: 8px;
}

.dropdown-item.text-danger:hover {
    background-color: #dc3545;
    color: white !important;
}

/* Ensure buttons don't interfere with collapse functionality */
.nav-item button[data-bs-toggle="collapse"] {
    border: none !important;
    box-shadow: none !important;
}

.nav-item button[data-bs-toggle="collapse"]:focus {
    outline: none;
    box-shadow: none;
}

        .nav-link:hover, .nav-link.active {
            color: #333;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .signUp-btn {
            background-color: #1B5869;
            color: white !important;
            text-decoration: none;
            padding: 10px 24px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            margin-left: 20px;

        }

        .signUp-btn:hover {
            background-color: #17a2b8;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <div class="navbar-container">
        <!-- Brand/Logo -->
        <a href="{{ route('userdocumentation') }}" class="navbar-brand">
            <div class="logo"></div>
            <span class="brand-text">FACTORY</span>
        </a>

        <!-- Navigation Links -->
        <ul class="navbar-nav">
            <li><a class="nav-link {{ request()->routeIs('documentation') ? 'active' : '' }}" href="{{ route('documentation') }}">Home</a></li>
            <li><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
            <li><a class="nav-link {{ request()->routeIs('softwares') ? 'active' : '' }}" href="{{ route('softwares') }}">Softwares</a></li>
            <li><a class="nav-link {{ request()->routeIs('tender') ? 'active' : '' }}" href="{{ route('tender') }}">Tender</a></li>
            <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>

        <!-- Sign Up Button -->
       <!-- Hidden form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<!-- Navbar link -->
<a href="#" class="btn btn-danger"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   Logout
</a>



    </div>
</nav>
     
     
    <div class="container-fluid p-0">

        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="p-3">
                    <h4 class="mb-4">
                        <i class="fas fa-book"></i>
                        Documentation
                    </h4>
                    
                    <!-- CRUD Buttons in Sidebar -->
                    <div class="mb-4">
                        <div class="d-grid gap-2">
                            <a href="{{ route('nodes.create-parent') }}" class="btn ">
                                <i class="fas fa-plus"></i> Add Parent Module
                            </a>
                            <a href="{{ route('nodes.create') }}" class="btn ">
                                <i class="fas fa-file-alt"></i> Add Child/Content
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Tree -->
                    <nav class="nav flex-column">
                        @include('nodes.partials.sidebar-tree', ['nodes' => $roots, 'level' => 0])
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
<!-- Main Content -->
<div class="col-md-9 content-area">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div id="content-display">
        @if($currentNode && $currentNode->type === 'module')
            {{-- Display module with all its content --}}
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h1 class="display-4">{{ $currentNode->heading }}</h1>
                        @if($currentNode->subheading)
                            <p class="lead text-muted">{{ $currentNode->subheading }}</p>
                        @endif
                    </div>
                    @if($context !== 'user')
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-cog"></i> Module Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('nodes.edit', $currentNode->id) }}">
                                    <i class="fas fa-edit"></i> Edit Module
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('nodes.create') }}?parent_id={{ $currentNode->id }}">
                                    <i class="fas fa-plus"></i> Add Content
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('nodes.destroy', $currentNode->id) }}" method="POST" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete Module
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- Display all content items under this module --}}
                @if($moduleContent && $moduleContent->count() > 0)
                    @foreach($moduleContent as $content)
                        <div class="content-item mb-5 p-4 border rounded" id="content-{{ $content->id }}">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3>{{ $content->heading }}</h3>
                                @if($context !== 'user')
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('nodes.edit', $content->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a></li>
                                            <li>
                                                <form action="{{ route('nodes.destroy', $content->id) }}" method="POST" style="display: inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            @if($content->subheading)
                                <p class="text-muted mb-3">{{ $content->subheading }}</p>
                            @endif

                            @if($content->picture)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $content->picture) }}" 
                                         alt="{{ $content->heading }}" 
                                         class="img-fluid rounded shadow" 
                                         style="max-height: 300px;">
                                </div>
                            @endif

                            <div class="content-text">
                                @if($content->paragraph1)
                                    <p>{{ $content->paragraph1 }}</p>
                                @endif
                                @if($content->paragraph2)
                                    <p>{{ $content->paragraph2 }}</p>
                                @endif
                                @if($content->paragraph3)
                                    <p>{{ $content->paragraph3 }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-file-plus fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No content in this module yet</h4>
                        @if($context !== 'user')
                            <p>Start by adding some content to this module.</p>
                            <a href="{{ route('nodes.create') }}?parent_id={{ $currentNode->id }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add First Content
                            </a>
                        @endif
                    </div>
                @endif
            </div>

        @elseif($currentNode && $currentNode->type === 'content')
            {{-- Individual content view (fallback for direct content access) --}}
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h1 class="display-4">{{ $currentNode->heading }}</h1>
                        @if($currentNode->subheading)
                            <p class="lead text-muted">{{ $currentNode->subheading }}</p>
                        @endif
                    </div>
                    @if($context !== 'user')
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('nodes.edit', $currentNode->id) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a></li>
                                <li>
                                    <form action="{{ route('nodes.destroy', $currentNode->id) }}" method="POST" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                @if($currentNode->picture)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $currentNode->picture) }}" 
                             alt="{{ $currentNode->heading }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 400px;">
                    </div>
                @endif

                <div class="content-text">
                    @if($currentNode->paragraph1)
                        <p>{{ $currentNode->paragraph1 }}</p>
                    @endif
                    @if($currentNode->paragraph2)
                        <p>{{ $currentNode->paragraph2 }}</p>
                    @endif
                    @if($currentNode->paragraph3)
                        <p>{{ $currentNode->paragraph3 }}</p>
                    @endif
                </div>
            </div>

        @else
            {{-- Welcome screen --}}
            <div class="welcome-screen">
                <div>
                    <i class="fas fa-book-open fa-5x mb-4"></i>
                    <h2>Welcome to Documentation</h2>
                    <p class="lead">Select a module from the sidebar to view its contents.</p>
                    @if($context !== 'user')
                        <p>You can also add new modules and content using the buttons in the sidebar.</p>
                        <a href="{{ route('nodes.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create New Module
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for content links
    document.querySelectorAll('.content-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Remove active class from all content links
                document.querySelectorAll('.content-link').forEach(l => l.classList.remove('active'));
                // Add active class to clicked link
                this.classList.add('active');
                
                // Smooth scroll to target
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Add highlight effect
                targetElement.classList.add('highlight');
                setTimeout(() => {
                    targetElement.classList.remove('highlight');
                }, 2000);
            }
        });
    });
    
    // Auto-highlight content sections on scroll
    const observerOptions = {
        root: null,
        rootMargin: '-100px 0px -80% 0px',
        threshold: 0
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                const correspondingLink = document.querySelector(`a[href="#${id}"]`);
                
                // Remove active from all links
                document.querySelectorAll('.content-link').forEach(l => l.classList.remove('active'));
                
                // Add active to current link
                if (correspondingLink) {
                    correspondingLink.classList.add('active');
                }
            }
        });
    }, observerOptions);
    
    // Observe all content sections
    document.querySelectorAll('.content-item[id^="content-"]').forEach(section => {
        observer.observe(section);
    });
});
</script>

<style>
.content-link {
    transition: all 0.2s ease;
    border-radius: 4px;
}

.content-link:hover {
    background-color: #f8f9fa;
    padding-left: 1rem;
}

.content-link.active {
    background-color: #e3f2fd;
    border-left: 3px solid #2196f3;
    font-weight: 600;
}

.content-item {
    transition: all 0.3s ease;
    scroll-margin-top: 80px; /* Offset for fixed headers if any */
}

.content-item.highlight {
    box-shadow: 0 0 20px rgba(33, 150, 243, 0.3);
    border-color: #2196f3;
}

/* Smooth scroll for the entire page */
html {
    scroll-behavior: smooth;
}
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle button-based dropdown toggles
            document.querySelectorAll('button[data-bs-toggle="collapse"]').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const targetId = this.getAttribute('data-bs-target');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(targetElement);
                        bsCollapse.toggle();
                        
                        // Update chevron rotation
                        const chevron = this.querySelector('.fa-chevron-down');
                        if (chevron) {
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';
                            if (isExpanded) {
                                chevron.style.transform = 'rotate(0deg)';
                                this.setAttribute('aria-expanded', 'false');
                            } else {
                                chevron.style.transform = 'rotate(180deg)';
                                this.setAttribute('aria-expanded', 'true');
                            }
                        }
                    }
                });
            });

            // Auto-expand for active content
            const currentPath = window.location.pathname;
            document.querySelectorAll('.sidebar a.nav-link').forEach(function(link) {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                    
                    // Find and expand all parent collapses
                    let parent = link.closest('.collapse');
                    while (parent) {
                        parent.classList.add('show');
                        const toggleButton = document.querySelector(`[data-bs-target="#${parent.id}"]`);
                        if (toggleButton) {
                            toggleButton.setAttribute('aria-expanded', 'true');
                            const chevron = toggleButton.querySelector('.fa-chevron-down');
                            if (chevron) {
                                chevron.style.transform = 'rotate(180deg)';
                            }
                        }
                        parent = parent.parentElement.closest('.collapse');
                    }
                }
            });

            // Handle collapse events for proper chevron animation
            document.querySelectorAll('.collapse').forEach(function(collapseEl) {
                collapseEl.addEventListener('shown.bs.collapse', function() {
                    const toggle = document.querySelector(`[data-bs-target="#${this.id}"]`);
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'true');
                        const chevron = toggle.querySelector('.fa-chevron-down');
                        if (chevron) {
                            chevron.style.transform = 'rotate(180deg)';
                        }
                    }
                });

                collapseEl.addEventListener('hidden.bs.collapse', function() {
                    const toggle = document.querySelector(`[data-bs-target="#${this.id}"]`);
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'false');
                        const chevron = toggle.querySelector('.fa-chevron-down');
                        if (chevron) {
                            chevron.style.transform = 'rotate(0deg)';
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>