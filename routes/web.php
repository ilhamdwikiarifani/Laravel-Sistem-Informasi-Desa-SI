<?php



use App\Models\Post;
use App\Models\Category;
use App\Models\Masyarakat;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\DanaMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DanaKeluarController;

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\MasyarakatController;

use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// landing page
// profile
Route::get('/profil-desa', function () {
    return view('landing-page.profil-desa', [
        "title" => "Profile Desa"
    ]);
});
// visi misi
Route::get('/visi-misi', function () {
    return view('landing-page.visi-misi', [
        "title" => "Visi & Misi"
    ]);
});
// struktur pemerintahan
Route::get('/struktur-pemerintahan', function () {
    return view('landing-page.struktur-pemerintahan', [
        "title" => "Struktur Pemerintahan"
    ]);
});
// dana
Route::get('/dana', [DanaController::class, 'landingPage']);
// about
Route::get('/about', function () {
    return view('landing-page.about', [
        "title" => "Tentang"
    ]);
});
// contact
Route::get('/contact', function () {
    return view('landing-page.contact', [
        "title" => "hubungi"
    ]);
});
Route::post('contact', [ContactController::class, 'store'])->name('contact.us.store');

// memanggil controller dan model untuk menampilkan data pada post dan category
Route::get('/', [PostController::class, 'home']);
Route::get('/berita', [PostController::class, 'berita']);
Route::get('/berita/{post:slug}', [PostController::class, 'show']);
Route::get('/berita/kategori/{category:slug}', [CategoryController::class, 'berita']);



// ---------------------------------------
// L o g i n
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//


// --------------------------------------
// admin
Route::middleware([auth::class])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin', function () {
        return view('admin.dashboard', [
            "title" => "Dashboard",
        ]);
    });

    // profile
    Route::resource('users', UserController::class);
    Route::get('/admin/profile', [UserController::class, 'show']);
    Route::get('/admin/profile/edit/{user:id}', [UserController::class, 'edit']);
    Route::post('/admin/profile/update-password/{user:id}', [UserController::class, 'updatePassword'])->name('updatePassword');

    // group berita
    Route::middleware(([IsAdmin::class]))->group(function () {
        // berita
        Route::get('/admin/berita', [PostController::class, 'index']);
        Route::get('/admin/berita/create', [PostController::class, 'create']);
        Route::get('/admin/berita/edit/{post:id}', [PostController::class, 'edit']);
        Route::resource('posts', PostController::class);
        Route::get('/admin/posts/createSlug', [PostController::class, 'checkSlug']);

        // kategori berita
        Route::get('/admin/kategori-berita', [CategoryController::class, 'index']);
        Route::get('/admin/kategori-berita/create', [CategoryController::class, 'create']);
        Route::get('/admin/kategori-berita/edit/{category:id}', [CategoryController::class, 'edit']);
        Route::resource('categories', CategoryController::class);
        Route::get('/admin/categories/create-slug', [CategoryController::class, 'slugest']);
    });

    // masyarakat
    Route::resource('masyarakats', MasyarakatController::class);
    Route::get('/admin/masyarakat', [MasyarakatController::class, 'index']);
    Route::get('/admin/masyarakat/create', [MasyarakatController::class, 'create']);
    Route::get('/admin/masyarakat/edit/{masyarakat:id}', [MasyarakatController::class, 'edit']);
    Route::get('/admin/masyarakat/show/{masyarakat:id}', [MasyarakatController::class, 'show']);
    Route::get('/admin/masyarakat/pdf', [MasyarakatController::class, 'generatePDF']);
    Route::get('/admin/masyarakat/print-preview', [MasyarakatController::class, 'previewPDF']);
    // surat keperluan
    Route::get('/admin/masyarakat/sk-tidak-mampu/{id}', [MasyarakatController::class, 'skTidakMampu']);
    // excel
    Route::get('/admin/masyarakat/export-excel', [MasyarakatController::class, 'masyarakatExcel'])->name('masyarakatExcel');
    // filter umur
    Route::get('/admin/pemilih', [MasyarakatController::class, 'pemilih'])->name('pemilih');

    // keluarga
    Route::resource('keluargas', KeluargaController::class);
    Route::get('/admin/keluarga', [KeluargaController::class, 'index']);
    Route::get('/admin/keluarga/create', [KeluargaController::class, 'create']);
    Route::get('/admin/keluarga/edit/{keluarga:id}', [KeluargaController::class, 'edit']);
    Route::get('/admin/keluarga/pdf', [KeluargaController::class, 'generatePDF']);
    Route::get('/admin/keluarga/print-preview', [KeluargaController::class, 'previewPDF']);

    Route::post('/admin/masyarakat/baru', [MasyarakatController::class, 'simpan']);

    // Route::resource('masyarakat.simpan', [MasyarakatController::class,'simpan']);
    Route::get('/admin/masyarakat/create/{id}', [MasyarakatController::class, 'baru']);

    // agama
    Route::resource('agamas', AgamaController::class);
    Route::get('/admin/list-agama', [AgamaController::class, 'index']);
    Route::get('/admin/list-agama/create', [AgamaController::class, 'create']);
    Route::get('/admin/list-agama/edit/{agama:id}', [AgamaController::class, 'edit']);

    // manage user
    Route::middleware([isAdmin::class])->group(function () {
        Route::resource('manage-users', ManageUserController::class);
        Route::get('/admin/manage-user', [ManageUserController::class, 'index']);
        Route::get('/admin/manage-user/create', [ManageUserController::class, 'create']);
        Route::get('/admin/manage-user/edit/{user:id}', [ManageUserController::class, 'edit']);
        Route::get('/admin/manage-user/detail/{user:id}', [ManageUserController::class, 'show']);
    });


    // dana sumber
    Route::resource('danas', DanaController::class);
    Route::get('/admin/dana', [DanaController::class, 'index']);
    Route::get('/admin/dana/create', [DanaController::class, 'create']);
    Route::get('/admin/dana/edit/{dana:id}', [DanaController::class, 'edit']);
    Route::get('/admin/dana/show/{dana:id}', [DanaController::class, 'show']);
    Route::get('/admin/dana/pdf', [DanaController::class, 'danaPDF']);
    // dana masuk
    Route::resource('dana_masuks', DanaMasukController::class);
    Route::get('/admin/dana_masuk', [DanaMasukController::class, 'index']);
    Route::get('/admin/dana_masuk/create', [DanaMasukController::class, 'create']);
    Route::get('/admin/dana_masuk/edit/{dana_masuk:id}', [DanaMasukController::class, 'edit']);
    // dana keluar
    Route::resource('dana_keluars', DanaKeluarController::class);
    Route::get('/admin/dana_keluar', [DanaKeluarController::class, 'index']);
    Route::get('/admin/dana_keluar/create', [DanaKeluarController::class, 'create']);
    Route::get('/admin/dana_keluar/edit/{dana_keluar:id}', [DanaKeluarController::class, 'edit']);
});
