<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\AdminNotification;
use App\Models\AiService;
use App\Models\AllCategory;
use App\Models\AssetliabilitieRequest;
use App\Models\Auction;
use App\Models\AuctionCategory;
use App\Models\AuctionFormRequest;
use App\Models\Bidding;
use App\Models\Blog;
use App\Models\BusinessCategory;
use App\Models\BusinessPost;
use App\Models\BusinessRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\EventAsk;
use App\Models\EventNews;
use App\Models\FacilityService;
use App\Models\FinanceRequest;
use App\Models\FloorPlanRequest;
use App\Models\ForeignOwnershipRequest;
use App\Models\Form;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\MarketingRequest;
use App\Models\OportunityRequest;
use App\Models\Page;
use App\Models\PromotionRequest;
use App\Models\Property;
use App\Models\PropertyFormRequest;
use App\Models\PropertyRequest;
use App\Models\PropertyRequestSend;
use App\Models\PropertyType;
use App\Models\ServiceRequest;
use App\Models\SocialInvestRequest;
use App\Models\Subscriber;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class WebController extends Controller
{
    public function index()
    {
        $sections = Page::where('slug', '/')->first();

        // $propertyTypes = PropertyType::with('property_type_cities.city')->active()->get();


        $query = Auction::query();

        $auctions = $query->ifNotPending()->latest()->get();

        $propertyTypes = PropertyType::Active()->get();

        return view('web.home', compact('sections', 'propertyTypes', 'auctions'));
    }

    public function contact()
    {
        $user = auth()->user();
        return view('web.contact', compact('user'));
    }

    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;

        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = Status::TICKET_OPEN;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title = 'A new contact message has been submitted';
        $adminNotification->click_url = urlPath('admin.support.view', $ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('support.view', [$ticket->ticket])->withNotify($notify);
    }

    public function blogs()
    {
        $blogs = Blog::active()->paginate(getPaginate());
        $sections = Page::where('slug', 'blogs')->first();

        return view('web.blogs', compact('blogs', 'sections'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::active()->where('slug', $slug)->first();

        $blog->view = $blog->view + 1;
        $blog->save();

        $recentPosts = Blog::active()->where('id', '!=', $blog->id)->orderBy('id', 'desc')->limit(5)->get();
        $popularPosts = Blog::active()->where('id', '!=', $blog->id)->orderBy('view', 'desc')->limit(5)->get();

        return view('web.blog_details', compact('blog', 'recentPosts', 'popularPosts'));
    }

    public function marketing()
    {

        $sections = Page::where('slug', 'marketing')->first();
        return view('web.marketing', compact('sections'));
    }
    public function service()
    {

        $sections = Page::where('slug', 'service')->first();
        return view('web.service', compact('sections'));
    }

    public function finance()
    {

        $sections = Page::where('slug', 'finance')->first();
        return view('web.finance', compact('sections'));
    }

    public function evaluation()
    {
        $sections = Page::where('slug', 'evaluation-and-studies')->first();
        return view('web.evaluation', compact('sections'));
    }

    public function investment()
    {
        $sections = Page::where('slug', 'social-investment')->first();
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $propertyTypes = PropertyType::active()->get();
        return view('web.social_investment', compact('sections', 'countries', 'propertyTypes'));
    }

    public function auction(Request $request)
    {

        $sections = Page::where('slug', 'auctions-and-event')->first();
        return view('web.auctions_event', compact('sections'));
    }

    public function serviceRequest()
    {
        $title = 'Service Request';
        $propertyTypes = PropertyType::active()->get();
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $sections = Page::where('slug', 'service-request')->first();
        return view('web.service_request', compact('title', 'propertyTypes', 'countries', 'sections'));

    }

    public function serviceRequestStore(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'budget' => 'required',
            'email' => 'required|string|email',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            "country_id" => "required|exists:countries,id",
            "city_id" => "required|exists:cities,id",
            "property_type_id" => "required|exists:property_types,id",
            'description' => 'nullable',
            'title'      => "nullable|string|max:191",
        ]);

        $serviceRequest = new ServiceRequest();
        $serviceRequest->name = $request->name;
        $serviceRequest->email = $request->email;
        $serviceRequest->mobile = $request->mobile;
        $serviceRequest->country_id = $request->country_id;
        $serviceRequest->city_id = $request->city_id;
        $serviceRequest->property_type_id = $request->property_type_id;
        $serviceRequest->description = $request->description;
        $serviceRequest->budget = $request->budget;
        $serviceRequest->type = $request->type;
        $serviceRequest->title = $request->title;

        $serviceRequest->save();

        $notify[] = ['success', 'Service Request Send Successfully'];
        return back()->withNotify($notify);
    }

    public function socialServiceRequestStore(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'budget' => 'required',
            'email' => 'required|string|email',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            "country_id" => "required|exists:countries,id",
            "city_id" => "required|exists:cities,id",
            "property_type_id" => "required|exists:property_types,id",
            'description' => 'nullable',
            'sectors'     => 'required|array'
        ]);

        $serviceRequest = new SocialInvestRequest();
        $serviceRequest->name = $request->name;
        $serviceRequest->email = $request->email;
        $serviceRequest->mobile = $request->mobile;
        $serviceRequest->country_id = $request->country_id;
        $serviceRequest->city_id = $request->city_id;
        $serviceRequest->property_type_id = $request->property_type_id;
        $serviceRequest->description = $request->description;
        $serviceRequest->budget = $request->budget;

        $secs = [];

        if ($request->has('sectors')) {
            $secs = $request->sectors;
            $serviceRequest->sectors = json_encode($secs);
        }

        $serviceRequest->save();

        $notify[] = ['success', 'Service Request Send Successfully'];
        return back()->withNotify($notify);
    }

    public function marketingRequest()
    {
        $title = __('Marketing Request');
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $sections = Page::where('slug', 'service-request')->first();
        return view('web.marketing_request', compact('title', 'countries', 'sections'));

    }

    public function marketingRequestStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'company' => 'required|string',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'email' => 'required|string|email',
            "country_id" => "required|exists:countries,id",
            "city_id" => "required|exists:cities,id",
            'activity' => 'required|string',
            'sectors'  => 'required|string'
        ]);

        $serviceRequest = new MarketingRequest();
        $serviceRequest->name = $request->name;
        $serviceRequest->job_title = $request->job_title;
        $serviceRequest->company = $request->company;
        $serviceRequest->mobile = $request->mobile;
        $serviceRequest->email = $request->email;
        $serviceRequest->country_id = $request->country_id;
        $serviceRequest->city_id = $request->city_id;
        $serviceRequest->activity = $request->activity;
        $serviceRequest->sectors = $request->sectors;
        $serviceRequest->save();

        $notify[] = ['success', 'Marketing Request Send Successfully'];
        return back()->withNotify($notify);
    }

    public function financeRequest()
    {
        $title = 'Finance Request';
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $sections = Page::where('slug', 'service-request')->first();
        $propertyTypes = PropertyType::active()->get();
        return view('web.finance_request', compact('title', 'countries', 'sections', 'propertyTypes'));

    }

    public function fullPurchase(Request $request)
    {
        $businessPosts = BusinessPost::searchable(['businesscategory:name'])->paginate(getPaginate());

        $businessCategory = BusinessCategory::active()->get();
        $sections = Page::where('slug', 'full-purchase')->first();
        return view('web.full_purchase', compact('sections', 'businessPosts', 'businessCategory'));
    }

    public function rehabilitationEempowerment()
    {
        $sections = Page::where('slug', 'rehabilitation-empowerment')->first();
        return view('web.rehabilitation_empowerment', compact('sections'));
    }

    public function fullPurchaseDetails($id)
    {
        $businessPost = BusinessPost::find($id);
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        return view('web.full_purchase_details', compact('businessPost', 'countries'));
    }

    public function businessPostReq(Request $request)
    {
        $request->validate([
            'business_post_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'name' => 'required',
            'position_title' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);

        $businessPostRequest = new BusinessRequest();
        $businessPostRequest->user_id = auth()->id() ?? 0;
        $businessPostRequest->business_post_id = $request->business_post_id;
        $businessPostRequest->name = $request->name;
        $businessPostRequest->position_title = $request->position_title;
        $businessPostRequest->email = $request->email;
        $businessPostRequest->mobile = $request->mobile;
        $businessPostRequest->country_id = $request->country_id;
        $businessPostRequest->city_id = $request->city_id;
        $businessPostRequest->message = $request->message;
        $businessPostRequest->save();
        $notify[] = ['success', 'Business Request Send Successfully'];
        return back()->withNotify($notify);

    }

    public function financeRequestStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'family_name' => 'required|string',
            'nid' => 'required|string',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'email' => 'required|string|email',
            'alawwal' => 'required',
            "property_type_id" => "required|exists:property_types,id",
            "country_id" => "required|exists:countries,id",
            "city_id" => "required|exists:cities,id",
            'monthly_income' => 'required|string',
        ]);

        $financeRequest = new FinanceRequest();
        $financeRequest->name = $request->name;
        $financeRequest->family_name = $request->family_name;
        $financeRequest->nid = $request->nid;
        $financeRequest->mobile = $request->mobile;
        $financeRequest->email = $request->email;
        $financeRequest->alawwal = $request->alawwal;
        $financeRequest->country_id = $request->country_id;
        $financeRequest->city_id = $request->city_id;
        $financeRequest->property_type_id = $request->property_type_id;
        $financeRequest->monthly_income = $request->monthly_income;
        $financeRequest->save();

        $notify[] = ['success', 'Finance Request Send Successfully'];
        return back()->withNotify($notify);
    }

    public function propertyRequest()
    {
        $title = 'Property Request';
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $sections = Page::where('slug', 'service-request')->first();
        $propertyTypes = PropertyType::active()->get();
        return view('web.property_request', compact('title', 'countries', 'sections', 'propertyTypes'));

    }

    public function propertyRequestStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'email' => 'required|string|email',
            "country_id" => "required|exists:countries,id",
            "city_id" => "required|exists:cities,id",
            "nature_of_property" => "required",
            "property_type_id" => "required|exists:property_types,id",
            "subproperty_type_id" => "nullable|exists:subproperty_types,id",
            "budget" => "required",
            'purpose' => 'required|string',
            'area' => 'required|string',
            'detail' => 'required|string',
            'thumb_image' => 'required'
        ]);

        $propertyRequest = new PropertyRequest();
        $propertyRequest->user_id = auth()->check() ? auth()->user()->id : null;
        $propertyRequest->name = $request->name;
        $propertyRequest->mobile = $request->mobile;
        $propertyRequest->email = $request->email;
        $propertyRequest->country_id = $request->country_id;
        $propertyRequest->city_id = $request->city_id;
        $propertyRequest->nature_of_property = $request->nature_of_property;
        $propertyRequest->property_type_id = $request->property_type_id;
        $propertyRequest->subproperty_type_id = $request->subproperty_type_id;
        $propertyRequest->budget = $request->budget;
        $propertyRequest->purpose = $request->purpose;
        $propertyRequest->area = $request->area;
        $propertyRequest->detail = $request->detail;

        if ($request->hasFile('thumb_image')) {
            try {
                $old = $propertyRequest->thumb_image;
                $propertyRequest->thumb_image = fileUploader($request->thumb_image, getFilePath('property_thumb'), getFileSize('property_thumb'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $propertyRequest->save();


        $notify[] = ['success', 'Property Request Send Successfully'];
        return back()->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) {
            $lang = 'en';
        }

        session()->put('lang', $lang);

        return back();
    }

    public function cookieAccept()
    {
        Cookie::queue('gdpr_cookie', gs('site_name'), 43200);
    }

    public function cookiePolicy()
    {
        $cookie = Frontend::where('data_keys', 'cookie.data')->first();
        return view('cookie', compact('cookie'));
    }

    // public function placeholderImage($size = null)
    // {
    //     $imgWidth = explode('x', $size)[0];
    //     $imgHeight = explode('x', $size)[1];
    //     $text = $imgWidth . '×' . $imgHeight;
    //     $fontFile = realpath('assets/font/RobotoMono-Regular.ttf');
    //     $fontSize = round(($imgWidth - 50) / 8);
    //     if ($fontSize <= 9) {
    //         $fontSize = 9;
    //     }
    //     if ($imgHeight < 100 && $fontSize > 30) {
    //         $fontSize = 30;
    //     }

    //     $image = imagecreatetruecolor($imgWidth, $imgHeight);
    //     $colorFill = imagecolorallocate($image, 100, 100, 100);
    //     $bgFill = imagecolorallocate($image, 175, 175, 175);
    //     imagefill($image, 0, 0, $bgFill);
    //     $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
    //     $textWidth = abs($textBox[4] - $textBox[0]);
    //     $textHeight = abs($textBox[5] - $textBox[1]);
    //     $textX = ($imgWidth - $textWidth) / 2;
    //     $textY = ($imgHeight + $textHeight) / 2;
    //     header('Content-Type: image/jpeg');
    //     imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
    //     imagejpeg($image);
    //     imagedestroy($image);
    // }

    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $title = $page->name;
        $sections = $page->secs;

        return view('pages', compact('title', 'sections'));
    }

    public function policyPages($slug, $id)
    {
        $policy = Frontend::where('id', $id)->where('data_keys', 'policy_pages.element')->firstOrFail();
        $title = $policy->data_values->title;
        return view('policy', compact('policy', 'title'));
    }

    public function maintenance()
    {
        if (gs('maintenance_mode') == Status::DISABLE) {
            return to_route('home');
        }
        $maintenance = Frontend::where('data_keys', 'maintenance.data')->first();
        return view('maintenance', compact('maintenance'));
    }

    public function subscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:subscribers,email',
        ];
        $message = [
            "email.unique" => 'You have already subscribed',
        ];
        $validator = validator()->make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->getMessages()]);
        }

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        return response()->json(['success' => true, 'message' => 'Thanks for subscribe']);
    }

    public function getPropertyTypeInfo(Request $request, $val)
    {
        $gn_name = 'propert_type_form_' . $val;
        $formData = Form::where('act', $gn_name)->first();

        $property = Property::with('details')->find($request->property_id);
        $property_details = $property->details ?? null;

        // return $property_details[0]->val;

        return view('admin.property.include.property_type_info', compact('formData', 'property_details'))->render();
    }


    public function propertyRequestSend(Request $request)
    {
        $request->validate([
            'property_id' => "required|exists:properties,id",
            'name' => 'required|string',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'email' => 'required|string|email',
            'job_title' => "required",
            'message' => 'required|string',
        ]);


        try {
            $propety_request = new PropertyRequestSend();
            $propety_request->user_id = Auth::user()->id ?? null;
            $propety_request->property_id = $request->property_id;
            $propety_request->name = $request->name;
            $propety_request->mobile = $request->mobile;
            $propety_request->email = $request->email;
            $propety_request->job_title = $request->job_title;
            $propety_request->message = $request->message;
            $propety_request->status = 0;
            $propety_request->save();

            $notify[] = ['success', __('Property Request Send Successfully')];
            return back()->withNotify($notify);

        } catch (Exception $e) {
            
            return $e->getMessage();
            $notify[] = ['error', __('Something went wrong!')];
            return back()->withNotify($notify);
        }
    }

    public function promotion_request($id)
    {

        $data['seo'] = Frontend::where('data_keys', 'seo.data')->first()->data_values;
        $data['promotion'] = Frontend::where('id', $id)->where('data_keys', 'promotion.element')->firstOrFail();
        return view('web.promotion_request',$data);
    }

    public function promotionRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'nullable',
            'country_id' => 'nullable',
            'city_id' => 'nullable',
            'message' => 'nullable',
        ]);

        $promotion = new PromotionRequest();
        $promotion->name = $request->name;
        $promotion->email = $request->email;
        $promotion->mobile = $request->mobile;
        $promotion->country_id = $request->country_id;
        $promotion->city_id = $request->city_id;
        $promotion->message = $request->message;
        $promotion->save();

        $notify[] = ['success', 'Promotion Request Send Successfully'];
        return back()->withNotify($notify);

    }

    public function assetLiability($id){
        $data['seo'] = Frontend::where('data_keys', 'seo.data')->first()->data_values;
        $data['assetLiabilitie'] = Frontend::where('id', $id)->where('data_keys', 'offer_banner.element')->firstOrFail();
        return view('web.asset_liabilitie_request',$data);
    }

    public function assetLiabilityStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'nullable',
            'country_id' => 'nullable',
            'city_id' => 'nullable',
            'message' => 'nullable',
        ]);

        $liability = new AssetliabilitieRequest();
        $liability->name = $request->name;
        $liability->email = $request->email;
        $liability->mobile = $request->mobile;
        $liability->country_id = $request->country_id;
        $liability->city_id = $request->city_id;
        $liability->message = $request->message;
        $liability->save();

        $notify[] = ['success', 'Assets Liability Request Send Successfully'];
        return back()->withNotify($notify);

    }

  public function floorPlan()
    {
        $floorPlanElements = getContent('floor_plan.element', null, false, true);
        return view('web.pages.floor_plan', compact('floorPlanElements'));
    }

    public function showFloorPlan($id)
    {
        try {
            $florPlanElement = Frontend::find($id);
            $floorPlan = $florPlanElement->data_values;
            return view('web.pages.show_floor_plan', compact('floorPlan'));
        } catch(Exception $e){
            return back();
        }
    }

    public function floorPlanRequest($title_decode)
    {
        $floor_title = urldecode($title_decode);
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        return view('web.request.floor_plan_request', compact('floor_title', 'countries'));
    }

    public function floorPlanRequestStore(Request $request)
    {
        $request->validate([
            "name"          => "required|string|max:255",
            "job_title"     => "required|string|max:255",
            "company"       => "required|string|max:255",
            "email"         => "required|string|email|max:255",
            "mobile"        => "required|string|max:255",
            "plan"          => "required|string|max:255",
            "country_id"    => "required",
            "city_id"       => "nullable",
            "detail"        => "required",
        ]);


        try{
            $floorPlanRequest = new FloorPlanRequest();
            $floorPlanRequest->name = $request->name;
            $floorPlanRequest->job_title = $request->job_title;
            $floorPlanRequest->company = $request->company;
            $floorPlanRequest->email = $request->email;
            $floorPlanRequest->mobile = $request->mobile;
            $floorPlanRequest->plan = $request->plan;
            $floorPlanRequest->country_id = $request->country_id;
            $floorPlanRequest->city_id = $request->city_id;
            $floorPlanRequest->detail = $request->detail;
            $floorPlanRequest->status = 1;
            $floorPlanRequest->save();

            $message = __('Floor plan request success');
            $notify[] = ['success', $message];
            return back()->withNotify($notify);

        } catch (Exception $e){

            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }
    }



    public function auctions(Request $request)
    {
        try {

            $type = $request->type ?? 'all';
            $slug = $request->slug ?? null;

            $data['all'] = Auction::ifNotPending()->count();
            $data['current'] = Auction::current()->count();
            $data['upcoming'] = Auction::upcoming()->count();
            $data['finished'] = Auction::finished()->count();
            $data['cities'] = getCities();

            $data['routes'] = [
                'auctions' => 'auctions',
                'map' => 'auctions.maps'
            ];

            $query = Auction::query();

            $category = null;

            if ($slug) {
                $category = AuctionCategory::where('slug', $slug)->firstOrFail();
                $query->where('category_id', $category->id);
                $data['category'] = $category;
            }

            if ($type == 'current') {
                $data['type'] = $type;
                $query = $query->current();
            } elseif ($type == 'upcoming') {
                $data['type'] = $type;
                $query = $query->upcoming();
            } elseif ($type == 'finished') {
                $data['type'] = $type;
                $query = $query->finished();
            } elseif ($type == 'all') {
                $data['type'] = $type;
            }

            if ($request->filled('title')) {
                $data['type'] = $type;
                $title = $request->input('title');
                $query = $query->where(function ($q) use ($title) {
                    $q->where('title', 'like', "%$title%")
                        ->orWhere('title_ar', 'like', "%$title%");
                });
            }

            if ($request->filled('city_id') && $request->input('city_id') != 0) {
                $data['type'] = $type;
                $data['city_id'] = $request->input('city_id');
                $query = $query->where('city_id', $request->input('city_id'));
            }

            if ($request->filled('country_id') && $request->input('country_id') != 0) {
                $data['type'] = $type;
                $data['country_id'] = $request->input('country_id');
                $query = $query->where('country_id', $request->input('country_id'));
            }

            $query->ifNotPending();

            $data['auctions'] = $query->paginate(10);

            $data['categories'] = AuctionCategory::where('status', 1)->get();

            $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
            $countries = sortOrder($o_countries);
            $data['countries'] = $countries;

            return view('web.pages.auctions', $data);

        } catch (Exception $e) {
            return back();
        }
    }

    public function auctionCategory()
    {
        $categories = AuctionCategory::with(['auctions' => function ($q) {
            $q->latest()->limit(6);
        }])->get();

        return view('web.pages.auction_category', compact('categories'));
    }

    public function auctionDetails(Request $request, $slug)
    {
        try {
            $minutes = 30;

            $type = $request->type ?? 'about';

            if($type != 'about' && $type != 'item'){
                $type = 'about';
            }

            $auction = Auction::with('create_by', 'properties.property.biddings', 'images', 'country', 'city')
                ->where('slug', $slug)
                ->first();



            $title = app()->getLocale() == 'en' ? $auction->title : $auction->title_ar;

            $view = "web.pages.auction_details_".$type;

            return view($view, compact('title', 'type', 'auction' ));
        } catch(Exception $e){
            return back();
        }
    }

    public function auctionMap(Request $request, $id = null)
    {

        try {
            $type = $request->type ?? 'all';
            $getCityLatLng = [];
            $property_items = [];

            $cities = getCities();

            $all = Auction::ifNotPending()->count();
            $current = Auction::current()->count();
            $upcoming = Auction::upcoming()->count();
            $finished = Auction::finished()->count();

            $auction = null;

            if($id){
                $auction = Auction::find($id);
                $city = getCity($auction->city_id);
                $getCityLatLng['lat'] = $city->lat;
                $getCityLatLng['lng'] = $city->lng;
                $getCityLatLng['title'] = app()->getLocale() == 'en' ? $city->name : $city->name_ar;

                $properties = $auction->properties;

                foreach($properties as $item){
                    $property_items[] = [
                        'id'     => $item->property->id,
                        'slug'   => $item->property->slug,
                        'lat'    => $item->property->latitude,
                        'lng'    => $item->property->longitude,
                        'title'  => app()->getLocale() == 'en' ? $item->property->title : $item->property->title_ar,
                    ];
                }

                $navbar = 'web.pages.includes.__auction_nav_detail';

                $routes = [
                    'auctions' => 'auctions',
                    'map'      => 'auctions.maps'
                ];

            }else{
                $getCountry = getCountry();
                $city = City::where('country_id', $getCountry->id)->first();
                $getCityLatLng['lat'] = $city->lat;
                $getCityLatLng['lng'] = $city->lng;
                $getCityLatLng['title'] = app()->getLocale() == 'en' ? $city->name : $city->name_ar;

                $query = Auction::query();

                if($type == 'current'){
                    $data['type']  = $type;
                    $query = $query->current();
                }

                if($type == 'upcoming'){
                    $data['type']  = $type;
                    $query = $query->upcoming();
                }

                if($type == 'finished'){
                    $data['type']  = $type;
                    $query = $query->finished();
                }

                if($type == 'all'){
                    $data['type']  = $type;
                }

                $auctions = $query->ifNotPending()->get();

                foreach($auctions as $item){
                    $property_items[] = [
                        'id'  => $item->id,
                        'slug' => $item->slug,
                        'lat' => $item->latitude,
                        'lng' => $item->longitude,
                        'title' => app()->getLocale() == 'en' ? $item->title : $item->title_ar,
                    ];
                }

                $navbar = 'web.pages.includes.__auction_nav';
                $routes = [
                    'auctions' => 'auctions.maps',
                    'map'      => 'auctions.maps'
                ];

            }

            return view('web.pages.auction_maps', compact('auction', 'type', 'getCityLatLng', 'property_items', 'navbar', 'cities', 'all', 'current', 'finished', 'upcoming', 'routes'));

        } catch(Exception $e){
            return back();
        }

    }

    public function fvtStore(Request $request)
    {

        $request->validate( [
            "type"        => "required|string",
            "property_id" => "required"
        ]);

        $type = $request->type;
        $property_id = $request->property_id;
        $message = fvtPost($type, $property_id);

        if($message){
            return response()->json([
                'status' => true,
                'message' => __('User already favorited this type. Existing favorite deleted.')
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => __('Favorite added successfully.')
            ]);
        }
    }

    public function biddingOfferRequest($auction, $property)
    {
        $auctionId = urldecode($auction);
        $propertyId = urldecode($property);


        if (!$auctionId || !$propertyId) {
            return abort(404);
        }

        $auction = DB::table('auctions')->where('id', $auctionId)->first();
        $property = DB::table('properties')->where('id', $propertyId)->first();

        // Prepare the title
        $title = __('Bidding offer to') . ' ' . (app()->getLocale() == 'en' ? $property->title : $property->title_ar);

        // Return the view with necessary data
        return view('sections.auction_bidding_offer', compact('title', 'property', 'auction'));
    }


    public function biddingOfferSend(Request $request)
    {
        $request->validate( [
            "title"        => "required|string|max:191",
            "title_ar"     => "required|string|max:191",
            "property_id"  => "required|exists:properties,id",
            "auction_id"   => "required|exists:auctions,id",
            "amount"       => "required",
        ]);

        $auth_id = auth()->user()->id;

        $auction = DB::table('auctions')->where('id', $request->auction_id)->first();

        $bidding = new Bidding();
        $bidding->title = $request->title;
        $bidding->title_ar = $request->title_ar;
        $bidding->property_id = $request->property_id;
        $bidding->auction_id = $request->auction_id;
        $bidding->user_id = $auth_id;
        $bidding->amount = $request->amount;
        $bidding->status = 1;
        $bidding->save();


        $notify[] = ['success', __('Offer Send Successfully')];
        return redirect()->route('auction.details', ['slug' => $auction->slug, 'type' => 'item'])->withNotify($notify);
    }

    public function propertyRequestPage()
    {
        $requestProperties = PropertyRequest::accepted()->paginate(getPaginate());
        return view('web.pages.property_request_page', compact('requestProperties'));
    }

    public function propertyRequestDettail($id)
    {
        $propertyRequest = PropertyRequest::accepted()->where('id', $id)->first();
        return view('web.pages.request_property_details', compact('propertyRequest'));
    }

    public function events()
    {
        $currents = Event::active()->latest()->take(3)->with('country', 'city', 'category')->get();
        $events = Event::active()->with('country', 'city', 'category')->paginate(getPaginate());
        $event_news = EventNews::active()->latest()->take(4)->get();
        $categories = AllCategory::where('type', 'event')->get();
        $eventTypeElements = getContent('event_type.element', null, false, true);
        $audienceTypeElements = getContent('audience_type.element', null, false, true);
        $eventSectorElements = getContent('event_sector.element', null, false, true);
        return view('web.pages.events', compact('currents', 'events', 'event_news','categories', 'eventTypeElements', 'audienceTypeElements', 'eventSectorElements'));
    }

    public function eventFilter(Request $request)
    {
        $query = Event::query();

        if ($request->category != 0) {
            $query->where('category_id', $request->category);
        }

        if ($request->audience_type != 0) {
            $query->where('audience_type', $request->audience_type);
        }

        if ($request->sector != 0) {
            $query->where('sector', $request->sector);
        }

        if ($request->type != 0) {
            $query->where('type', $request->type);
        }

        $query->active()->with('country', 'city', 'category');

        $events = $query->paginate(getPaginate());

        return view('web.pages.includes.__event_filter', compact('events'))->render();
    }


    public function eventDetails($slug)
    {
        $event = Event::active()->with('country', 'city', 'category')->where('slug', $slug)->first();
        return view('web.pages.event_details', compact('event'));
    }

    public function eventNews()
    {
        $event_news =  EventNews::active()->latest()->paginate(getPaginate());
        return view('web.pages.event_news', compact('event_news'));
    }

    public function eventNewsDetails($slug)
    {
        $event = EventNews::active()->where('slug', $slug)->first();
        $recentPosts = EventNews::active()->latest()->take(4)->get();
        return view('web.pages.event_news_details', compact('event', 'recentPosts'));
    }

    public function eventAskFormSubmit(Request $request)
    {
        $request->validate([
            "event_id"      => "required|exists:events,id",
            "name"          => "required|max:140",
            "phone"         => "required|max:140",
            "email"         => "required|max:140",
            "city"          => "required|max:140",
            "message"       => "required",
        ]);

        try{

            $eventAsk = new EventAsk();

            $eventAsk->event_id = $request->event_id;
            $eventAsk->name = $request->name;
            $eventAsk->phone = $request->phone;
            $eventAsk->email = $request->email;
            $eventAsk->city = $request->city;
            $eventAsk->message = $request->message;
            $eventAsk->save();

            $message = __('Event ask send success');
            $notify[] = ['success', $message];
            return back()->withNotify($notify);

        }catch (Exception $exp){
            $message = __('Something went wrong');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }
    }

    public function getPropertyRequestForm($id)
    {
        if(!$id){
            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }

        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $title = __('Property Request');
        $requestProperty = PropertyRequest::find($id);
        return view('web.request.property_request', compact('countries', 'title', 'requestProperty'));
    }

    public function requestPropertyRequestStore(Request $request, $id)
    {
        if(!$id){
            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }

        $request->validate([
            // "property_request_id" => "nullable",
            // "user_id"      => "nullable",
            "name"          => "required|string|max:255",
            "job_title"     => "required|string|max:255",
            "company"       => "required|string|max:255",
            "email"         => "required|string|email|max:255",
            "mobile"        => "required|string|max:255",
            "sectors"       => "nullable|string|max:255",
            "country_id"    => "required",
            "city_id"       => "nullable",
            "detail"        => "required",
        ]);

        try{
            $propertyRequest = new PropertyFormRequest();
            $propertyRequest->property_request_id = $id;
            $propertyRequest->user_id = auth()->check() ? auth()->user()->id : 0;
            $propertyRequest->name = $request->name;
            $propertyRequest->job_title = $request->job_title;
            $propertyRequest->company = $request->company;
            $propertyRequest->email = $request->email;
            $propertyRequest->mobile = $request->mobile;
            $propertyRequest->sectors = $request->sectors;
            $propertyRequest->country_id = $request->country_id;
            $propertyRequest->city_id = $request->city_id;
            $propertyRequest->detail = $request->detail;
            $propertyRequest->status = 0;
            $propertyRequest->save();

            $message = __('Property request successfully!');
            $notify[] = ['success', $message];
            return back()->withNotify($notify);
        } catch (Exception $e){
            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        } 
    }

    public function getAuctionRequestForm($id)
    {
        if(!$id){
            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }

        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        $title = __('Auction Request');
        $requestAuction = Auction::find($id);
        return view('web.request.auction_request', compact('countries', 'title', 'requestAuction'));
    }

    public function requestAuctionRequestStore(Request $request, $id)
    {
        if(!$id){
            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        }

        $request->validate([
            // "auction_id" => "nullable",
            // "user_id"      => "nullable",
            "name"          => "required|string|max:255",
            "job_title"     => "required|string|max:255",
            "company"       => "required|string|max:255",
            "email"         => "required|string|email|max:255",
            "mobile"        => "required|string|max:255",
            // "sectors"       => "required|string|max:255",
            "country_id"    => "required",
            "city_id"       => "nullable",
            "detail"        => "required",
        ]);

        try{
            
            $propertyRequest = new AuctionFormRequest();
            $propertyRequest->auction_id = $id;
            $propertyRequest->user_id = auth()->check() ? auth()->user()->id : 0;
            $propertyRequest->name = $request->name;
            $propertyRequest->job_title = $request->job_title;
            $propertyRequest->company = $request->company;
            $propertyRequest->email = $request->email;
            $propertyRequest->mobile = $request->mobile;
            // $propertyRequest->sectors = $request->sectors;
            $propertyRequest->country_id = $request->country_id;
            $propertyRequest->city_id = $request->city_id;
            $propertyRequest->detail = $request->detail;
            $propertyRequest->status = 0;
            $propertyRequest->save();

            $message = __('Auction request successfully!');
            $notify[] = ['success', $message];
            return back()->withNotify($notify);

        } catch (Exception $e){

            $message = __('Something went wrong. Please try again');
            $notify[] = ['error', $message];
            return back()->withNotify($notify);
        } 
    }
    
    
    public function aiService()
    {
        $title = __('The electronic lease documentation service is a service that allows the concerned parties (landlord and tenant) to register and document residential or commercial lease contracts electronically. This service aims to facilitate the process and ensure transparency and security for both parties.');
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        return view('web.pages.ai_service', compact('title', 'countries'));
    }

  public function aiServiceStore(Request $request)
    {

        $validated = $request->validate([
            'contract_number' => 'nullable|string',
            'contract_type' => 'nullable|string',
            'contract_sealing_date' => 'nullable|date',
            'contract_sealing_location' => 'nullable|string',
            'tenancy_start_date' => 'nullable|date',
            'tenancy_end_date' => 'nullable|date',
            'landlord_status_representative' => 'nullable|string',
            'landlord_representative_agency' => 'nullable|string',
            'landlord_date_of_birth' => 'nullable|date',
            'landlord_nationality' => 'nullable|string',
            'lessor_id_type' => 'nullable|string',
            'lessor_id_no' => 'nullable|string',
            'lessor_mobile' => 'nullable|string',
            'lessor_email' => 'nullable|email',
            'lessor_region' => 'nullable|string',
            'lessor_city' => 'nullable|string',
            'lessor_street_name' => 'nullable|string',
            'lessor_building_number' => 'nullable|string',
            'lessor_additional_number' => 'nullable|string',
            'lessor_zip_code' => 'nullable|string',
            'lessor_title_deed' => 'nullable|string',
            'lessor_tax_number' => 'nullable|string',
            'lessor_iban' => 'nullable|string',
            'tenant_name' => 'nullable|string',
            'tenant_date_of_birth' => 'nullable|date',
            'tenant_nationality' => 'nullable|string',
            'tenant_id_type' => 'nullable|string',
            'tenant_id_no' => 'nullable|string',
            'tenant_mobile' => 'nullable|string',
            'tenant_email' => 'nullable|email',
            'tenant_region' => 'nullable|string',
            'tenant_city' => 'nullable|string',
            'tenant_street_name' => 'nullable|string',
            'tenant_building_number' => 'nullable|string',
            'tenant_additional_number' => 'nullable|string',
            'tenant_zip_code' => 'nullable|string',
            'tenant_type' => 'nullable|string',
            'tenant_institution_registration_number' => 'nullable|string',
            'tenant_association_contract_number' => 'nullable|string',
            'tenant_family_members' => 'nullable|string',
            'property_national_address' => 'nullable|string',
            'property_type' => 'nullable|string',
            'property_usage' => 'nullable|string',
            'property_number_of_floors' => 'nullable|integer',
            'property_number_of_units' => 'nullable|integer',
            'property_elevator_or_not' => 'nullable|string',
            'property_electricity_meter_number' => 'nullable|string',
            'property_current_meter_reading_or_a_fixed_amount' => 'nullable|string',
            'property_water_meter_number' => 'nullable|string',
            'property_gas_meter_number' => 'nullable|string',
            'property_rent_annual_rental_fees' => 'nullable|string',
        ]);

        AiService::create($validated);

        // Redirect back with success message
        $message = __('Ai service request submitted successfully!');
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
    
    
    public function oportunityFormSubmit(Request $request)
    {
        $request->validate([
            'title'  => 'required|string',
            'sector'  => 'required|string',
            'full_name'  => 'required|string',
            'id_number'  => 'required|string',
            'establishment_name'  => 'required|string',
            'commercial_registration_number'  => 'required|string',
            'mobile_number'  => 'required|string',
            'email'  => 'required|string',
            'opportunity_description'  => 'nullable',
            'property_type' => 'nullable',
            'city' => 'nullable',
            'area' => 'nullable',
            'address' => 'nullable',
            'location_features' => 'nullable',
            'tenant_type' => 'nullable',
            'tenant_capital_construction_value' => 'nullable',
            'selling_price' => 'nullable',
            'income_ratio' => 'nullable',
            'property_nature' => 'nullable',
            'rental_status' => 'nullable'
        ]);
        
        
        $data = new OportunityRequest();
        
      
        $data->title  = $request->title;
        $data->sector  = $request->sector;
        $data->full_name  = $request->full_name;
        $data->id_number  = $request->id_number;
        $data->establishment_name  = $request->establishment_name;
        $data->commercial_registration_number  = $request->commercial_registration_number;
        $data->mobile_number  = $request->mobile_number;
        $data->email  = $request->email;
        $data->opportunity_description  = $request->opportunity_description;
        $data->property_type  = $request->property_type;
        $data->city  = $request->city;
        $data->area  = $request->area;
        $data->address  = $request->address;
        $data->location_features  = $request->location_features;
        $data->tenant_type  = $request->tenant_type;
        $data->tenant_capital_construction_value  = $request->tenant_capital_construction_value;
        $data->selling_price  = $request->selling_price;
        $data->income_ratio  = $request->income_ratio;
        $data->property_nature  = $request->property_nature;
        $data->rental_status  = $request->rental_status;
        $data->save();
        
        $message = __('Oportunity request submitted successfully!');
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }
    
   
    public function foreignOwnership(Request $request)
    {
        $sections = Page::where('slug', 'foreign-ownership')->first();
        $o_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($o_countries);
        return view('web.pages.foreign_ownership', compact('sections', 'countries'));
    }

    public function foreignOwnershipRequestStore(Request $request)
    {
        $request->validate([
            'full_name'          => "required|string|max:255",
            'nationality'        => "required|max:255",
            'email'              => "required|email|string|max:255",
            'phone_number'       => "nullable|string|max:255",
            'purpose_of_the_application'        => "nullable|string|max:255",
            'property_requested_country'       => "nullable|max:255",
            'city'    => "nullable|max:255",
            'type_of_property_required'       => "nullable|max:255",
            'estimated_budget'        => "nullable|max:255",
            'type_of_priority'        => "nullable|max:255",
            'message'        => "nullable",
        ]);

        $foreignOwnership = new ForeignOwnershipRequest();
        $foreignOwnership->full_name = $request->full_name;
        $foreignOwnership->nationality = $request->nationality;
        $foreignOwnership->email = $request->email;
        $foreignOwnership->phone_number = $request->phone_number;
        $foreignOwnership->purpose_of_the_application = $request->purpose_of_the_application;
        $foreignOwnership->property_requested_country = $request->property_requested_country;
        $foreignOwnership->city = $request->city;
        $foreignOwnership->type_of_property_required = $request->type_of_property_required;
        $foreignOwnership->estimated_budget = $request->estimated_budget;
        $foreignOwnership->type_of_priority = $request->type_of_priority;
        $foreignOwnership->message = $request->message;
        $foreignOwnership->save();

        $notify[] = ['success', __('Foreign ownership application submitted successfully!')];

        return back()->withNotify($notify);
    }


    public function facilityServices(Request $request)
    {
        $sections = Page::where('slug', 'facility-services')->first();

        $facilityServices = FacilityService::where('status', 'active')->latest()->get();

        return view('web.pages.facility_services', compact('sections', 'facilityServices'));
    }
}


