<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebRequestController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return back();
});


Route::controller(WebRequestController::class)->group(function () {
    Route::get('facility-service-request', 'serviceRequest')->name('facility-service-request.index');
    Route::post('facility-service-request-store', 'store')->name('facility-service-request.store');
});

// User Support Ticket
Route::controller(SupportController::class)->prefix('support')->name('support.')->group(function () {
    Route::get('/all', 'supportTicket')->name('index');
    Route::get('new', 'openSupport')->name('open');
    Route::post('create', 'storeSupport')->name('store');
    Route::get('view/{number}', 'viewSupport')->name('view');
    Route::post('reply/{number}', 'replySupport')->name('reply');
    Route::post('close/{number}', 'closeSupport')->name('close');
    Route::get('download/{number}', 'supportDownload')->name('download');
});

Route::get('/property', [PropertyController::class, 'property'])->name('property');
Route::get('/property-detail/{slug}', [PropertyController::class, 'propertyDetail'])->name('property.detail');

Route::controller(WebController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');

    // event route
    Route::get('events', 'events')->name('events');
    Route::get('event-filter', 'eventFilter')->name('eventFilter');
    Route::get('events-details/{slug}', 'eventDetails')->name('event.details');
    Route::get('event-news', 'eventNews')->name('eventNews');
    Route::get('events-news-details/{slug}', 'eventNewsDetails')->name('event.news.details');
    Route::post('event-ask-form-submit', 'eventAskFormSubmit')->name('event.ask.form_submit');

    // service page
    Route::get('/marketing', 'marketing')->name('marketing');
    Route::get('/service', 'service')->name('service');

    Route::get('finance', 'finance')->name('finance');
    Route::get('evaluation-and-studies', 'evaluation')->name('evaluation');
    Route::get('social-investment', 'investment')->name('investment');
    Route::get('auctions-and-event', 'auction')->name('auction');
    Route::get('full-purchase', 'fullPurchase')->name('full.purchase');
    Route::get('full-purchase/{id}', 'fullPurchaseDetails')->name('full.purchase.details');
    Route::post('business-post-Req', 'businessPostReq')->name('business.post.request');
    Route::get('rehabilitation-empowerment', 'rehabilitationEempowerment')->name('rehabilitation.empowerment');

    Route::get('promotion/request/{id}', 'promotion_request')->name('promotion.request');
    Route::post('promotion-request', 'promotionRequest')->name('promotion.request.store');

    Route::get('asset/liability/request/{id}', 'assetLiability')->name('asset.liability.request');
    Route::post('asset/liability/request/store', 'assetLiabilityStore')->name('asset.liability.request.store');

    // floor plan
    Route::get('floor-plans', 'floorPlan')->name('floor-plans');
    Route::get('show-floor-plan/{id}', 'showFloorPlan')->name('showFloorPlan');

    Route::get('property-request-page', 'propertyRequestPage')->name('propertyRequestPage');
    Route::get('property-request-details/{id}', 'propertyRequestDettail')->name('propertyRequestDetails');
    Route::get('floor-plan-request/{title}', 'floorPlanRequest')->name('floorPlanRequest');
    Route::post('floor-plan-request-store', 'floorPlanRequestStore')->name('floorPlanRequestStore');

    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');


    // auction routes

    Route::get('auctions-category', 'auctions')->name('auctions');
    Route::get('auctions', 'auctionCategory')->name('auction.category');
    Route::get('auction/details/{slug}', 'auctionDetails')->name('auction.details');
    Route::get('auctions-maps/{id?}', 'auctionMap')->name('auctions.maps');

    Route::middleware(['check.status'])->group(function () {

        Route::post('fav-store', 'fvtStore')->name('fvtStore');

        Route::get('bidding-offer-request-page/{auction}/{property?}', 'biddingOfferRequest')->name('bidding.request.page');
        Route::post('bidding-offer-request', 'biddingOfferSend')->name('bidding.request.send');
        
        //property Request
        Route::get('/property-request', 'propertyRequest')->name('property-request');
        Route::post('/property-request', 'propertyRequestStore')->name('property.request.store');
    });


    Route::get('service-request', 'serviceRequest')->name('service.request');

    Route::get('facility-services', 'facilityServices')->name('facility.services');

    Route::post('service-request', 'serviceRequestStore')->name('service.request.store');
    Route::post('social-service-request', 'socialServiceRequestStore')->name('social.service.request.store');

    // request

    Route::group(['prefix' => 'request', 'as' => 'request.'], function(){
        Route::get('property-request/{id}', 'getPropertyRequestForm')->name('get.property_request');
        Route::post('property-request-store/{id}', 'requestPropertyRequestStore')->name('store.property_request');

        Route::get('auction-form-request/{id}', 'getAuctionRequestForm')->name('get.auction_request');
        Route::post('auction-request-form-store/{id}', 'requestAuctionRequestStore')->name('store.auction_request');
    });
    
    // ai service
    Route::get('/ai-service', 'aiService')->name('ai.service');
    Route::post('/ai-service', 'aiServiceStore')->name('ai.service.store');

    Route::get('marketing-request', 'marketingRequest')->name('marketing.request');
    Route::post('marketing-request', 'marketingRequestStore')->name('marketing.request.store');
    Route::get('finance-request', 'financeRequest')->name('finance.request');
    Route::post('finance-request', 'financeRequestStore')->name('finance.request.store');

    Route::post('property/request/send', 'propertyRequestSend')->name('property.request.send.store');
    
    
    // oportunity post
    
   Route::view('web/request/oportunity_form', 'web.request.oportunity_form')->name('request.oportunity_form');
   
   Route::post('web/request/oportunity-form-store', [WebController::class, 'oportunityFormSubmit'])->name('request.oportunity_form_submit');
   
   
   
    // routes for foreign ownerships and real estate

    Route::get('foreign-ownership', 'foreignOwnership')->name('foreign.ownership');
    Route::post('foreign-ownership-request-store', 'foreignOwnershipRequestStore')->name('foreign_ownership_request_store');



    //web
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');
    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');
    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::post('subscribe', 'subscribe')->name('subscribe');
    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');
    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});


// Favorite

Route::post('add-favorite', [FavoriteController::class, 'store'])->name('favorite.store');

Route::get('get-property-type-info/{val}', [WebController::class, 'getPropertyTypeInfo'])->name('get-property-type-info');

require __DIR__ . '/auth.php';
