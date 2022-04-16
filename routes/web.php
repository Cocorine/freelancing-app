<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    return view('terms.privacy-policy');
})->name('privacy-policy');

Route::get('/about', function () {
    return view('terms.privacy-policy');
})->name('about');

Route::get('/faq', function () {
    return view('terms.privacy-policy');
})->name('faq');

Route::get('/chats', function () {
    return view('terms.privacy-policy');
})->name('chats');

Route::get('/reviews', function () {
    return view('terms.privacy-policy');
})->name('reviews');

Route::get('/term-condition', function () {
    return view('terms.privacy-policy');
})->name('term-condition');

Auth::routes(['verify' =>true]);

Route::middleware(['auth','verified','is_active'])->group(function () {
/*
        Route::get('dashboard/account/{user?}', [App\Http\Livewire\AccountSetting::class, 'render'])->name('backend.account');
        Route::get('dashboard/reset-password/{user?}', [App\Http\Livewire\ResetPassword::class, 'render'])->name('backend.account.reset');
        Route::get('dashboard/delete-account/{user?}', [App\Http\Livewire\DeleteAccount::class, 'render'])->name('backend.account.delete'); */

        //Route::get('dashboard/projects', [App\Http\Livewire\Project::class, 'render'])->name('backend.projects');

        Route::get('post-projects', [App\Http\Livewire\ProjectForm::class, 'render'])->name('backend.post-projects');
        Route::get('dashboard/ongoing-projects', [App\Http\Livewire\OngoingProject::class, 'render'])->name('backend.ongoing-projects');
        Route::get('dashboard/cancelled-projects', [App\Http\Livewire\CancelledProject::class, 'render'])->name('backend.cancelled-projects');
        Route::get('dashboard/completed-projects', [App\Http\Livewire\CompletedProject::class, 'render'])->name('backend.completed-projects');
        //Route::get('dashboard/project-details/{project?}', [App\Http\Livewire\ProjectDetails::class, 'render'])->name('backend.project-details');
        Route::get('inbox', [App\Http\Livewire\Conversation::class, 'render'])->name('inbox');

        Route::get('inbox', [App\Http\Livewire\ProjectForm::class, 'render'])->name('backend.post-projects');

        Route::resource('/dashboard/roles', "App\Http\Controllers\RoleController")->names('backend.roles');
        Route::resource('/dashboard/plans', "App\Http\Controllers\PlanController")->names('backend.plans');

        Route::resource('/dashboard/proposals', "App\Http\Controllers\ProposalController")->names('backend.proposals');

        Route::resource('/dashboard/users', "App\Http\Controllers\UserController")->names('backend.users');

        Route::resource('/dashboard/projects', "App\Http\Controllers\ProjectController")->names('backend.projects');

        Route::resource('/dashboard/milestones', "App\Http\Controllers\MilestoneController")->names('backend.milestones');

        Route::resource('/dashboard/tasks', "App\Http\Controllers\TaskController")->names('backend.tasks');

        Route::resource('/dashboard/categories', "App\Http\Controllers\CategoryController")->names('backend.categories');

        Route::get('/dashboard/projects/{job}/proposals', [App\Http\Controllers\ProjectController::class, 'viewProposals'])->name('backend.view-proposals');

        Route::post('hire-freelancer', [App\Http\Controllers\ProjectController::class, 'hireFreelancer'])->name('backend.hire-freelancer');

        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('backend.dashboard');

        Route::get('dashboard/profil/{user?}', [App\Http\Controllers\DashboardController::class, 'viewProfil'])->name('backend.profil');

        Route::get('dashboard/account/{user?}', [App\Http\Controllers\UserController::class, 'account_settings'])->name('backend.account');
        Route::get('dashboard/verify-account', [App\Http\Controllers\UserController::class, 'verify_account'])->name('backend.verify.account');
        Route::get('dashboard/reset-password/{user?}', [App\Http\Controllers\UserController::class, 'reset_password'])->name('backend.account.reset');
        Route::get('dashboard/delete-account/{user?}', [App\Http\Controllers\UserController::class, 'delete_account'])->name('backend.account.delete');

        Route::post('dashboard/users/reset-password/{user?}', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('backend.users.resetPassword');
        Route::delete('dashboard/users/delete-skill/{skill}', [App\Http\Controllers\UserController::class, 'deleteSkill'])->name('backend.users.deleteSkill');

        Route::delete('dashboard/users/delete-education/{education}', [App\Http\Controllers\UserController::class, 'deleteEducation'])->name('backend.users.deleteEducation');
        Route::delete('dashboard/users/delete-experience/{experience}', [App\Http\Controllers\UserController::class, 'deleteExperience'])->name('backend.users.deleteExperience');
        Route::delete('dashboard/users/delete-languague/{languague}', [App\Http\Controllers\UserController::class, 'deleteLanguague'])->name('backend.users.deleteLanguague');
        Route::delete('dashboard/users/delete-certificate/{certificate}', [App\Http\Controllers\UserController::class, 'deleteCertificate'])->name('backend.users.deleteCertificate');

        Route::get('dashboard/projects/milestones/{project}', [App\Http\Controllers\ProjectController::class, 'milestones'])->name('backend.projects.milestones');
        Route::get('dashboard/projects/tasks/{project}', [App\Http\Controllers\ProjectController::class, 'tasks'])->name('backend.projects.tasks');
        Route::get('dashboard/projects/payments/{project}', [App\Http\Controllers\ProjectController::class, 'payments'])->name('backend.projects.payments');

        Route::get('inbox', [App\Http\Controllers\ConversationController::class, 'inbox'])->name('inbox');
        Route::get('inbox/{conversation}', [App\Http\Controllers\ConversationController::class, 'show'])->name('backend.conversations.show');
        Route::post('inbox/markHasRead', [App\Http\Controllers\ConversationController::class, 'markHasRead'])->name('backend.conversations.markHasRead');
        Route::post('inbox/send_message', [App\Http\Controllers\ConversationController::class, 'send_message'])->name('backend.conversations.send_message');

        Route::get('dashboard/payments/{wallet}', [App\Http\Controllers\PaymentController::class, 'show'])->name('backend.payments.show');
        Route::post('dashboard/payments/withdraw_fund/{wallet}', [App\Http\Controllers\PaymentController::class, 'withdraw_fund'])->name('backend.payments.withdraw_fund');
        Route::get('dashboard/payments/withdraw_fund/{wallet}', [App\Http\Controllers\PaymentController::class, 'withdraw_form'])->name('backend.payments.withdraw_form');
        Route::get('dashboard/payments/transactions/{wallet}', [App\Http\Controllers\PaymentController::class, 'transactions'])->name('backend.payments.transactions');
        Route::get('dashboard/payments/invoices/{wallet}', [App\Http\Controllers\PaymentController::class, 'invoices'])->name('backend.payments.invoices');


});

Route::get('job-proposals/{job}', [App\Http\Controllers\JobController::class, 'viewAllProposal'])->name('front.proposals');

Route::resource('/jobs', "App\Http\Controllers\JobController")->names('jobs');

Route::get('/', function () {
    return view('livewire.frontend.acceuil');
})->name('frontend.home');

Route::get('freelancers', [App\Http\Livewire\Freelancers::class, 'render'])->name('frontend.freelancers');
Route::get('freelancer-details', [App\Http\Livewire\FreelancerDetails::class, 'render'])->name('frontend.freelancer-details');

/* Route::get('/jobs', function () {
    return view('livewire.frontend.list-project');
})->name('frontend.jobs'); */

/*
Route::get('/freelancers', function () {
    return view('livewire.frontend.list-freelancer');
})->name('frontend.freelancers');
 */
