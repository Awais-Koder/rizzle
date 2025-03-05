<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 3|GCVrp2hwKuotqpF9FO2dRhBEsMcHvZjGJilpwnHlbc947b38

Route::apiResource('departments', App\Http\Controllers\DepartmentController::class)->except('store', 'update', 'destroy');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('cities', App\Http\Controllers\CityController::class)->except('store', 'update', 'destroy');
Route::post('login', [UserController::class, 'login']);
Route::apiResource('users', App\Http\Controllers\UserController::class)->only('store');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('apply-for-card/{id}' , [UserController::class , 'applyForCard']);
    Route::get('education/{type?}/{edutype?}', [App\Http\Controllers\EducationController::class, 'index']);
    Route::apiResource('education', App\Http\Controllers\EducationController::class)->except('store', 'update', 'destroy');
    Route::get('education-branches/{type?}/{edutype?}', [App\Http\Controllers\EducationBranchController::class, 'index']);
    Route::apiResource('education-branches', App\Http\Controllers\EducationBranchController::class)->except('store', 'update', 'destroy');
    Route::apiResource('advertisements', App\Http\Controllers\AdvertisementController::class)->only('index');

    Route::apiResource('doctors', App\Http\Controllers\DoctorController::class)->except('store', 'update', 'destroy');
    Route::apiResource('doctor-categories', App\Http\Controllers\DoctorCategoryController::class)->except('store', 'update', 'destroy');
    Route::apiResource('education-categories', App\Http\Controllers\EducationCategoryController::class)->except('store', 'update', 'destroy');

    Route::apiResource('farmers', App\Http\Controllers\FarmerController::class)->except('store', 'update', 'destroy');

    Route::apiResource('fitnesses', App\Http\Controllers\FitnessController::class)->except('store', 'update', 'destroy');

    Route::apiResource('fitness-branches', App\Http\Controllers\FitnessBranchController::class)->except('store', 'update', 'destroy');

    Route::apiResource('food-categories', App\Http\Controllers\FoodCategoryController::class)->except('store', 'update', 'destroy');

    Route::apiResource('gov-offices', App\Http\Controllers\GovOfficeController::class)->except('store', 'update', 'destroy');

    Route::apiResource('laboratories', App\Http\Controllers\LaboratoryController::class)->except('store', 'update', 'destroy');

    Route::apiResource('laboratory-branches', App\Http\Controllers\LaboratoryBranchController::class)->except('store', 'update', 'destroy');

    Route::apiResource('pharmacies', App\Http\Controllers\PharmacyController::class)->except('store', 'update', 'destroy');
    Route::apiResource('pharmacy-branches', App\Http\Controllers\PharmacyBranchController::class)->except('store', 'update', 'destroy');

    Route::apiResource('shops', App\Http\Controllers\ShopController::class)->except('store', 'update', 'destroy');

    Route::get('travel/{type?}', [App\Http\Controllers\TravelController::class, 'index']);
    Route::apiResource('travel', App\Http\Controllers\TravelController::class)->except('store', 'update', 'destroy');
    Route::get('travel-branches/{type?}', [App\Http\Controllers\TravelBranchController::class, 'index']);
    Route::apiResource('travel-branches', App\Http\Controllers\TravelBranchController::class)->except('store', 'update', 'destroy');
    Route::get('food/{type?}', [App\Http\Controllers\FoodController::class, 'index']);
    Route::apiResource('food', App\Http\Controllers\FoodController::class)->except('store', 'update', 'destroy');
    Route::get('food-branches/{type?}', [App\Http\Controllers\FoodBranchController::class, 'index']);
    Route::apiResource('food-branches', App\Http\Controllers\FoodBranchController::class)->except('store', 'update', 'destroy');
    Route::apiResource('discounts', App\Http\Controllers\DiscountController::class)->only('index');
    Route::apiResource('gifs', App\Http\Controllers\GifController::class)->only('index');

    Route::get('fashions/{type?}', [App\Http\Controllers\FashionController::class, 'index']);
    Route::apiResource('fashions', App\Http\Controllers\FashionController::class)->except('store', 'update', 'destroy');
    Route::get('fashion-branches/{type?}', [App\Http\Controllers\FashionBranchController::class, 'index']);
    Route::apiResource('fashion-branches', App\Http\Controllers\FashionBranchController::class)->except('store', 'update', 'destroy');
    Route::get('electronics/{type?}', [App\Http\Controllers\ElectronicController::class, 'index']);
    Route::apiResource('electronics', App\Http\Controllers\ElectronicController::class)->except('store', 'update', 'destroy');
    Route::get('electronic-branches/{type?}', [App\Http\Controllers\ElectronicBranchController::class, 'index']);
    Route::apiResource('electronic-branches', App\Http\Controllers\ElectronicBranchController::class)->except('store', 'update', 'destroy');

    Route::apiResource('shop-products', App\Http\Controllers\ShopProductController::class)->except('store', 'update', 'destroy');

    Route::get('hospitals/{type?}', [App\Http\Controllers\HospitalController::class, 'index']);
    Route::resource('hospitals', App\Http\Controllers\HospitalController::class)
        ->except(['store', 'update', 'destroy']);

    Route::get('hospital-branches/{type?}', [App\Http\Controllers\HospitalBranchController::class, 'index']);
    Route::apiResource('hospital-branches', App\Http\Controllers\HospitalBranchController::class)->except('store', 'update', 'destroy');
});
