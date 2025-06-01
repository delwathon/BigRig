<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TrainingScheduleController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\EmailSubscriptionController;
use App\Models\Settings;

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

// Retrieve preferred landing page from database
$settings = Settings::first(); // Adjust this query based on how you store settings
$preferredLandingPage = $settings->preferred_landing_page ?? 1; // Default to 1 if null

// Dynamically set the redirect route
// Route::redirect('/', $preferredLandingPage === 1 ? 'index' : 'home');

// Route::get('/index', [WebsiteController::class, 'index'])->name('index');
// Route::get('/home', [WebsiteController::class, 'home'])->name('home');
// Assign '/' dynamically to the preferred page

if ($preferredLandingPage === 1) {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
} else {
    Route::get('/', [WebsiteController::class, 'home'])->name('index');
}

Route::get('/about-us', [WebsiteController::class, 'about'])->name('about-us');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('courses');
Route::get('/course-information/{name}', [WebsiteController::class, 'course_details'])->name('course');
Route::get('/our-instructors', [WebsiteController::class, 'instructors'])->name('our-instructors');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/email-subscription', [WebsiteController::class, 'email_subscription'])->name('email-subscription');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/checkout/pay', [CheckoutController::class, 'index'])->name('checkout.pay');
    Route::post('/pay', [CheckoutController::class, 'redirectToPaystack'])->name('payment');
    Route::get('/payment/callback', [CheckoutController::class, 'handleGatewayCallback'])->name('payment.callback');

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/community/user-tiles', [UserController::class, 'indexTiles'])->name('users');
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user-profile');
    Route::post('/make-admin', [UserController::class, 'makeAdmin'])->name('make.admin');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('/settings/site_information', [SettingsController::class, 'siteInformationIndex'])->name('site_settings');
    Route::put('/settings/site_information/update', [SettingsController::class, 'siteInformationUpdate'])->name('site_settings.update');
    Route::get('/settings/about-company', [SettingsController::class, 'aboutCompanyIndex'])->name('about-company');
    Route::put('/settings/about-company/update', [SettingsController::class, 'aboutCompanyUpdate'])->name('about-company.update');
    Route::get('/settings/objectives', [SettingsController::class, 'trainingObjectiveIndex'])->name('objectives');
    Route::post('/settings/objectives/store', [SettingsController::class, 'trainingObjectiveStore'])->name('objective.store');
    Route::put('/settings/objectives/update', [SettingsController::class, 'trainingObjectiveUpdate'])->name('objective.update');
    Route::get('/settings/objectives/destroy/{id}', [SettingsController::class, 'trainingObjectiveDestroy'])->name('objective.destroy');
    Route::get('/settings/faqs', [SettingsController::class, 'faqsIndex'])->name('faqs');
    Route::post('/settings/faqs/store', [SettingsController::class, 'faqsStore'])->name('faqs.store');
    Route::put('/settings/faqs/update', [SettingsController::class, 'faqsUpdate'])->name('faqs.update');
    Route::get('/settings/faqs/destroy/{id}', [SettingsController::class, 'faqsDestroy'])->name('faqs.destroy');
    Route::get('/settings/sliders', [SettingsController::class, 'slidersIndex'])->name('sliders');
    Route::post('/settings/sliders/store', [SettingsController::class, 'sliderStore'])->name('slider.store');
    Route::put('/settings/sliders/update', [SettingsController::class, 'sliderUpdate'])->name('slider.update');
    Route::get('/settings/sliders/destroy/{id}', [SettingsController::class, 'slidersDestroy'])->name('sliders.destroy');
    Route::get('/settings/founder', [SettingsController::class, 'founderIndex'])->name('founder');
    Route::put('/settings/founder/update', [SettingsController::class, 'founderUpdate'])->name('founder.update');
    Route::get('/settings/custom-services', [SettingsController::class, 'customServicesIndex'])->name('custom-services');
    Route::post('/settings/custom-service/store', [SettingsController::class, 'customServicesStore'])->name('custom-service.store');
    Route::put('/settings/custom-service/update', [SettingsController::class, 'customServicesUpdate'])->name('custom-service.update');
    Route::get('/settings/custom-service/destroy/{id}', [SettingsController::class, 'customServicesDestroy'])->name('custom-service.destroy');
    Route::get('/settings/clients', [SettingsController::class, 'clientsIndex'])->name('clients');
    Route::post('/settings/client/store', [SettingsController::class, 'clientsStore'])->name('client.store');
    Route::get('/settings/client/destroy/{id}', [SettingsController::class, 'clientsDestroy'])->name('client.destroy');
    Route::get('/settings/enrolment_batch', [SettingsController::class, 'enrolmentBatchIndex'])->name('enrolment-batches');
    Route::post('/settings/enrolment_batch/store', [SettingsController::class, 'enrolmentBatchStore'])->name('enrolment-batch.store');
    Route::get('/settings/enrolment_batch/destroy/{id}', [SettingsController::class, 'enrolmentBatchDestroy'])->name('enrolment-batch.destroy');
    Route::get('/settings/enrolment_batch/set-active-batch/{id}', [SettingsController::class, 'setActiveBatch'])->name('enrolment-batch.update');
    Route::get('/settings/achievements', [SettingsController::class, 'achievementsIndex'])->name('achievements');
    Route::post('/settings/achievement/store', [SettingsController::class, 'achievementsStore'])->name('achievement.store');
    Route::put('/settings/achievement/update', [SettingsController::class, 'achievementsUpdate'])->name('achievement.update');
    Route::get('/settings/achievement/destroy/{id}', [SettingsController::class, 'achievementsDestroy'])->name('achievement.destroy');
    Route::get('/user-roles', [RoleController::class, 'Index'])->name('user-roles');
    Route::post('/user-roles/store', [RoleController::class, 'roleStore'])->name('user-roles.store');
    Route::get('/user-roles/destroy/{id}', [RoleController::class, 'roleDestroy'])->name('user-roles.destroy');
    Route::get('/user-permissions/{roleId}', [PermissionController::class, 'Index'])->name('user-permissions');
    Route::post('/user-permissions/store', [PermissionController::class, 'permissionStore'])->name('permission.store');
    Route::post('/update-role-permission', [PermissionController::class, 'permissionUpdate'])->name('update-role-permission');
    Route::get('/chats', [ChatController::class, 'chatIndex'])->name('chats');
    Route::get('/course/management', [CourseController::class, 'index'])->name('course-management');
    Route::get('/course/details/{id}', [CourseController::class, 'show'])->name('course-details');
    Route::put('/course/details/update', [CourseController::class, 'updateCourseDetails'])->name('course-details.update');
    Route::post('/course/material/store', [CourseController::class, 'uploadCourseMaterials'])->name('upload-course-materials');
    Route::get('/course/material/download/{id}', [CourseController::class, 'downloadMaterial'])->name('materials.download');
    Route::get('/course/material/destroy/{id}', [CourseController::class, 'materialDestroy'])->name('material.delete');
    Route::post('/course/curriculum/store', [CourseController::class, 'curriculumStore'])->name('curriculum.store');
    Route::get('/course/curriculum/destroy/{id}', [CourseController::class, 'curriculumDestroy'])->name('curriculum.destroy');
    Route::get('/training-schedule', [TrainingScheduleController::class, 'index'])->name('schedule');
    Route::get('/getTopics/{id}', [TrainingScheduleController::class, 'getTopics']);
    Route::get('/getInstructors/{course_id}', [TrainingScheduleController::class, 'getInstructors']);
    Route::get('/getInstructorStudents/{batch_id}/{course_id}/{instructor_id}', [TrainingScheduleController::class, 'getInstructorStudents']);
    Route::post('/training-schedule/create', [TrainingScheduleController::class, 'create'])->name('schedule.create');
    Route::get('/instructors', [InstructorController::class, 'index'])->name('instructors');
    Route::post('/instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
    Route::get('/user/deactivate/{id}', [UserController::class, 'deactivate'])->name('user.deactivate');
    Route::get('/user/verify/{id}', [UserController::class, 'verifyAccount'])->name('user.verify');
    Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');
    Route::post('/testimonials/store', [TestimonialsController::class, 'store'])->name('testimonial.store');
    Route::put('/testimonials/update', [TestimonialsController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonials/destroy/{id}', [TestimonialsController::class, 'destroy'])->name('testimonial.destroy');
    Route::get('/newsletter', [EmailSubscriptionController::class, 'index'])->name('newsletter');




    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');
    Route::get('/ecommerce/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/ecommerce/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/ecommerce/invoices', [InvoiceController::class, 'index'])->name('invoices');
    // Route::get('/finance/transactions', [PaymentController::class, 'index01'])->name('transactions');
    // Route::get('/finance/transaction-details', [PaymentController::class, 'index02'])->name('transaction-details');
    Route::get('/ecommerce/shop', function () {
        return view('pages/ecommerce/shop');
    })->name('shop');    
    Route::get('/ecommerce/shop-2', function () {
        return view('pages/ecommerce/shop-2');
    })->name('shop-2');     
    Route::get('/ecommerce/product', function () {
        return view('pages/ecommerce/product');
    })->name('product');
    Route::get('/ecommerce/cart', function () {
        return view('pages/ecommerce/cart');
    })->name('cart');    
    Route::get('/ecommerce/cart-2', function () {
        return view('pages/ecommerce/cart-2');
    })->name('cart-2');    
    Route::get('/ecommerce/cart-3', function () {
        return view('pages/ecommerce/cart-3');
    })->name('cart-3');    
    Route::get('/ecommerce/pay', function () {
        return view('pages/ecommerce/pay');
    })->name('pay');     
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
    Route::get('/community/users-tabs', [MemberController::class, 'indexTabs'])->name('users-tabs');
    Route::get('/community/users-tiles', [MemberController::class, 'indexTiles'])->name('users-tiles');
    // Route::get('/community/profile', function () {
    //     return view('pages/community/profile');
    // })->name('profile');
    Route::get('/community/feed', function () {
        return view('pages/community/feed');
    })->name('feed');     
    Route::get('/community/forum', function () {
        return view('pages/community/forum');
    })->name('forum');
    Route::get('/community/forum-post', function () {
        return view('pages/community/forum-post');
    })->name('forum-post');    
    Route::get('/community/meetups', function () {
        return view('pages/community/meetups');
    })->name('meetups');    
    Route::get('/community/meetups-post', function () {
        return view('pages/community/meetups-post');
    })->name('meetups-post');    
    Route::get('/finance/cards', function () {
        return view('pages/finance/credit-cards');
    })->name('credit-cards');
    // Route::get('/finance/transactions', [PaymentController::class, 'index01'])->name('transactions');
    // Route::get('/finance/transaction-details', [PaymentController::class, 'index02'])->name('transaction-details');
    Route::get('/job/job-listing', [JobController::class, 'index'])->name('job-listing');
    Route::get('/job/job-post', function () {
        return view('pages/job/job-post');
    })->name('job-post');    
    Route::get('/job/company-profile', function () {
        return view('pages/job/company-profile');
    })->name('company-profile');
    Route::get('/messages', function () {
        return view('pages/messages');
    })->name('messages');
    Route::get('/tasks/kanban', function () {
        return view('pages/tasks/tasks-kanban');
    })->name('tasks-kanban');
    Route::get('/tasks/list', function () {
        return view('pages/tasks/tasks-list');
    })->name('tasks-list');       
    Route::get('/inbox', function () {
        return view('pages/inbox');
    })->name('inbox'); 
    Route::get('/calendar', function () {
        return view('pages/calendar');
    })->name('calendar'); 
    Route::get('/settings/notifications', function () {
        return view('pages/settings/notifications');
    })->name('notifications');  
    Route::get('/settings/apps', function () {
        return view('pages/settings/apps');
    })->name('apps');
    Route::get('/settings/plans', function () {
        return view('pages/settings/plans');
    })->name('plans');      
    Route::get('/settings/billing', function () {
        return view('pages/settings/billing');
    })->name('billing');  
    Route::get('/settings/feedback', function () {
        return view('pages/settings/feedback');
    })->name('feedback');
    Route::get('/utility/changelog', function () {
        return view('pages/utility/changelog');
    })->name('changelog');  
    Route::get('/utility/roadmap', function () {
        return view('pages/utility/roadmap');
    })->name('roadmap');  
    // Route::get('/utility/faqs', function () {
    //     return view('pages/utility/faqs');
    // })->name('faqs');  
    Route::get('/utility/empty-state', function () {
        return view('pages/utility/empty-state');
    })->name('empty-state');  
    Route::get('/utility/404', function () {
        return view('pages/utility/404');
    })->name('404');
    Route::get('/onboarding-01', function () {
        return view('pages/onboarding-01');
    })->name('onboarding-01');   
    Route::get('/onboarding-02', function () {
        return view('pages/onboarding-02');
    })->name('onboarding-02');   
    Route::get('/onboarding-03', function () {
        return view('pages/onboarding-03');
    })->name('onboarding-03');   
    Route::get('/onboarding-04', function () {
        return view('pages/onboarding-04');
    })->name('onboarding-04');
    Route::get('/component/button', function () {
        return view('pages/component/button-page');
    })->name('button-page');
    Route::get('/component/form', function () {
        return view('pages/component/form-page');
    })->name('form-page');
    Route::get('/component/dropdown', function () {
        return view('pages/component/dropdown-page');
    })->name('dropdown-page');
    Route::get('/component/alert', function () {
        return view('pages/component/alert-page');
    })->name('alert-page');
    Route::get('/component/modal', function () {
        return view('pages/component/modal-page');
    })->name('modal-page'); 
    Route::get('/component/pagination', function () {
        return view('pages/component/pagination-page');
    })->name('pagination-page');
    Route::get('/component/tabs', function () {
        return view('pages/component/tabs-page');
    })->name('tabs-page');
    Route::get('/component/breadcrumb', function () {
        return view('pages/component/breadcrumb-page');
    })->name('breadcrumb-page');
    Route::get('/component/badge', function () {
        return view('pages/component/badge-page');
    })->name('badge-page'); 
    Route::get('/component/avatar', function () {
        return view('pages/component/avatar-page');
    })->name('avatar-page');
    Route::get('/component/tooltip', function () {
        return view('pages/component/tooltip-page');
    })->name('tooltip-page');
    Route::get('/component/accordion', function () {
        return view('pages/component/accordion-page');
    })->name('accordion-page');
    Route::get('/component/icons', function () {
        return view('pages/component/icons-page');
    })->name('icons-page');

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
