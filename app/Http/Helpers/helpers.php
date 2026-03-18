<?php

use App\Constants\Status;
use App\Lib\Captcha;
use App\Lib\ClientInfo;
use App\Lib\FileManager;
use App\Models\City;
use App\Models\Country;
use App\Models\Extension;
use App\Models\Frontend;
use App\Models\Fvt;
use App\Models\GeneralSetting;
use App\Notify\Notify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

function getIpInfo()
{
    $ipInfo = ClientInfo::ipInfo();
    return $ipInfo;
}

function osBrowser()
{
    $osBrowser = ClientInfo::osBrowser();
    return $osBrowser;
}

function getRealIP()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }
    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}

function gs($key = null)
{
    $general = Cache::get('GeneralSetting');
    if (!$general) {
        $general = GeneralSetting::first();
        Cache::put('GeneralSetting', $general);
    }

    $general = GeneralSetting::first();

    if ($key) {
        return @$general->$key;
    }

    return $general;
}

function appendQuery($key, $value)
{
    return request()->fullUrlWithQuery([$key => $value]);
}

function siteFavicon()
{
    return getImage(getFilePath('logoIcon') . '/favicon.png');
}

function siteLogo($type = null)
{
    $name = $type ? "/logo_$type.png" : '/logo.png';
    return getImage(getFilePath('logoIcon') . $name);
}

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    return asset('assets/images/default.png');
}

function getFilePath($key)
{
    return fileManager()->$key()->path;
}

function fileManager()
{
    return new FileManager();
}

function getFileSize($key)
{
    return fileManager()->$key()->size;
}

function getContent($dataKeys, $singleQuery = false, $limit = null, $orderById = false)
{

    if ($singleQuery) {
        $content = Frontend::where('data_keys', $dataKeys)->orderBy('id', 'desc')->first();
    } else {

        $article = Frontend::when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        if ($orderById) {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id')->get();
        } else {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id', 'desc')->get();
        }
    }
    return $content;
}

function verifyCaptcha()
{
    return Captcha::verify();
}

function notify($user, $templateName, $shortCodes = null, $sendVia = null, $createLog = true)
{
    $general = gs();

    $globalShortCodes = [
        'site_name' => $general->site_name,
        'site_currency' => $general->cur_text,
        'currency_symbol' => $general->cur_sym,
    ];

    if (gettype($user) == 'array') {
        $user = (object) $user;
    }

    $shortCodes = array_merge($shortCodes ?? [], $globalShortCodes);

    $notify = new Notify($sendVia);
    $notify->templateName = $templateName;
    $notify->shortCodes = $shortCodes;
    $notify->user = $user;
    $notify->createLog = $createLog;
    $notify->userColumn = isset($user->id) ? $user->getForeignKey() : 'user_id';
    $notify->send();
}

function verificationCode($length)
{
    if ($length == 0) {
        return 0;
    }

    $min = pow(10, $length - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}

function showEmailAddress($email)
{
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}

function menuActive($routeName)
{
    if ($routeName) {
        $class = 'mm-active';
        if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($routeName)) {
                    return $class;
                }
            }
        } else {
            if (request()->routeIs($routeName)) {
                return $class;
            }
        }
    }
}

function getPaginate($paginate = 20)
{
    return $paginate;
}

function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}
function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
{
    $separator = '';
    if ($separate) {
        $separator = ',';
    }
    $printAmount = number_format($amount, $decimal, '.', $separator);
    if ($exceptZeros) {
        $exp = explode('.', $printAmount);
        if ($exp[1] * 1 == 0) {
            $printAmount = $exp[0];
        } else {
            $printAmount = rtrim($printAmount, '0');
        }
    }
    return $printAmount;
}

function fileUploader($file, $location, $size = null, $old = null, $thumb = null)
{

    $fileManager = new FileManager($file);
    $fileManager->path = $location;
    $fileManager->size = $size;
    $fileManager->old = $old;
    $fileManager->thumb = $thumb;
    $fileManager->upload();
    return $fileManager->filename;
}

function strLimit($title = null, $length = 10)
{
    return Str::limit($title, $length);
}

function keyToTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function getPageSections($arr = false)
{
    $jsonUrl = resource_path('views/') . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }
    return $sections;
}
function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}
function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function loadCustomCaptcha($width = '100%', $height = 46, $bgColor = '#003')
{
    return Captcha::customCaptcha($width, $height, $bgColor);
}

function loadReCaptcha()
{
    return Captcha::reCaptcha();
}

