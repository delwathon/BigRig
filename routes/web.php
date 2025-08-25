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
use App\Http\Controllers\EmailConfigController;
use App\Http\Controllers\PaymentGatewayConfigController;

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentScheduleController;
use App\Http\Controllers\StudentMaterialsController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentAssignmentController;
use App\Http\Controllers\StudentAnnouncementController;

use \App\Http\Controllers\Instructor\InstructorDashboardController;
use \App\Http\Controllers\Instructor\StudentManagementController;
use \App\Http\Controllers\Instructor\AttendanceController;
use \App\Http\Controllers\Instructor\MaterialController;
use \App\Http\Controllers\Instructor\AnnouncementController;
use \App\Http\Controllers\Instructor\ScheduleController;

use App\Models\Settings;
use App\Livewire\ForumList;
use App\Livewire\ForumCreatePost;
use App\Livewire\ForumPostPage;

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


// Student specific routes
// Route::middleware(function ($request, $next) {
//     if (!Auth::user()->hasRole('student')) {
//         abort(403, 'Unauthorized access.');
//     }
//     return $next($request);
// })->prefix('student')->name('student.')->group(function () {

//     Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
//     Route::get('/schedule', [StudentScheduleController::class, 'index'])->name('schedule');
//     Route::get('/materials', [StudentMaterialsController::class, 'index'])->name('materials');
//     Route::get('/material/download/{id}', [StudentMaterialsController::class, 'download'])->name('download-material');
//     Route::get('/course-details', [StudentCourseController::class, 'show'])->name('course-details');
//     Route::get('/progress', [StudentProgressController::class, 'index'])->name('progress');

