<?php

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EventAskController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\EventNewsController;
use App\Http\Controllers\Admin\ExtensionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\AllCategoryController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\Admin\BiddingBoardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BusinessPostController;
use App\Http\Controllers\Admin\BusinessTypeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\AssetliabilityController;
use App\Http\Controllers\Admin\FinanceRequestController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ServiceContentController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\Admin\Auction\AuctionController;
use App\Http\Controllers\Admin\BusinessRequestController;
use App\Http\Controllers\Admin\PropertyRequestController;
use App\Http\Controllers\Admin\SubpropertyTypeController;
use App\Http\Controllers\Admin\BusinessCategoryController;
use App\Http\Controllers\Admin\MarketingRequestController;
use App\Http\Controllers\Admin\PromotionRequestController;
use App\Http\Controllers\Admin\PropertyTypeAreaController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\PropertyRequestSendController;
use App\Http\Controllers\Admin\SocialInvestRequestController;
use App\Http\Controllers\Admin\Request\AuctionFormRequestController;
use App\Http\Controllers\Admin\Request\PropertyFormRequestController;
use App\Http\Controllers\Admin\Request\FloorPlanRequestController;
use App\Http\Controllers\Admin\Request\AiServiceController;
use App\Http\Controllers\Admin\Request\OportunityRequestController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'Login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//     Admin Password Reset
Route::prefix('password')->name('password.')->group(function () {
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('reset');
    Route::post('reset', [ForgotPasswordController::class, 'sendResetCodeEmail']);
    Route::get('code-verify', [ForgotPasswordController::class, 'codeVerify'])->name('code.verify');
    Route::post('verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('verify.code');
});

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::get('password', [AdminController::class, 'password'])->name('password');
    Route::post('password', [AdminController::class, 'passwordUpdate'])->name('password.update');

    //Notification
    Route::get('notifications', [AdminController::class, 'notifications'])->name('notifications');
    Route::get('notification/read/{id}', [AdminController::class, 'notificationRead'])->name('notification.read');
    Route::get('notifications/read-all', [AdminController::class, 'readAll'])->name('notifications.readAll');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::get('password', [AdminController::class, 'password'])->name('password');
    Route::post('password', [AdminController::class, 'passwordUpdate'])->name('password.update');

    // Users Manager
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('/', [ManageUsersController::class, 'allUsers'])->name('all');
        Route::get('active', [ManageUsersController::class, 'activeUsers'])->name('active');
        Route::get('banned', [ManageUsersController::class, 'bannedUsers'])->name('banned');
        Route::get('email-verified', [ManageUsersController::class, 'emailVerifiedUsers'])->name('email.verified');
        Route::get('email-unverified', [ManageUsersController::class, 'emailUnverifiedUsers'])->name('email.unverified');
        Route::get('mobile-unverified', [ManageUsersController::class, 'mobileUnverifiedUsers'])->name('mobile.unverified');
        Route::get('detail/{id}', [ManageUsersController::class, 'detail'])->name('detail');
        Route::post('update/{id}', [ManageUsersController::class, 'update'])->name('update');
        Route::get('send-notification/{id}', [ManageUsersController::class, 'showNotificationSingleForm'])->name('notification.single');
        Route::post('send-notification/{id}', [ManageUsersController::class, 'sendNotificationSingle'])->name('notification.single');
        Route::get('login/{id}', [ManageUsersController::class, 'login'])->name('login');
        Route::post('status/{id}', [ManageUsersController::class, 'status'])->name('status');

        Route::get('send-notification', [ManageUsersController::class, 'showNotificationAllForm'])->name('notification.all');
        Route::post('send-notification', [ManageUsersController::class, 'sendNotificationAll'])->name('notification.all.send');
        Route::get('list', [ManageUsersController::class, 'list'])->name('list');
        Route::get('notification-log/{id}', [ManageUsersController::class, 'notificationLog'])->name('notification.log');
        Route::get('user-export-excel', [ManageUsersController::class, 'exportExcel'])->name('export.excel');
    });

    // Admin Support
    Route::prefix('support')->name('support.')->group(function () {
        Route::get('/', [SupportTicketController::class, 'tickets'])->name('index');
        Route::get('pending', [SupportTicketController::class, 'pendingTicket'])->name('pending');
        Route::get('closed', [SupportTicketController::class, 'closedTicket'])->name('closed');
        Route::get('answered', [SupportTicketController::class, 'answeredTicket'])->name('answered');
        Route::get('view/{id}', [SupportTicketController::class, 'ticketReply'])->name('view');
        Route::post('reply/{id}', [SupportTicketController::class, 'replyTicket'])->name('reply');
        Route::post('close/{id}', [SupportTicketController::class, 'closeTicket'])->name('close');
        Route::get('download/{ticket}', [SupportTicketController::class, 'ticketDownload'])->name('download');
        Route::post('delete/{id}', [SupportTicketController::class, 'ticketDelete'])->name('delete');
    });

    // Report
    Route::prefix('report')->name('report.')->group(function () {
        Route::get('login/history', [ReportController::class, 'loginHistory'])->name('login.history');
        Route::get('login/ipHistory/{ip}', [ReportController::class, 'loginIpHistory'])->name('login.ipHistory');
        Route::get('notification/history', [ReportController::class, 'notificationHistory'])->name('notification.history');
        Route::get('email/detail/{id}', [ReportController::class, 'emailDetails'])->name('email.details');
    });

    // Subscriber
    Route::prefix('subscriber')->name('subscriber.')->group(function () {
        Route::get('/', [SubscriberController::class, 'index'])->name('index');
        Route::get('send-email', [SubscriberController::class, 'sendEmailForm'])->name('send.email');
        Route::post('remove/{id}', [SubscriberController::class, 'remove'])->name('remove');
        Route::post('send-email', [SubscriberController::class, 'sendEmail'])->name('send.email');
    });

    // General Setting
    Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('setting.index');
    Route::post('general-setting', [GeneralSettingController::class, 'update'])->name('setting.update');

    //configuration
    Route::get('setting/system-configuration', [GeneralSettingController::class, 'systemConfiguration'])->name('setting.system.configuration');
    Route::post('setting/system-configuration', [GeneralSettingController::class, 'systemConfigurationSubmit']);

    // Logo-Icon
    Route::get('setting/logo-icon', [GeneralSettingController::class, 'logoIcon'])->name('setting.logo.icon');
    Route::post('setting/logo-icon', [GeneralSettingController::class, 'logoIconUpdate'])->name('setting.logo.icon');

    //Custom CSS
    Route::get('custom-css', [GeneralSettingController::class, 'customCss'])->name('setting.custom.css');
    Route::post('custom-css', [GeneralSettingController::class, 'customCssSubmit']);

    //Cookie
    Route::get('cookie', [GeneralSettingController::class, 'cookie'])->name('setting.cookie');
    Route::post('cookie', [GeneralSettingController::class, 'cookieSubmit']);

    //maintenance_mode
    Route::get('maintenance-mode', [GeneralSettingController::class, 'maintenanceMode'])->name('maintenance.mode');
    Route::post('maintenance-mode', [GeneralSettingController::class, 'maintenanceModeSubmit']);

    // Plugin
    Route::prefix('extensions')->name('extensions.')->group(function () {
        Route::get('/', [ExtensionController::class, 'index'])->name('index');
        Route::post('update/{id}', [ExtensionController::class, 'update'])->name('update');
        Route::post('status/{id}', [ExtensionController::class, 'status'])->name('status');
    });

    // Language Manager
    Route::prefix('language')->name('language.')->group(function () {
        Route::get('/', [LanguageController::class, 'langManage'])->name('manage');
        Route::post('/', [LanguageController::class, 'langStore'])->name('manage.store');
        Route::post('delete/{id}', [LanguageController::class, 'langDelete'])->name('manage.delete');
        Route::post('update/{id}', [LanguageController::class, 'langUpdate'])->name('manage.update');
        Route::get('edit/{id}', [LanguageController::class, 'langEdit'])->name('key');
        Route::post('import', [LanguageController::class, 'langImport'])->name('import.lang');
        Route::post('store/key/{id}', [LanguageController::class, 'storeLanguageJson'])->name('store.key');
        Route::post('delete/key/{id}', [LanguageController::class, 'deleteLanguageJson'])->name('delete.key');
        Route::post('update/key/{id}', [LanguageController::class, 'updateLanguageJson'])->name('update.key');
        Route::get('get-keys', [LanguageController::class, 'getKeys'])->name('get.key');
    });

    // Frontend
    Route::name('frontend.')->prefix('frontend')->group(function () {
        Route::get('frontend-sections/{key}', [FrontendController::class, 'frontendSections'])->name('sections');
        Route::post('frontend-content/{key}', [FrontendController::class, 'frontendContent'])->name('sections.content');
        Route::get('frontend-element/{key}/{id?}', [FrontendController::class, 'frontendElement'])->name('sections.element');
        Route::post('remove/{id}', [FrontendController::class, 'remove'])->name('remove');

        // Page Builder
        Route::get('manage-pages', [PageBuilderController::class, 'managePages'])->name('manage.pages');
        Route::post('manage-pages', [PageBuilderController::class, 'managePagesSave'])->name('manage.pages.save');
        Route::post('manage-pages/update', [PageBuilderController::class, 'managePagesUpdate'])->name('manage.pages.update');
        Route::post('manage-pages/delete/{id}', [PageBuilderController::class, 'managePagesDelete'])->name('manage.pages.delete');
        Route::get('manage-section/{id}', [PageBuilderController::class, 'manageSection'])->name('manage.section');
        Route::post('manage-section/{id}', [PageBuilderController::class, 'manageSectionUpdate'])->name('manage.section.update');

    });

    Route::get('seo', [FrontendController::class, 'seoEdit'])->name('seo');

    Route::name('frontend.')->prefix('frontend')->group(function () {

        Route::get('templates', [FrontendController::class, 'templates'])->name('templates');
        Route::post('templates', [FrontendController::class, 'templatesActive'])->name('templates.active');
        Route::get('frontend-sections/{key}', [FrontendController::class, 'frontendSections'])->name('sections');
        Route::post('frontend-content/{key}', [FrontendController::class, 'frontendContent'])->name('sections.content');
        Route::get('frontend-element/{key}/{id?}', [FrontendController::class, 'frontendElement'])->name('sections.element');
        Route::post('remove/{id}', [FrontendController::class, 'remove'])->name('remove');

        // Page Builder
        Route::get('manage-pages', [PageBuilderController::class, 'managePages'])->name('manage.pages');
        Route::post('manage-pages', [PageBuilderController::class, 'managePagesSave'])->name('manage.pages.save');
        Route::post('manage-pages/update', [PageBuilderController::class, 'managePagesUpdate'])->name('manage.pages.update');
        Route::post('manage-pages/delete/{id}', [PageBuilderController::class, 'managePagesDelete'])->name('manage.pages.delete');
        Route::get('manage-section/{id}', [PageBuilderController::class, 'manageSection'])->name('manage.section');
        Route::post('manage-section/{id}', [PageBuilderController::class, 'manageSectionUpdate'])->name('manage.section.update');

    });

    //Notification Setting
    Route::name('setting.notification.')->controller('NotificationController')->prefix('notification')->group(function () {
        //Template Setting
        Route::get('global', [NotificationController::class, 'global'])->name('global');
        Route::post('global/update', [NotificationController::class, 'globalUpdate'])->name('global.update');
        Route::get('templates', [NotificationController::class, 'templates'])->name('templates');
        Route::get('template/edit/{id}', [NotificationController::class, 'templateEdit'])->name('template.edit');
        Route::post('template/update/{id}', [NotificationController::class, 'templateUpdate'])->name('template.update');

        //Email Setting
        Route::get('email/setting', [NotificationController::class, 'emailSetting'])->name('email');
        Route::post('email/setting', [NotificationController::class, 'emailSettingUpdate']);
        Route::post('email/test', [NotificationController::class, 'emailTest'])->name('email.test');

        //SMS Setting
        Route::get('sms/setting', [NotificationController::class, 'smsSetting'])->name('sms');
        Route::post('sms/setting', [NotificationController::class, 'smsSettingUpdate']);
        Route::post('sms/test', [NotificationController::class, 'smsTest'])->name('sms.test');
    });

    //Property Type
    Route::prefix('property-type')->name('property.type.')->group(function () {
        Route::get('/', [PropertyTypeController::class, 'index'])->name('index');
        Route::get('/create', [PropertyTypeController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [PropertyTypeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PropertyTypeController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [PropertyTypeController::class, 'status'])->name('status');
        Route::get('/show/{id}', [PropertyTypeController::class, 'show'])->name('show');
        Route::post('/show/{id}', [PropertyTypeController::class, 'showFieldUpdate']);

    });

    // Sub Property Type
    Route::prefix('sub-property-type')->name('sub.property.type.')->group(function () {
        Route::get('/', [SubpropertyTypeController::class, 'index'])->name('index');
        Route::get('/create', [SubpropertyTypeController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [SubpropertyTypeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubpropertyTypeController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [SubpropertyTypeController::class, 'status'])->name('status');
        Route::get('/show/{id}', [SubpropertyTypeController::class, 'show'])->name('show');
        Route::post('/show/{id}', [SubpropertyTypeController::class, 'showFieldUpdate']);

    });

    //Property Type
    Route::prefix('city')->name('city.')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('index');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [CityController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CityController::class, 'edit'])->name('edit');
    });

    // country route
    Route::prefix('country')->name('country.')->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        Route::post('/store/{id?}', [CountryController::class, 'store'])->name('store');
    });

    //Property Type Area
    Route::prefix('property-type-area')->name('property.type.area.')->group(function () {
        Route::get('/', [PropertyTypeAreaController::class, 'index'])->name('index');
        Route::get('/create', [PropertyTypeAreaController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [PropertyTypeAreaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PropertyTypeAreaController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [PropertyTypeAreaController::class, 'status'])->name('status');
    });

    // property route
    Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
        Route::get('/', [PropertyController::class, 'index'])->name('index');
        Route::get('/pending', [PropertyController::class, 'pending'])->name('pending');
        Route::get('/published', [PropertyController::class, 'published'])->name('published');
        Route::get('/review', [PropertyController::class, 'review'])->name('review');
        Route::get('/rejected', [PropertyController::class, 'rejected'])->name('rejected');
        Route::get('/create', [PropertyController::class, 'create'])->name('create');
        Route::post('/store', [PropertyController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PropertyController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('edit');
        Route::get('/status/{id}/{status}', [PropertyController::class, 'status'])->name('status');
        Route::get('/show/{id}', [PropertyController::class, 'show'])->name('show');
    });


    // Service request route
    Route::group(['prefix' => 'property-request-send', 'as' => 'property-request.send.'], function () {
        Route::get('/', [PropertyRequestSendController::class, 'index'])->name('index');
        Route::get('/pending', [PropertyRequestSendController::class, 'pending'])->name('pending');
        Route::get('/published', [PropertyRequestSendController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [PropertyRequestSendController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [PropertyRequestSendController::class, 'status'])->name('status');
        Route::get('/show/{id}', [PropertyRequestSendController::class, 'show'])->name('show');


    });
    //Business Type
    Route::group(['prefix' => 'businesstype', 'as' => 'businesstype.'], function () {
        Route::get('/', [BusinessTypeController::class, 'index'])->name('index');
        Route::get('/create', [BusinessTypeController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [BusinessTypeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BusinessTypeController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [BusinessTypeController::class, 'status'])->name('status');
    });

    // Business Category
    Route::group(['prefix' => 'businesscategory', 'as' => 'businesscategory.'], function () {
        Route::get('/', [BusinessCategoryController::class, 'index'])->name('index');
        Route::get('/create', [BusinessCategoryController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [BusinessCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BusinessCategoryController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [BusinessCategoryController::class, 'status'])->name('status');
    });


    // Business  Post
    Route::group(['prefix' => 'businesspost', 'as' => 'businesspost.'], function () {
        Route::get('/', [BusinessPostController::class, 'index'])->name('index');
        Route::get('/create', [BusinessPostController::class, 'create'])->name('create');
        Route::post('/store', [BusinessPostController::class, 'store'])->name('store');
        Route::post('/update/{id}', [BusinessPostController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [BusinessPostController::class, 'edit'])->name('edit');
        Route::get('/status/{id}/{status}', [BusinessPostController::class, 'status'])->name('status');
        Route::get('/show/{id}', [BusinessPostController::class, 'show'])->name('show');
        Route::get('/request', [BusinessPostController::class, 'request'])->name('request');
    });

    // Business  Post
    Route::group(['prefix' => 'business-request', 'as' => 'business.request.'], function () {
        Route::get('/', [BusinessRequestController::class, 'index'])->name('index');
        Route::get('/show/{id}', [BusinessRequestController::class, 'show'])->name('show');
        Route::get('/approve/{id}', [BusinessRequestController::class, 'approve'])->name('approve');
        Route::get('/reject/{id}', [BusinessRequestController::class, 'reject'])->name('reject');

    });


    // Service request route
    Route::group(['prefix' => 'service-request', 'as' => 'service.request.'], function () {
        Route::get('/', [ServiceRequestController::class, 'index'])->name('index');
        Route::get('/pending', [ServiceRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [ServiceRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [ServiceRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [ServiceRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [ServiceRequestController::class, 'show'])->name('show');
    });

     // Service request route
     Route::group(['prefix' => 'social-service-request', 'as' => 'social.service.request.'], function () {
        Route::get('/', [SocialInvestRequestController::class, 'index'])->name('index');
        Route::get('/pending', [SocialInvestRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [SocialInvestRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [SocialInvestRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [SocialInvestRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [SocialInvestRequestController::class, 'show'])->name('show');
    });

    // Finance request route
    Route::group(['prefix' => 'finance-request', 'as' => 'finance.request.'], function () {
        Route::get('/', [FinanceRequestController::class, 'index'])->name('index');
        Route::get('/pending', [FinanceRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [FinanceRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [FinanceRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [FinanceRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [FinanceRequestController::class, 'show'])->name('show');
    });

    // Property request route
    Route::group(['prefix' => 'property-request', 'as' => 'property.request.'], function () {
        Route::get('/', [PropertyRequestController::class, 'index'])->name('index');
        Route::get('/pending', [PropertyRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [PropertyRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [PropertyRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [PropertyRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [PropertyRequestController::class, 'show'])->name('show');
    });

    // Promotion request route
    Route::group(['prefix' => 'promotion-request', 'as' => 'promotion.request.'], function () {
        Route::get('/', [PromotionRequestController::class, 'index'])->name('index');
        Route::get('/show/{id}', [PromotionRequestController::class, 'show'])->name('show');
        Route::get('/approve/{id}', [PromotionRequestController::class, 'approve'])->name('approve');
        Route::get('/reject/{id}', [PromotionRequestController::class, 'reject'])->name('reject');
    });

     // Access libility request route
    Route::group(['prefix' => 'asset-liability-request', 'as' => 'asset.liability.request.'], function () {
        Route::get('/', [AssetliabilityController::class, 'index'])->name('index');
        Route::get('/show/{id}', [AssetliabilityController::class, 'show'])->name('show');
        Route::get('/approve/{id}', [AssetliabilityController::class, 'approve'])->name('approve');
        Route::get('/reject/{id}', [AssetliabilityController::class, 'reject'])->name('reject');
    });

    // Marketing request route
    Route::group(['prefix' => 'marketing-request', 'as' => 'marketing.request.'], function () {
        Route::get('/', [MarketingRequestController::class, 'index'])->name('index');
        Route::get('/pending', [MarketingRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [MarketingRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [MarketingRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [MarketingRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [MarketingRequestController::class, 'show'])->name('show');
    });

    // property route
    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [ServiceController::class, 'status'])->name('status');
        Route::get('/view/{id}', [ServiceController::class, 'view'])->name('view');

        Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
            Route::post('/store/{id?}', [ServiceContentController::class, 'store'])->name('store');
            Route::post('/status/{id}', [ServiceContentController::class, 'status'])->name('status');
        });
    });


    // blog route

    Route::group(['prefix' => 'blog-category', 'as' => 'blog.category.'], function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('index');
        Route::post('/store/{id?}', [BlogCategoryController::class, 'store'])->name('store');
        Route::post('/status/{id}', [BlogCategoryController::class, 'status'])->name('status');
    });

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/status/{id}', [BlogController::class, 'status'])->name('status');
    });

    // auction route

    Route::group(['prefix' => 'auction', 'as' => 'auction.'], function () {
        Route::get('/', [AuctionController::class, 'index'])->name('index');
        Route::get('/pending', [AuctionController::class, 'pending'])->name('pending');
        Route::get('/finished', [AuctionController::class, 'finished'])->name('finished');
        Route::get('/upcoming', [AuctionController::class, 'upcoming'])->name('upcoming');
        Route::get('/current', [AuctionController::class, 'current'])->name('current');
        Route::get('/create', [AuctionController::class, 'create'])->name('create');
        Route::post('/store', [AuctionController::class, 'store'])->name('store');
        Route::post('/update/{id}', [AuctionController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [AuctionController::class, 'edit'])->name('edit');
        Route::get('/status/{id}/{status}', [AuctionController::class, 'status'])->name('status');
        Route::get('/show/{id}', [AuctionController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'bidding-board', 'as' => 'bidding.board.'], function () {
        Route::get('/show/{id}', [BiddingBoardController::class, 'show'])->name('show');
    });

     // category route

    Route::group(['prefix' => 'all-category', 'as' => 'all_category.'], function () {
        Route::get('/', [AllCategoryController::class, 'index'])->name('index');
        Route::get('/create', [AllCategoryController::class, 'create'])->name('create');
        Route::post('/store/{id?}', [AllCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AllCategoryController::class, 'edit'])->name('edit');
        Route::get('/status/{id}', [AllCategoryController::class, 'status'])->name('status');
    });

    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/pending', [EventController::class, 'pending'])->name('pending');
        Route::get('/published', [EventController::class, 'published'])->name('published');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::post('/store', [EventController::class, 'store'])->name('store');
        Route::post('/update/{id}', [EventController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
        Route::get('/status/{id}/{status}', [EventController::class, 'status'])->name('status');
        Route::get('/show/{id}', [EventController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'events-news', 'as' => 'event_news.'], function () {
        Route::get('/', [EventNewsController::class, 'index'])->name('index');
        Route::get('/pending', [EventNewsController::class, 'pending'])->name('pending');
        Route::get('/published', [EventNewsController::class, 'published'])->name('published');
        Route::get('/create', [EventNewsController::class, 'create'])->name('create');
        Route::post('/store', [EventNewsController::class, 'store'])->name('store');
        Route::post('/update/{id}', [EventNewsController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [EventNewsController::class, 'edit'])->name('edit');
        Route::get('/status/{id}/{status}', [EventNewsController::class, 'status'])->name('status');
        Route::get('/show/{id}', [EventNewsController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'events-ask', 'as' => 'event_ask.'], function () {
        Route::get('/', [EventAskController::class, 'index'])->name('index');
        Route::get('/show/{id}', [EventAskController::class, 'show'])->name('show');
    });

    // Auction request route
    Route::group(['prefix' => 'auction-request', 'as' => 'auction.request.'], function () {
        Route::get('/', [AuctionFormRequestController::class, 'index'])->name('index');
        Route::get('/pending', [AuctionFormRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [AuctionFormRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [AuctionFormRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [AuctionFormRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [AuctionFormRequestController::class, 'show'])->name('show');
    });

    // Auction request route
    Route::group(['prefix' => 'property-form-request', 'as' => 'property.form.request.'], function () {
        Route::get('/', [PropertyFormRequestController::class, 'index'])->name('index');
        Route::get('/pending', [PropertyFormRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [PropertyFormRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [PropertyFormRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [PropertyFormRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [PropertyFormRequestController::class, 'show'])->name('show');
    });
    
    // floor plan request route
    Route::group(['prefix' => 'floor-plan-form-request', 'as' => 'floor_plan.form.request.'], function () {
        Route::get('/', [FloorPlanRequestController::class, 'index'])->name('index');
        Route::get('/pending', [FloorPlanRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [FloorPlanRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [FloorPlanRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [FloorPlanRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [FloorPlanRequestController::class, 'show'])->name('show');
    });

    // ai service request route
    Route::group(['prefix' => 'ai-service-form-request', 'as' => 'ai_service.form.request.'], function () {
        Route::get('/', [AiServiceController::class, 'index'])->name('index');
        Route::get('/pending', [AiServiceController::class, 'pending'])->name('pending');
        Route::get('/published', [AiServiceController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [AiServiceController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [AiServiceController::class, 'status'])->name('status');
        Route::get('/show/{id}', [AiServiceController::class, 'show'])->name('show');
    });
    
     // oportunity service request route
    Route::group(['prefix' => 'oportunity-form-request', 'as' => 'oportunity.form.request.'], function () {
        Route::get('/', [OportunityRequestController::class, 'index'])->name('index');
        Route::get('/pending', [OportunityRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [OportunityRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [OportunityRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [OportunityRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [OportunityRequestController::class, 'show'])->name('show');
    });

    // foreign service request route
    Route::group(['prefix' => 'foreign-request', 'as' => 'foreign.form.request.'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'index'])->name('index');
        Route::get('/pending', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'pending'])->name('pending');
        Route::get('/published', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'accepted'])->name('accepted');
        Route::get('/rejected', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'rejected'])->name('rejected');
        Route::get('/status/{id}/{status}', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'status'])->name('status');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Request\ForeignOwnerRequestController::class, 'show'])->name('show');
    });
});
