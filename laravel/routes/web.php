<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Models\Course;


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
    $courses = Course::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('updated_at')
        ->limit(6)
        ->get();

    return view('users.dashboard', compact('courses'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/kadmin-user/dashboard', function () {
    return view('admins.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');


require __DIR__.'/adminauth.php';
