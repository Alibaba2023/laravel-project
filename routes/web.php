<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs',[
        'jobs'=>[
            [
                'id'=>1,
                'title'=>'front-end developer',
                'salary'=>'$50000'
            ],
            [
                'id'=>2,
                'title'=>'back-end developer',
                'salary'=>'$70000'
            ],
            [
                'id'=>3,
                'title'=>'UI developer',
                'salary'=>'$30000'
            ],
            [
                'id'=>4,
                'title'=>'UX developer',
                'salary'=>'$20000'
            ]
        ]
    ]);
});


Route::get('/jobs/{id}', function ($id) {
    $jobs=[
            [
                'id'=>1,
                'title'=>'front-end developer',
                'salary'=>'$50000'
            ],
            [
                'id'=>2,
                'title'=>'back-end developer',
                'salary'=>'$70000'
            ],
            [
                'id'=>3,
                'title'=>'UI developer',
                'salary'=>'$30000'
            ],
            [
                'id'=>4,
                'title'=>'UX developer',
                'salary'=>'$20000'
            ]
            ];
          $job=Arr::first($jobs, fn($job)=> $job['id']==$id);
          return view('job',['job'=>$job]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
