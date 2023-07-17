<?php
# Backend Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\Backend\HomePageController;
use App\Http\Controllers\Backend\AboutPageController;
use App\Http\Controllers\Backend\BackendFaqController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\CareerPageController;
use App\Http\Controllers\Backend\BackendFileController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendTestController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\ContactPageController;
use App\Http\Controllers\Backend\BackendAdminController;
use App\Http\Controllers\Backend\BackendHelperController;
use App\Http\Controllers\Backend\BackendPluginController;
use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendContactController;
use App\Http\Controllers\Backend\BackendProfileController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Backend\BackendSiteMapController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendMenuLinkController;
use App\Http\Controllers\Backend\BackendTrafficsController;
use App\Http\Controllers\Backend\BackendUserRoleController;
use App\Http\Controllers\Backend\BackendPermissionController;


# Frontend Controllers
use App\Http\Controllers\Backend\BackendRedirectionController;
use App\Http\Controllers\Backend\BackendAnnouncementController;
use App\Http\Controllers\Backend\BackendContactReplyController;
use App\Http\Controllers\Backend\BackendNotificationsController;
use App\Http\Controllers\Backend\BackendArticleCommentController;
use App\Http\Controllers\Backend\BackendCareerController;
use App\Http\Controllers\Backend\BackendUserPermissionController;

Auth::routes();





Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/index2', function () {
    return view('front.index2');
})->name('index2');

Route::get('/language/{locale}', function ($locale) {
    session()->put('language', $locale);
    return redirect()->back();
});

Route::prefix('dashboard')->middleware(['auth', 'ActiveAccount', 'verified'])->name('user.')->group(function () {
    Route::get('/', [FrontendProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/support', [FrontendProfileController::class, 'support'])->name('support');
    Route::get('/support/create-ticket', [FrontendProfileController::class, 'create_ticket'])->name('create-ticket');
    Route::post('/support/create-ticket', [FrontendProfileController::class, 'store_ticket'])->name('store-ticket');
    Route::get('/support/{ticket}', [FrontendProfileController::class, 'ticket'])->name('ticket');
    Route::post('/support/{ticket}/reply', [FrontendProfileController::class, 'reply_ticket'])->name('reply-ticket');
    Route::get('/notifications', [FrontendProfileController::class, 'notifications'])->name('notifications');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/settings', [FrontendProfileController::class, 'profile_edit'])->name('edit');
        Route::put('/update', [FrontendProfileController::class, 'profile_update'])->name('update');
        Route::put('/update-password', [FrontendProfileController::class, 'profile_update_password'])->name('update-password');
        Route::put('/update-email', [FrontendProfileController::class, 'profile_update_email'])->name('update-email');
    });
});



#Route::get('/test',[BackendTestController::class,'test']);

