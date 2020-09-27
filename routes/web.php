<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZipcodeController;

/* index page */
// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/', [IndexController::class, 'index'])->name('index');

/* terms of service page */
Route::get('/terms-of-service', function () {
    return view('pages.tos');
});

/* privacy policy page */
Route::get('/privacy-policy', function () {
    return view('pages.pp');
});

/* how it works page */
Route::get('/how-it-works', function () {
    return view('pages.hiw');
});

/* about page */
Route::get('/about-us', function () {
    return view('pages.abt');
});

/* what is my postal code | accomodote all page url indexed by google */
Route::get('/what-is-my-postal-code', function () {
    return view('pages.what-is-my-zipcode');
});

/* what is my zip code */
Route::get('/what-is-my-zip-code', function () {
    return view('pages.what-is-my-zipcode');
});



/*      */
/* GET  */
/*      */

/* handles displaying of search term results, Search Controller | SearchController */
Route::get('/search-result', [SearchController::class, 'search_results'])->name('search-results');

/* handles displaying and searching of string url barangay level */
Route::get('/zip-code-{city}/{barangay}', [BarangayController::class, 'search_barangay']);
Route::get('/zip-code-{city}/{barangay}', [BarangayController::class, 'search_barangay'])->name('url_barangay');
Route::get('/postal-code-{city}/{barangay}', [BarangayController::class, 'search_barangay']);

/* handles displaying and searching of string url city/town level */
Route::get('/zip-code-{city}', [CityController::class, 'search_city']);
Route::get('/zip-code-{city}', [CityController::class, 'search_city'])->name('url_city');
Route::get('/postal-code-{city}', [CityController::class, 'search_city']);

/* handles displaying and searching of string url region level */
Route::get('/zip-code/{region}', [RegionController::class, 'search_region']);
Route::get('/zip-code/{region}', [RegionController::class, 'search_region'])->name('url_region');
Route::get('/postal-code/{region}', [RegionController::class, 'search_region']);

/* handles displaying and searching of string url zip code level */
Route::get('/zipcode/{code}', [ZipcodeController::class, 'search_zipcode']);
Route::get('/zipcode/{code}', [ZipcodeController::class, 'search_zipcode'])->name('url_zipcode');
Route::get('/postalcode/{code}', [ZipcodeController::class, 'search_zipcode']);

/*      */
/* POST */
/*      */

/* handles user submitted search term, Search Controller | SearchController */
Route::post('/search', [SearchController::class, 'search_q'])->name('search_q');

/* handles user geolocation extraction, Geolocation Controller | GeolocationController */
Route::post('/get-geolocation', [SearchController::class, 'get_geolocation'])->name('geolocation');