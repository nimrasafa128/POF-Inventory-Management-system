<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\UserAuthController;

// Main documentation page with sidebar
Route::get('/nodes/documentation', [NodeController::class, 'documentation'])->name('documentation');
// Set landing page to user documentation
Route::get('/', [NodeController::class, 'userDocumentation'])->name('userdocumentation');

// User documentation page (Landing page)
Route::get('/nodes/user/userdocumentation', [NodeController::class, 'userDocumentation'])->name('user.documentation');
// User-side documentation
// Developer/Admin side
Route::get('/documentation/{id?}', [NodeController::class, 'documentation'])
    ->name('documentation.show');

// User side
Route::get('/user/documentation/{id?}', [NodeController::class, 'userdocumentation'])
    ->name('user.documentation.show');

// Old index route for admin view
Route::get('/admin', [NodeController::class, 'index'])->name('admin.index');

// Other routes
Route::get('/nodes/create-parent', [NodeController::class, 'createParent'])
    ->name('nodes.create-parent');

// API route for getting node data
Route::get('/api/nodes/{id}', [NodeController::class, 'getNode'])->name('api.nodes.show');

// Resource routes for nodes
Route::resource('nodes', NodeController::class);
Route::get('/debug-tree', [NodeController::class, 'debugTree']);

Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');


Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
// Static Pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/softwares', 'pages.softwares')->name('softwares');
Route::view('/tender', 'pages.tender')->name('tender');
Route::view('/contact', 'pages.contact')->name('contact');