// });

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
    Route::get('/settings/email-configuration', [EmailConfigController::class, 'index'])->name('email-config');
    Route::put('/settings/email-configuration/update', [EmailConfigController::class, 'update'])->name('email-config.update');
    Route::get('/settings/payment-gateways', [PaymentGatewayConfigController::class, 'index'])->name('payment-gateway-config');
    Route::put('/settings/payment-gateways/{id}', [PaymentGatewayConfigController::class, 'update'])->name('payment-gateway-config.update');
    Route::patch('settings/payment-gateway/{id}/toggle', [PaymentGatewayConfigController::class, 'toggle'])->name('payment-gateway-config.toggle');
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
    Route::get('/forum/{category?}', ForumList::class)->name('forum.list');
    Route::get('/forum/create/post', ForumCreatePost::class)->name('forum.create');
    Route::get('/forum/single/{postId}', ForumPostPage::class)->name('forum.post');

    // Student Routes
    // Dashboard
    Route::get('/student-dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    // Courses
    Route::get('/student-courses', [StudentCourseController::class, 'index'])->name('student.courses');
    Route::get('/student-course/{id}', [StudentCourseController::class, 'show'])->name('student.course-details');
    // Schedule
    Route::get('/student-schedule', [StudentScheduleController::class, 'index'])->name('student.schedule');
    Route::get('/student-schedule/calendar', [StudentScheduleController::class, 'calendar'])->name('student.schedule.calendar');
    // Materials
    Route::get('/student-materials', [StudentMaterialsController::class, 'index'])->name('student.materials');
    Route::get('/student-material/download/{id}', [StudentMaterialsController::class, 'download'])->name('student.download-material');
    // Progress
    Route::get('/student-progress', [StudentProgressController::class, 'index'])->name('student.progress');
    Route::get('/student-progress/{courseId}', [StudentProgressController::class, 'course'])->name('student.progress.course');
    // Attendance
    Route::get('/student-attendance', [StudentAttendanceController::class, 'index'])->name('student.attendance');
    // Assignments
    Route::get('/student-assignments', [StudentAssignmentController::class, 'index'])->name('student.assignments');
    Route::get('/student-assignment/{id}', [StudentAssignmentController::class, 'show'])->name('student.assignment.show');
    Route::post('/student-assignment/{id}/submit', [StudentAssignmentController::class, 'submit'])->name('student.assignment.submit');

    // Announcements
    Route::get('/student-announcements', [StudentAnnouncementController::class, 'index'])->name('student.announcements');
    Route::get('/student-announcement/{id}', [StudentAnnouncementController::class, 'show'])->name('student.announcement.show');





    // Instructor Routes
    // Dashboard
    Route::get('/instructor-dashboard', [InstructorDashboardController::class, 'index'])->name('instructor.dashboard');

    // Students Management
    Route::get('/instructor-students', [StudentManagementController::class, 'index'])->name('instructor.students');
    Route::get('/instructor-students/course/{courseId}', [StudentManagementController::class, 'byCourse'])->name('instructor.course.students');
    Route::get('/student/{id}', [StudentManagementController::class, 'show'])->name('instructor.student.show');

    // Attendance
    Route::get('/instructor-attendance', [AttendanceController::class, 'index'])->name('instructor.attendance');
    Route::get('/instructor-attendance/mark/{scheduleId}', [AttendanceController::class, 'mark'])->name('instructor.attendance.mark');
    Route::post('/instructor-attendance/save', [AttendanceController::class, 'save'])->name('instructor.attendance.save');
    Route::get('/instructor-attendance/report', [AttendanceController::class, 'report'])->name('instructor.attendance.report');
    Route::get('/instructor-attendance/edit/{scheduleId}', [AttendanceController::class, 'edit'])->name('instructor.attendance.edit');

    // Materials
    Route::get('/instructor-materials', [MaterialController::class, 'index'])->name('instructor.materials');
    Route::post('/instructor-materials/upload', [MaterialController::class, 'upload'])->name('instructor.materials.upload');
    Route::delete('/instructor-materials/{id}', [MaterialController::class, 'destroy'])->name('instructor.materials.destroy');
    Route::get('/instructor-materials/course/{courseId}', [MaterialController::class, 'byCourse'])->name('instructors.materials.course');
    Route::get('/instructor-materials/download/{id}', [MaterialController::class, 'download'])->name('instructors.materials.download');

    // Announcements
    Route::get('/instructor-announcements', [AnnouncementController::class, 'index'])->name('instructor.announcements');
    Route::get('/instructor-announcements/create', [AnnouncementController::class, 'create'])->name('instructor.announcements.create');
    Route::post('/instructor-announcements', [AnnouncementController::class, 'store'])->name('instructor.announcements.store');
    Route::get('/instructor-announcements/{id}', [AnnouncementController::class, 'show'])->name('instructor.announcements.show');
    Route::get('/instructor-announcements/{id}/edit', [AnnouncementController::class, 'edit'])->name('instructor.announcements.edit');
    Route::put('/instructor-announcements/{id}', [AnnouncementController::class, 'update'])->name('instructor.announcements.update');
    Route::delete('/instructor-announcements/{id}', [AnnouncementController::class, 'destroy'])->name('instructor.announcements.destroy');
    Route::patch('/instructor-announcements/{id}/toggle', [AnnouncementController::class, 'toggle'])->name('instructor.announcements.toggle');

    // Schedule
    Route::get('/instructor-schedule', [ScheduleController::class, 'index'])->name('instructor.schedule');
    Route::get('/instructor-schedule/calendar', [ScheduleController::class, 'calendar'])->name('instructor.schedule.calendar');
    Route::get('/instructor-schedule/export', [ScheduleController::class, 'export'])->name('instructor.schedule.export');
    Route::get('/instructor-schedule/{id}', [ScheduleController::class, 'show'])->name('instructor.schedule.show');
    Route::match(['get', 'post'], '/instructor-schedule/{id}/request-change', [ScheduleController::class, 'requestChange'])->name('instructor.schedule.request-change');
    Route::get('/instructor-schedule-change-requests', [ScheduleController::class, 'changeRequests'])->name('instructor.schedule.change-requests');




    // Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    // Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');
    // Route::get('/ecommerce/customers', [CustomerController::class, 'index'])->name('customers');
    // Route::get('/ecommerce/orders', [OrderController::class, 'index'])->name('orders');
    // Route::get('/ecommerce/invoices', [InvoiceController::class, 'index'])->name('invoices');
    // Route::get('/finance/transactions', [PaymentController::class, 'index01'])->name('transactions');
    // Route::get('/finance/transaction-details', [PaymentController::class, 'index02'])->name('transaction-details');
    // Route::get('/ecommerce/shop', function () {
    //     return view('pages/ecommerce/shop');
    // })->name('shop');
    // Route::get('/ecommerce/shop-2', function () {
    //     return view('pages/ecommerce/shop-2');
    // })->name('shop-2');
    // Route::get('/ecommerce/product', function () {
    //     return view('pages/ecommerce/product');
    // })->name('product');
    // Route::get('/ecommerce/cart', function () {
    //     return view('pages/ecommerce/cart');
    // })->name('cart');
    // Route::get('/ecommerce/cart-2', function () {
    //     return view('pages/ecommerce/cart-2');
    // })->name('cart-2');
    // Route::get('/ecommerce/cart-3', function () {
    //     return view('pages/ecommerce/cart-3');
    // })->name('cart-3');
    // Route::get('/ecommerce/pay', function () {
    //     return view('pages/ecommerce/pay');
    // })->name('pay');
    // Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
    // Route::get('/community/users-tabs', [MemberController::class, 'indexTabs'])->name('users-tabs');
    // Route::get('/community/users-tiles', [MemberController::class, 'indexTiles'])->name('users-tiles');
    // Route::get('/community/profile', function () {
    //     return view('pages/community/profile');
    // })->name('profile');
    // Route::get('/community/feed', function () {
    //     return view('pages/community/feed');
    // })->name('feed');
    // Route::get('/community/forum', function () {
    //     return view('pages/community/forum');
    // })->name('forum');
    // Route::get('/community/forum-post', function () {
    //     return view('pages/community/forum-post');
    // })->name('forum-post');
    // Route::get('/community/meetups', function () {
    //     return view('pages/community/meetups');
    // })->name('meetups');
    // Route::get('/community/meetups-post', function () {
    //     return view('pages/community/meetups-post');
    // })->name('meetups-post');
    // Route::get('/finance/cards', function () {
    //     return view('pages/finance/credit-cards');
    // })->name('credit-cards');
    // Route::get('/finance/transactions', [PaymentController::class, 'index01'])->name('transactions');
    // Route::get('/finance/transaction-details', [PaymentController::class, 'index02'])->name('transaction-details');
    // Route::get('/job/job-listing', [JobController::class, 'index'])->name('job-listing');
    // Route::get('/job/job-post', function () {
    //     return view('pages/job/job-post');
    // })->name('job-post');
    // Route::get('/job/company-profile', function () {
    //     return view('pages/job/company-profile');
    // })->name('company-profile');
    // Route::get('/messages', function () {
    //     return view('pages/messages');
    // })->name('messages');
    // Route::get('/tasks/kanban', function () {
    //     return view('pages/tasks/tasks-kanban');
    // })->name('tasks-kanban');
    // Route::get('/tasks/list', function () {
    //     return view('pages/tasks/tasks-list');
    // })->name('tasks-list');
    // Route::get('/inbox', function () {
    //     return view('pages/inbox');
    // })->name('inbox');
    // Route::get('/calendar', function () {
    //     return view('pages/calendar');
    // })->name('calendar');
    // Route::get('/settings/notifications', function () {
    //     return view('pages/settings/notifications');
    // })->name('notifications');
    // Route::get('/settings/apps', function () {
    //     return view('pages/settings/apps');
    // })->name('apps');
    // Route::get('/settings/plans', function () {
    //     return view('pages/settings/plans');
    // })->name('plans');
    // Route::get('/settings/billing', function () {
    //     return view('pages/settings/billing');
    // })->name('billing');
    // Route::get('/settings/feedback', function () {
    //     return view('pages/settings/feedback');
    // })->name('feedback');
    // Route::get('/utility/changelog', function () {
    //     return view('pages/utility/changelog');
    // })->name('changelog');
    // Route::get('/utility/roadmap', function () {
    //     return view('pages/utility/roadmap');
    // })->name('roadmap');
    // Route::get('/utility/faqs', function () {
    //     return view('pages/utility/faqs');
    // })->name('faqs');
    // Route::get('/utility/empty-state', function () {
    //     return view('pages/utility/empty-state');
    // })->name('empty-state');
    // Route::get('/utility/404', function () {
    //     return view('pages/utility/404');
    // })->name('404');
    // Route::get('/onboarding-01', function () {
    //     return view('pages/onboarding-01');
    // })->name('onboarding-01');
    // Route::get('/onboarding-02', function () {
    //     return view('pages/onboarding-02');
    // })->name('onboarding-02');
    // Route::get('/onboarding-03', function () {
    //     return view('pages/onboarding-03');
    // })->name('onboarding-03');
    // Route::get('/onboarding-04', function () {
    //     return view('pages/onboarding-04');
    // })->name('onboarding-04');
    // Route::get('/component/button', function () {
    //     return view('pages/component/button-page');
    // })->name('button-page');
    // Route::get('/component/form', function () {
    //     return view('pages/component/form-page');
    // })->name('form-page');
    // Route::get('/component/dropdown', function () {
    //     return view('pages/component/dropdown-page');
    // })->name('dropdown-page');
    // Route::get('/component/alert', function () {
    //     return view('pages/component/alert-page');
    // })->name('alert-page');
    // Route::get('/component/modal', function () {
    //     return view('pages/component/modal-page');
    // })->name('modal-page');
    // Route::get('/component/pagination', function () {
    //     return view('pages/component/pagination-page');
    // })->name('pagination-page');
    // Route::get('/component/tabs', function () {
    //     return view('pages/component/tabs-page');
    // })->name('tabs-page');
    // Route::get('/component/breadcrumb', function () {
    //     return view('pages/component/breadcrumb-page');
    // })->name('breadcrumb-page');
    // Route::get('/component/badge', function () {
    //     return view('pages/component/badge-page');
    // })->name('badge-page');
    // Route::get('/component/avatar', function () {
    //     return view('pages/component/avatar-page');
    // })->name('avatar-page');
    // Route::get('/component/tooltip', function () {
    //     return view('pages/component/tooltip-page');
    // })->name('tooltip-page');
    // Route::get('/component/accordion', function () {
    //     return view('pages/component/accordion-page');
    // })->name('accordion-page');
    // Route::get('/component/icons', function () {
    //     return view('pages/component/icons-page');
    // })->name('icons-page');

    Route::fallback(function() {
        return view('pages/utility/404');
    });
});
