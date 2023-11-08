<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;



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


//all job listing
Route::get('/', [ListingController::class, 'index']);

//create listing
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update editted listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Apply listing
Route::post('/{listing}/apply', [ListingController::class, 'apply'])->middleware('auth');

//Accept job application
Route::post('/{userListing}/accept', [ListingController::class, 'acceptJobApplication'])->middleware('auth');

//Reject job application
Route::post('/{userListing}/reject', [ListingController::class, 'rejectJobApplication'])->middleware('auth');

//Report listing
Route::post('/listings/{id}/report', [ListingController::class, 'report'])->name('report-listing');

//Application listings
Route::get('/listings/applications', [ListingController::class, 'showApplicationList'])->middleware('auth');

//single job listing
Route::get('/listings/{listing}', [ListingController::class, 'showSingleListing'])->middleware('auth');

//retrieve single job listing
Route::get('/get-listing/{id}', [ListingController::class, 'retrieveSingleListingData'])->middleware('auth');

//boost job listing
Route::post('/listings/{listing}/boost', [ListingController::class, 'boostListing'])->middleware('auth');

//delete job experience for job seeker
Route::delete('/delete-job-experience/{experienceId}', [JobseekerController::class, 'deleteJobExperience'])->middleware('auth');

//Show job seeker registration page
Route::get('/register/jobseeker', [JobseekerController::class, 'register'])->middleware('guest');

//Show job seeker edit profile page
Route::get('/editProfile/{jobSeekerName}/JobSeeker', [JobseekerController::class, 'editProfile'])->middleware('auth');

//Submit job seeker edit profile
Route::post('/editProfile/{jobSeekerName}/submit', [JobseekerController::class, 'updateProfile'])->middleware('auth');

//Create new job seeker account
Route::post('/createJobSeekerUser', [JobseekerController::class, 'createNewUser']);

//Show employer registration page
Route::get('/register/employer', [EmployerController::class, 'register'])->middleware('guest');

//Show employer edit profile page
Route::get('/editProfile/{employerName}/Employer', [EmployerController::class, 'editProfile']);

//Submit job seeker edit profile
Route::post('/editProfile/{employerName}/submitEmployerDetails', [EmployerController::class, 'updateProfile'])->middleware('auth');

//Show employer list page
Route::get('/employers', [EmployerController::class, 'retrieveEmployerList']);

//View employer details page
Route::get('/employers/details/{id}', [EmployerController::class, 'showEmployerDetails'])->name('employer_details');

Route::get('/jobseeker/details/{id}', [JobseekerController::class, 'showJobSeekerDetails'])->name('job_applications_');

//Create new employer account
Route::post('/createEmployerUser', [EmployerController::class, 'createNewUser']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Show login page
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//upload resume
Route::get('/upload-file', [JobseekerController::class, 'createForm']);
Route::post('/upload-file', [JobseekerController::class, 'fileUpload'])->name('fileUpload');

//post rating
Route::post('/employer/rating/{id}', [EmployerController::class, 'reviewStore']);

//Admin module page
Route::get('/pages/admin_module', [AdminController::class, 'admin_module'])->name('admin_module')->middleware('auth');

//Admin delete post listing
Route::delete('/deleteListing/{id}', [AdminController::class, 'deleteListing'])->name('deleteListing')->middleware('auth');

//Admin verify post listing
Route::patch('/verifyListing/{id}', [AdminController::class, 'verifyListing'])->name('verifyListing')->middleware('auth');

//Filter listing
Route::post('/filter_listings', [ListingController::class, 'filterListings'])->name('filter_listings')->middleware('auth');
