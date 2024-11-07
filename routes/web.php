    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\adminController;
    use App\Http\Controllers\cetakController;
    use App\Http\Controllers\dokterController;
    use App\Http\Controllers\pegawaiController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\obatController;
    use App\Http\Controllers\PendaftaranController;
    use App\Http\Controllers\supplierController;
    use App\Http\Controllers\tindakanMedisController;
    use App\Http\Controllers\stokObatController;


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
    //     return view('pages.dashboard');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    //login dan register
    require __DIR__ . '/auth.php';

    Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {



            Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::middleware(['admin'])->group(function () {
            // Crud Admin
            Route::resource('/admin', adminController::class);
            // Crud Pegawai
            Route::resource('/pegawai', pegawaiController::class);
            // Crud Dokter
            Route::resource('/dokter', dokterController::class);
            // Crud Pendaftaran
            Route::resource('/pendaftaran', PendaftaranController::class);
            // Crud Supplier
            Route::resource('supplier', supplierController::class);
            // Panggillan
            Route::post('/panggil/{id}', [PendaftaranController::class, 'approve'])->name('pendaftaran.panggil');
            // Data Psien
            Route::get('/data-pasien', [PendaftaranController::class, 'dataPasien'])->name('pendaftaran.dataPasien');
            // Crud Stok Obat
            Route::resource('stok', stokObatController::class);


            //Cetak Antrian
            Route::get('/cetak-antrian/{id}', [cetakController::class, 'antrian'])->name('cetak.antrian');
            //Cetak Antrian
            Route::get('/cetak-kartu-berobat/{id}', [cetakController::class, 'kartuBerobat'])->name('cetak.kartu.berobat');
            //cetak Tindakan
            Route::get('/cetak-kartu-tindakan/{id}', [cetakController::class, 'kartuTindakan'])->name('cetak.kartu.tindakan');
            //cetak Tindakan
            Route::get('/cetak-kartu-obat/{id}', [cetakController::class, 'kartuObat'])->name('cetak.kartu.obat');



            //Tindakan Medis
            Route::get('/tindakan-medis', [tindakanMedisController::class, 'index'])->name('tindakan.index');
            Route::get('/tindakan-medis/{id}', [tindakanMedisController::class, 'show'])->name('tindakan.show');
            Route::post('/tindakan-medis', [tindakanMedisController::class, 'store'])->name('tindakan.store');

            //input resep obat
            Route::post('obat', [obatController::class, 'store'])->name('obat.store');
            Route::get('pengadaan/obat', [obatController::class, 'index'])->name('obat.index');
            Route::get('cetak/{id}', [obatController::class, 'cetak'])->name('obat.cetak');
        });


        Route::middleware(['dokter'])->group(function () {
            //Cetak Antrian
            Route::get('/cetak-antrian/{id}', [cetakController::class, 'antrian'])->name('cetak.antrian');
            //Cetak Antrian
            Route::get('/cetak-kartu-berobat/{id}', [cetakController::class, 'kartuBerobat'])->name('cetak.kartu.berobat');
            //cetak Tindakan
            Route::get('/cetak-kartu-tindakan/{id}', [cetakController::class, 'kartuTindakan'])->name('cetak.kartu.tindakan');
            //cetak Tindakan
            Route::get('/cetak-kartu-obat/{id}', [cetakController::class, 'kartuObat'])->name('cetak.kartu.obat');


            //Tindakan Medis
            Route::get('/tindakan-medis', [tindakanMedisController::class, 'index'])->name('tindakan.index');
            Route::get('/tindakan-medis/{id}', [tindakanMedisController::class, 'show'])->name('tindakan.show');
            Route::post('/tindakan-medis', [tindakanMedisController::class, 'store'])->name('tindakan.store');
        });


        Route::middleware(['apoteker'])->group(function () {

            // Crud Supplier
            Route::resource('supplier', supplierController::class);

            //Cetak Antrian
            Route::get('/cetak-antrian/{id}', [cetakController::class, 'antrian'])->name('cetak.antrian');
            //Cetak Antrian
            Route::get('/cetak-kartu-berobat/{id}', [cetakController::class, 'kartuBerobat'])->name('cetak.kartu.berobat');
            //cetak Tindakan
            Route::get('/cetak-kartu-tindakan/{id}', [cetakController::class, 'kartuTindakan'])->name('cetak.kartu.tindakan');
            //cetak Tindakan
            Route::get('/cetak-kartu-obat/{id}', [cetakController::class, 'kartuObat'])->name('cetak.kartu.obat');

            //Tindakan Medis
            Route::get('/tindakan-medis', [tindakanMedisController::class, 'index'])->name('tindakan.index');
            Route::get('/tindakan-medis/{id}', [tindakanMedisController::class, 'show'])->name('tindakan.show');
            Route::post('/tindakan-medis', [tindakanMedisController::class, 'store'])->name('tindakan.store');

            //input resep obat
            Route::post('obat', [obatController::class, 'store'])->name('obat.store');
            Route::get('pengadaan/obat', [obatController::class, 'index'])->name('obat.index');
            Route::get('cetak/{id}', [obatController::class, 'cetak'])->name('obat.cetak');

            // Crud Stok Obat
            Route::resource('stok', stokObatController::class);
        });



    });