Route::prefix('admin')->middleware(['auth', 'ActiveAccount'])->name('admin.')->group(function () {

    Route::get('/', [BackendAdminController::class, 'index'])->name('index');
    Route::get('homeAdmin', function () {
        return view('admin.index_2');
    });
    Route::middleware('auth')->group(function () {
        Route::resource('announcements', BackendAnnouncementController::class);
        Route::resource('files', BackendFileController::class);
        Route::post('contacts/resolve', [BackendContactController::class, 'resolve'])->name('contacts.resolve');
        Route::resource('contacts', BackendContactController::class);

        Route::post('career/resolve', [BackendCareerController::class, 'resolve'])->name('career.resolve');
        Route::resource('career', BackendCareerController::class);

        Route::resource('menus', BackendMenuController::class);
        Route::get('users/{user}/access', [BackendUserController::class, 'access'])->name('users.access');
        Route::resource('users', BackendUserController::class);
        Route::resource('roles', BackendRoleController::class);
        Route::get('user-roles/{user}', [BackendUserRoleController::class, 'index'])->name('users.roles.index');
        Route::put('user-roles/{user}', [BackendUserRoleController::class, 'update'])->name('users.roles.update');
        Route::resource('articles', BackendArticleController::class);
        Route::post('article-comments/change_status', [BackendArticleCommentController::class, 'change_status'])->name('article-comments.change_status');
        Route::resource('article-comments', BackendArticleCommentController::class);
        Route::resource('pages', BackendPageController::class);

        Route::prefix('pages')->name('pages.')->group(function () {
            Route::prefix('home')->name('home.')->group(function () {
                Route::get('section_one/{page}', [HomePageController::class, 'edit_section_one'])->name('edit_section_one');
                Route::PUT('section_one/{page}', [HomePageController::class, 'update_section_one'])->name('update_section_one');

                Route::get('section_two/{page}', [HomePageController::class, 'edit_section_two'])->name('edit_section_two');
                Route::PUT('section_two/{page}', [HomePageController::class, 'update_section_two'])->name('update_section_two');

                Route::get('show_section_three/{page}', [HomePageController::class, 'show_section_three'])->name('show_section_three');
                Route::PUT('add_subsidaries/{page}', [HomePageController::class, 'add_subsidaries'])->name('add_subsidaries');
                Route::PUT('update_subsidaries/{id}', [HomePageController::class, 'update_subsidaries'])->name('update_subsidaries');
                Route::Delete('delete_subsidaries/{id}', [HomePageController::class, 'delete_subsidaries'])->name('delete_subsidaries');
                // Route::PUT('section_three/{page}', [HomePageController::class, 'update_section_three'])->name('update_section_three');

                Route::get('show_section_five/{page}', [HomePageController::class, 'show_section_five'])->name('show_section_five');
                Route::PUT('add_portfolio/{page}', [HomePageController::class, 'add_portfolio'])->name('add_portfolio');
                Route::PUT('update_portfolio/{id}', [HomePageController::class, 'update_portfolio'])->name('update_portfolio');
                Route::Delete('delete_portfolio/{id}', [HomePageController::class, 'delete_portfolio'])->name('delete_portfolio');
            });

            Route::prefix('about')->name('about.')->group(function () {
                Route::get('intro/{page}', [AboutPageController::class, 'edit_intro'])->name('edit_intro');
                Route::PUT('intro/{page}', [AboutPageController::class, 'update_intro'])->name('update_intro');

                Route::get('our_values/{page}', [AboutPageController::class, 'edit_our_values'])->name('edit_our_values');
                Route::PUT('our_values/{page}', [AboutPageController::class, 'update_our_values'])->name('update_our_values');

                Route::get('show_our_values/{page}', [AboutPageController::class, 'show_our_values'])->name('show_our_values');
                Route::PUT('add_our_values/{page}', [AboutPageController::class, 'add_our_values'])->name('add_our_values');
                Route::PUT('update_our_values/{id}', [AboutPageController::class, 'update_our_values'])->name('update_our_values');
                Route::Delete('delete_our_values/{id}', [AboutPageController::class, 'delete_our_values'])->name('delete_our_values');

                Route::get('show_our_management/{page}', [AboutPageController::class, 'show_our_management'])->name('show_our_management');
                Route::PUT('add_our_management/{page}', [AboutPageController::class, 'add_our_management'])->name('add_our_management');
                Route::PUT('update_our_management/{id}', [AboutPageController::class, 'update_our_management'])->name('update_our_management');
                Route::Delete('delete_our_management/{id}', [AboutPageController::class, 'delete_our_management'])->name('delete_our_management');
            });

            Route::prefix('career')->name('career.')->group(function () {

                Route::get('intro/{page}', [CareerPageController::class, 'edit_intro'])->name('edit_intro');
                Route::PUT('intro/{page}', [CareerPageController::class, 'update_intro'])->name('update_intro');


                Route::get('show_why_work_at_diamond_group/{page}', [CareerPageController::class, 'show_why_work_at_diamond_group'])->name('show_why_work_at_diamond_group');
                Route::PUT('add_why_work_at_diamond_group/{page}', [CareerPageController::class, 'add_why_work_at_diamond_group'])->name('add_why_work_at_diamond_group');
                Route::PUT('update_why_work_at_diamond_group/{id}', [CareerPageController::class, 'update_why_work_at_diamond_group'])->name('update_why_work_at_diamond_group');
                Route::Delete('delete_why_work_at_diamond_group/{id}', [CareerPageController::class, 'delete_why_work_at_diamond_group'])->name('delete_why_work_at_diamond_group');
            });


            Route::prefix('contact')->name('contact.')->group(function () {

                Route::get('details/{page}', [ContactPageController::class, 'edit_details'])->name('edit_details');
                Route::PUT('details/{page}', [ContactPageController::class, 'update_details'])->name('update_details');
            });
        });

        Route::resource('tags', BackendTagController::class);
        Route::resource('contact-replies', BackendContactReplyController::class);
        Route::post('faqs/order', [BackendFaqController::class, 'order'])->name('faqs.order');
        Route::resource('faqs', BackendFaqController::class);
        Route::post('menu-links/get-type', [BackendMenuLinkController::class, 'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order', [BackendMenuLinkController::class, 'order'])->name('menu-links.order');
        Route::resource('menu-links', BackendMenuLinkController::class);
        Route::resource('categories', BackendCategoryController::class);
        Route::resource('redirections', BackendRedirectionController::class);
        Route::get('traffics', [BackendTrafficsController::class, 'index'])->name('traffics.index');
        Route::get('traffics/logs', [BackendTrafficsController::class, 'logs'])->name('traffics.logs');
        Route::get('error-reports', [BackendTrafficsController::class, 'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}', [BackendTrafficsController::class, 'error_report'])->name('traffics.error-report');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [BackendSettingController::class, 'index'])->name('index');
            Route::put('/update', [BackendSettingController::class, 'update'])->name('update');
            Route::put('/updateDashboardColor', [BackendSettingController::class, 'updateDashboardColor'])->name('updateDashboardColor');
        });
    });

    Route::prefix('upload')->name('upload.')->group(function () {
        Route::post('/image', [BackendHelperController::class, 'upload_image'])->name('image');
        Route::post('/file', [BackendHelperController::class, 'upload_file'])->name('file');
        Route::post('/remove-file', [BackendHelperController::class, 'remove_files'])->name('remove-file');
    });

    Route::prefix('plugins')->name('plugins.')->group(function () {
        Route::get('/', [BackendPluginController::class, 'index'])->name('index');
        Route::get('/create', [BackendPluginController::class, 'create'])->name('create');
        Route::post('/create', [BackendPluginController::class, 'store'])->name('store');
        Route::post('/{plugin}/activate', [BackendPluginController::class, 'activate'])->name('activate');
        Route::post('/{plugin}/deactivate', [BackendPluginController::class, 'deactivate'])->name('deactivate');
        Route::post('/{plugin}/delete', [BackendPluginController::class, 'delete'])->name('delete');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [BackendProfileController::class, 'index'])->name('index');
        Route::get('/edit', [BackendProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [BackendProfileController::class, 'update'])->name('update');
        Route::put('/update-password', [BackendProfileController::class, 'update_password'])->name('update-password');
        Route::put('/update-email', [BackendProfileController::class, 'update_email'])->name('update-email');
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [BackendNotificationsController::class, 'index'])->name('index');
        Route::get('/ajax', [BackendNotificationsController::class, 'ajax'])->name('ajax');
        Route::post('/see', [BackendNotificationsController::class, 'see'])->name('see');
        Route::get('/create', [BackendNotificationsController::class, 'create'])->name('create');
        Route::post('/create', [BackendNotificationsController::class, 'store'])->name('store');
    });
});

