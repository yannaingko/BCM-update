<?php

use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\ContactSearch;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\ChatMessageComponent;
use App\View\Components\TestComponent;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\VerifyotpController;

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

Route::get('/',HomeComponent::class)->name('home'); 

// send verify code to mail
Route::post('/loging',[VerifyotpController::class,'loggin'])->name('loggin');
Route::get('/verification/{id}',[VerifyotpController::class,'verification']);
Route::post('/verified',[VerifyotpController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[VerifyotpController::class,'resendOtp'])->name('resendOtp');

Route::post('/logot',[VerifyotpController::class,'logout']);

Route::get('/test',[VerifyotpController::class, 'test']);
// language switch route
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
// end language route



Route::get('/contact-search',ContactSearch::class)->name('contact-search');

Route::get('/research',[SearchController::class,'research'])->name('research');

Route::get('/process/{id}', [SearchController::class,'process'])->name('process');

Route::get('/transaction',[SearchController::class,'transaction'])->name('transaction');

Route::get('/search',[SearchController::class,'search'])->name('search');

Route::get('/get-user-balance', [SearchController::class, 'getUserBalance']);


Route::get('/searchuser',[SearchController::class,'searchUser'])->name('searchUser');

// Route::get('/search',[SearchController::class,'search'])->name('search');
// Route::get('/',HomeComponent::class)->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/readnoti/{id}',[HomeComponent::class,'markasread']);
    // live chat
    Route::get('/chat',ChatMessageComponent::class)->name('chat.index');
    Route::get('/chat/send',[ChatMessageComponent::class,'send'])->name('chat.send');
    Route::get('/chat/message',[ChatMessageComponent::class,'getMessage'])->name('chat.message');
});

require __DIR__.'/auth.php';
