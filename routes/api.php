<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/test', function (Request $request) {
    return User::all();
});

//Route::get('/redirect', function (Request $request) {
//    $request->session()->put('state', $state = Str::random(40));
//
//    $request->session()->put(
//        'code_verifier', $code_verifier = Str::random(128)
//    );
//
//    $codeChallenge = strtr(rtrim(
//        base64_encode(hash('sha256', $code_verifier, true))
//        , '='), '+/', '-_');
//
//    $query = http_build_query([
//        'client_id' => '3',
//        'redirect_uri' => 'http://first-api.test/callback',
//        'response_type' => 'code',
//        'scope' => '',
//        'state' => $state,
//        'code_challenge' => $codeChallenge,
//        'code_challenge_method' => 'S256',
//    ]);
//
//    return redirect('http://central-api.test/oauth/authorize?'.$query);
//});
//
//
//Route::get('/callback', function (Request $request) {
//    $state = $request->session()->pull('state');
//
//    $codeVerifier = $request->session()->pull('code_verifier');
//
//    throw_unless(
//        strlen($state) > 0 && $state === $request->state,
//        InvalidArgumentException::class
//    );
//
//    $response = Http::asForm()->post('http://central-api.test/oauth/token', [
//        'grant_type' => 'authorization_code',
//        'client_id' => '3',
//        'redirect_uri' => 'http://first-api.test/callback',
//        'code_verifier' => $codeVerifier,
//        'code' => $request->code,
//    ]);
//
//    return $response->json();
//});