Route::get('/login/google/redirect', [LoginController::class, 'redirect_google']);
Route::get('/login/google/callback', [LoginController::class, 'callback_google']);
Route::get('/login/facebook/redirect', [LoginController::class, 'redirect_facebook']);
Route::get('/login/facebook/callback', [LoginController::class, 'callback_facebook']);


Route::get('blocked', [BackendHelperController::class, 'blocked_user'])->name('blocked');
Route::get('robots.txt', [BackendHelperController::class, 'robots']);
Route::get('manifest.json', [BackendHelperController::class, 'manifest'])->name('manifest');
Route::get('sitemap.xml', [BackendSiteMapController::class, 'sitemap']);
Route::get('sitemaps/links', [BackendSiteMapController::class, 'custom_links']);
Route::get('sitemaps/{name}/{page}/sitemap.xml', [BackendSiteMapController::class, 'viewer']);


Route::get('contact', [FrontController::class, 'contact'])->name('contact');
Route::get('page/{page}', [FrontController::class, 'page'])->name('page.show');
Route::get('tag/{tag}', [FrontController::class, 'tag'])->name('tag.show');
Route::get('category/{category}', [FrontController::class, 'category'])->name('category.show');
Route::get('article/{article}', [FrontController::class, 'article'])->name('article.show');
Route::get('News', [FrontController::class, 'news'])->name('news.all');
Route::post('contact', [FrontController::class, 'contact_post'])->name('contact-post');
Route::post('comment', [FrontController::class, 'comment_post'])->name('comment-post');



Route::prefix('subsidaries')->name('subsidaries.')->group(function () {
    Route::get('/', [FrontController::class, 'index_subsidaries'])->name('index_subsidaries');
    Route::get('/{subsidaries}', [FrontController::class, 'sub_subsidaries'])->name('sub_subsidaries');
});
Route::prefix('career')->name('career.')->group(function () {
    Route::get('/', [FrontController::class, 'index_career'])->name('index_career');
    Route::POST('/career_form', [FrontController::class, 'career_form'])->name('career_form');
});

Route::get('about', [FrontController::class, 'about'])->name('about.page');
