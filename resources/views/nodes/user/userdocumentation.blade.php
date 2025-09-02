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
     @include('components.navbar')
     
     
    <div class="container-fluid p-0">

        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="p-3">
                    <h4 class="mb-4">
                        <i class="fas fa-book"></i>
                        Documentation
                    </h4>
                    

                    <!-- Navigation Tree -->
                    <nav class="nav flex-column">
                        @include('nodes.partials.sidebar-tree', ['nodes' => $roots, 'level' => 0])
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 content-area">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div id="content-display">
                    @if($currentNode && $currentNode->type === 'content')
                        <div class="content-card">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <div>
                                    <h1 class="display-4">{{ $currentNode->heading }}</h1>
                                    @if($currentNode->subheading)
                                        <p class="lead text-muted">{{ $currentNode->subheading }}</p>
                                    @endif
                                </div>
                               
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
                        <div class="welcome-screen">
                            <div>
                                <i class="fas fa-book-open fa-5x mb-4"></i>
                                <h1>Welcome to Documentation</h1>
                                <p class="lead">Select a content item from the sidebar to view it here.</p>
                                
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

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