<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about-us', [MainController::class, 'about'])->name('about.us');
Route::get('/contact-us', [MainController::class, 'contact'])->name('contact');
Route::get('/pmi-atp', [MainController::class, 'pmiAtp'])->name('pmi.atp');
Route::get('/course-pmp', [MainController::class, 'pmpCourse'])->name('course.pmp');
Route::get('/courses', [MainController::class, 'courses'])->name('courses');
Route::get('/courses/{course:slug}', [MainController::class, 'courseDetail'])->name('course.show');
Route::get('/blogs', [MainController::class, 'blog'])->name('blog');

Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/kadmin-user/dashboard', function () {
    return view('admins.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


require __DIR__.'/adminauth.php';