function showMobileNumber($number)
{
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function loadExtension($key)
{
    $extension = Extension::where('act', $key)->where('status', Status::ENABLE)->first();
    return $extension ? $extension->generateScript() : '';
}


if( !function_exists('sortOrder') ){
    function sortOrder($countries){

        $maxSortOrder = $countries->max('sort_order');

        $completeSequence = range(1, $maxSortOrder);

        $mergedSequence = $completeSequence + $countries->pluck('sort_order')->toArray();

        sort($mergedSequence);

        $mergedSequence = array_values($mergedSequence);

        $countries->transform(function ($item, $key) use ($mergedSequence) {
            $item->sort_order = $mergedSequence[$key];
            return $item;
        });

        return $countries;
    }
}

if (!function_exists('getCountry')) {
    function getCountry() {
        $getIpInfo = getIpInfo();

        if (!empty($getIpInfo['country']) && count($getIpInfo['country']) < 0) {
            return Country::where('name', $getIpInfo['country'])->first();
        } else {
            return Country::where('sort_order', 1)->first();
        }
    }
}


if (!function_exists('getCity')) {
    function getCity($id) {
        $city = City::find($id);
        return $city;
    }
}



if (!function_exists('getCities')) {
    function getCities() {
        $country = getCountry();

        if ($country) {
            return City::where('country_id', $country->id)->get(['id', 'name', 'name_ar']);
        }

        return [];
    }
}


if (!function_exists('fvtPost')) {
    function fvtPost($type, $property_id)
    {
        $user_id = auth()->user()->id;

        $existing_fvt = Fvt::where('type', $type)
                            ->where('property_id', $property_id)
                            ->where('user_id', $user_id)
                            ->first();

        if ($existing_fvt) {
            $existing_fvt->delete();
            return false;
        }

        $fvt = new Fvt();
        $fvt->type = $type;
        $fvt->property_id = $property_id;
        $fvt->user_id = $user_id;
        $fvt->save();
        return true;
    }
}




if(!function_exists('getFvtCount')){
    function getFvtCount($type, $property_id){
        $fvt = Fvt::where('type', $type)->where('property_id', $property_id)->count();
        return $fvt;
    }
}

if(!function_exists('findMyFvt')){
    function findMyFvt($type, $property_id){
        $user_id = auth()->user()->id ?? 0;
        $fvt = Fvt::where('type', $type)->where('property_id', $property_id)->where('user_id', $user_id)->first();
        if($fvt){
            return true;
        }else{
            return false;
        }
    }
}



if(!function_exists('filePath')){
    function filePath()
    {
        $path['import'] = [
            'path'=>'assets/import',
        ];

        $path['demo'] = [
            'path'=>'assets/demo/email',
            'path_email'=>'assets/demo/email',
        ];

        return $path;
    }
}

if(!function_exists('download_from_url')){
    function download_from_url(string $url, string $prefix = ''): ?string
    {

        if (! $stream = @fopen($url, 'r')) {
            throw new \Exception('Can not open file from ' . $url);
        }

        $tempFile = tempnam(sys_get_temp_dir(), $prefix);

        if (file_put_contents($tempFile, $stream)) {
            return $tempFile;
        }

        return null;
    }
}


if (!function_exists('deleteFile')) {
    function deleteFile($path)
    {
        try {
            if ($path && file_exists($path)) {
                unlink($path);
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }
}

function fileDeleter($file, $location)
{
    $file = public_path($location . '/' . $file);
    if (file_exists($file)) {
        unlink($file);
    }
}




if (!function_exists('getForm')) {
    function getForm($service_id, $form_model, $form_model_id)
    {

        $forms = [];

        if (!$form_model || !$form_model_id || !$service_id) {
            return $forms;
        }

        $model = "App\Models\\" . $form_model;

        $forms = $model::where($form_model_id, $service_id)->orderBy('position')->get();

        if ($forms->isEmpty()) {
            return $forms;
        }

        return view('frontend.form', compact('forms', 'service_id'));
    }
}


if (!function_exists('base64urlEncode')) {
    function base64urlEncode($string)
    {
        return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
    }
}

if (!function_exists('base64urlDecode')) {
    function base64urlDecode($string)
    {
        return base64_decode(strtr($string, '-_', '+/'));
    }
}

if (!function_exists('requestTypes')) {
    function requestTypes()
    {
        return [
            [
                'model' => 'FacilityService',
                'name' => 'Facility Service Request',
                'name_ar' => 'طلب خدمة',
            ]
        ];
    }
}



/* get full name, email, phone number */

if (!function_exists('getRequestOrderUserInfos')) {
    function getRequestOrderUserInfos($orderInfoJson)
    {
        $orderInfo = json_decode($orderInfoJson, true);
        $full_name = isset($orderInfo['full_name']) ? $orderInfo['full_name'] : (isset($orderInfo['name']) ? $orderInfo['name'] : 'N/A');
        $email = isset($orderInfo['email_address']) ? $orderInfo['email_address'] : (isset($orderInfo['email']) ? $orderInfo['email'] : 'N/A');
        $mobile = isset($orderInfo['mobile_number']) ? $orderInfo['mobile_number'] : (isset($orderInfo['phone']) ? $orderInfo['phone'] : 'N/A');

        return [
            $full_name,
            $mobile,
            $email,
        ];
    }
}


if (!function_exists('storeDefaultForm')) {
    function storeDefaultForm($service_id, $model)
    {
        $forms = [
            [
                "name" => "Full Name",
                "name_ar" => "الاسم الكامل",
                "type" => "text",
                "required" => "yes",
                "placeholder" => "Type Here",
                "placeholder_ar" => "اكتب هنا",
                "options" => [],
                "options_ar" => [],
                "col" => 12,
                "status" => "active"
            ],
            [
                "name" => "Organization / Company",
                "name_ar" => "المؤسسة / الشركة",
                "type" => "text",
                "required" => "yes",
                "placeholder" => "Type Here",
                "placeholder_ar" => "اكتب هنا",
                "options" => [],
                "options_ar" => [],
                "col" => 12,
                "status" => "active"
            ],
            [
                "name" => "Mobile Number",
                "name_ar" => "رقم الجوال",
                "type" => "number",
                "required" => "yes",
                "placeholder" => "Type Here",
                "placeholder_ar" => "اكتب هنا",
                "options" => [],
                "options_ar" => [],
                "col" => 6,
                "status" => "active"
            ],
            [
                "name" => "Email Number",
                "name_ar" => "البريد الإلكتروني",
                "type" => "email",
                "required" => "yes",
                "placeholder" => "Type Here",
                "placeholder_ar" => "اكتب هنا",
                "options" => [],
                "options_ar" => [],
                "col" => 6,
                "status" => "active"
            ],
            [
                "name" => "City",
                "name_ar" => "المدينة",
                "type" => "text",
                "required" => "yes",
                "placeholder" => "Enter City",
                "placeholder_ar" => "اختر المدينة",
                "options" => [],
                "options_ar" => [],
                "col" => 6,
                "status" => "active"
            ],
            [
                "name" => "Quantity Required (per product)",
                "name_ar" => "الكمية المطلوبة (لكل منتج)",
                "type" => "number",
                "required" => "yes",
                "placeholder" => "Type Here",
                "placeholder_ar" => "اكتب هنا",
                "options" => [],
                "options_ar" => [],
                "col" => 6,
                "status" => "active"
            ],
            [
                "name" => "Expected Delivery Date",
                "name_ar" => "تاريخ التسليم المتوقع",
                "type" => "date",
                "required" => "yes",
                "placeholder" => "Select",
                "placeholder_ar" => "اختر",
                "options" => [],
                "options_ar" => [],
                "col" => 12,
                "status" => "active"
            ],
            [
                "name" => "Brief Description",
                "name_ar" => "وصف مختصر",
                "type" => "textarea",
                "required" => "no",
                "placeholder" => "Type Here (up to 200 words)",
                "placeholder_ar" => "اكتب هنا (حتى 200 كلمة)",
                "options" => [],
                "options_ar" => [],
                "col" => 12,
                "status" => "active"
            ],
            [
                "name" => "Attachments (if any)",
                "name_ar" => "مرفقات (إذا وجدت)",
                "type" => "file",
                "required" => "no",
                "placeholder" => "Upload file",
                "placeholder_ar" => "تحميل ملف",
                "options" => [],
                "options_ar" => [],
                "col" => 12,
                "status" => "active"
            ],
            [
                "name" => "Requested Products",
                "name_ar" => "المنتجات المطلوبة",
                "type" => "checkbox",
                "required" => "yes",
                "placeholder" => "",
                "placeholder_ar" => "",
                "options" => [
                    "Standard Uniforms",
                    "High-Visibility Clothing (Hi-Vis)",
                    "Bulletproof Vests",
                    "Weather-Resistant Tactical Boots",
                    "Head Covers (Caps, Light Helmets)",
                    "Raincoats & Harsh Weather Gear"
                ],
                "options_ar" => [
                    "الزي الرسمي القياسي",
                    "ملابس عالية الوضوح",
                    "سترات واقية من الرصاص",
                    "أحذية تكتيكية مقاومة للطقس",
                    "أغطية الرأس (قبعات، خوذات خفيفة)",
                    "معاطف المطر ومعدات الطقس القاسي"
                ],
                "col" => 12,
                "status" => "active"
            ]
        ];

        foreach ($forms as $form) {

            $modelClass = "App\\Models\\" . $model;
            $osform = new $modelClass;

            $osform->service_id = $service_id;
            $osform->name = $form['name'];
            $osform->name_ar = $form['name_ar'];
            $osform->type = $form['type'];
            $osform->required = $form['required'];
            $osform->placeholder = $form['placeholder'] ?? null;
            $osform->placeholder_ar = $form['placeholder_ar'] ?? null;
            $osform->options = $form['options'] ?? [];
            $osform->options_ar = $form['options_ar'] ?? [];

            $osform->col = $form['col'];
            $osform->status = $form['status'];
            $osform->save();
        }
    }
}