<?php

namespace Database\Seeders;

use App\Models\FacilityService;
use App\Models\FacilityServiceForm;
use App\Models\FacilityServiceList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Maintenance & Operations Services',
                'title_ar' => 'خدمات الصيانة والتشغيل',
                'lists' => [
                    ['title' => 'Electrical and mechanical maintenance', 'title_ar' => 'الصيانة الكهربائية والميكانيكية'],
                    ['title' => 'HVAC system maintenance', 'title_ar' => 'صيانة أنظمة التكييف والتهوية والتبريد (HVAC)'],
                    ['title' => 'Elevator and escalator maintenance', 'title_ar' => 'صيانة المصاعد والسلالم المتحركة'],
                    ['title' => 'Inspection and testing of critical systems (UPS, generators, fire systems)', 'title_ar' => 'فحص واختبار الأنظمة الحيوية (UPS، المولدات، أنظمة الحريق)'],
                    ['title' => 'Periodic safety checks', 'title_ar' => 'اختبارات السلامة الدورية'],
                ],
                'forms' => [
                    [
                        'name' => 'Full Name',
                        'name_ar' => 'الاسم الكامل',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Company / Organization Name',
                        'name_ar' => 'اسم المنشأة / الجهة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'City / Location',
                        'name_ar' => 'المدينة / الموقع',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Mobile Number',
                        'name_ar' => 'رقم الجوال',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Email Address',
                        'name_ar' => 'البريد الإلكتروني',
                        'type' => 'email',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Building Type',
                        'name_ar' => 'نوع المبنى',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Residential', 'Commercial', 'Industrial', 'Other'],
                        'options_ar' => ['سكني', 'تجاري', 'صناعي', 'آخر'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Type of Maintenance Required',
                        'name_ar' => 'نوع الصيانة المطلوبة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Electrical Maintenance', 'Mechanical Maintenance', 'HVAC System Maintenance', 'Elevator / Escalator Maintenance', 'Emergency System Testing'],
                        'options_ar' => ['صيانة كهربائية', 'صيانة ميكانيكية', 'صيانة HVAC', 'صيانة مصاعد', 'فحص أنظمة الطوارئ'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Brief Description of the Issue or Service Needed',
                        'name_ar' => 'وصف مختصر للمشكلة أو الخدمة المطلوبة',
                        'type' => 'textarea',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Preferred Visit Date & Time',
                        'name_ar' => 'تحديد الوقت المناسب للزيارة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 2025-04-10 10:00 AM',
                        'placeholder_ar' => 'مثال: ٢٠٢٥-٠٤-١٠ ١٠:٠٠ صباحاً',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Attachments (Images / Reports, if any)',
                        'name_ar' => 'مرفقات (صور / تقارير – إن وجدت)',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
            [
                'title' => 'Building Management',
                'title_ar' => 'إدارة المباني',
                'lists' => [
                    ['title' => 'Managing vendor and service provider contracts', 'title_ar' => 'إدارة عقود الموردين ومزودي الخدمة'],
                    ['title' => 'Supervising technical and cleaning teams', 'title_ar' => 'الإشراف على فرق العمل الفنية والتنظيف'],
                    ['title' => 'Preparing performance and maintenance reports', 'title_ar' => 'إعداد تقارير الأداء والملاحظات والصيانة الدورية'],
                    ['title' => 'Managing rental units and handling tenant complaints', 'title_ar' => 'إدارة وحدات التأجير ومتابعة شكاوى المستأجرين'],
                    ['title' => 'Scheduling maintenance and technical visits', 'title_ar' => 'جدولة أعمال الصيانة والزيارات الفنية'],
                ],
                'forms' => [
                    [
                        'name' => 'Full Name',
                        'name_ar' => 'الاسم الكامل',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Organization / Property Name',
                        'name_ar' => 'اسم المنشأة / الجهة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Property Type',
                        'name_ar' => 'نوع العقار',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Building', 'Complex', 'Offices', 'Other'],
                        'options_ar' => ['عمارة', 'مجمع', 'مكاتب', 'أخرى'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Geographic Location',
                        'name_ar' => 'الموقع الجغرافي',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Contact Number',
                        'name_ar' => 'رقم التواصل',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Email Address',
                        'name_ar' => 'البريد الإلكتروني',
                        'type' => 'email',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Requested Services',
                        'name_ar' => 'نوع الخدمات المطلوبة',
                        'type' => 'select', // Could be multi-select, but using select for single choice as per structure
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Contract Management', 'Workforce Supervision', 'Performance & Maintenance Reports', 'Tenant Complaint Handling', 'Maintenance Scheduling'],
                        'options_ar' => ['إدارة العقود', 'الإشراف على العمالة', 'إعداد تقارير الأداء', 'إدارة شكاوى المستأجرين', 'جدولة الصيانة'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Preferred Contract Duration',
                        'name_ar' => 'مدة التعاقد المطلوبة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Short-term', 'Long-term'],
                        'options_ar' => ['مؤقت', 'دائم'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Additional Notes',
                        'name_ar' => 'ملاحظات إضافية',
                        'type' => 'textarea',
                        'required' => 'no',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'File Upload (Contracts, Layouts, Photos, etc.)',
                        'name_ar' => 'إرفاق ملفات إن وجدت (عقود، مخططات، صور)',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
            [
                'title' => 'Specialized Cleaning Services',
                'title_ar' => 'خدمات النظافة المتخصصة',
                'lists' => [
                    ['title' => 'Glass and aluminum façade cleaning', 'title_ar' => 'تنظيف الواجهات الزجاجية والألمنيوم'],
                    ['title' => 'Cleaning for hotels and residential complexes', 'title_ar' => 'تنظيف الفنادق والمجمعات السكنية'],
                    ['title' => 'Sanitization of public and private facilities', 'title_ar' => 'تعقيم المنشآت والمرافق العامة والخاصة'],
                    ['title' => 'Water tank cleaning', 'title_ar' => 'تنظيف خزانات المياه'],
                    ['title' => 'Post-construction or event cleaning services', 'title_ar' => 'خدمات تنظيف ما بعد المشاريع أو المناسبات'],
                ],
                'forms' => [
                    [
                        'name' => 'Full Name',
                        'name_ar' => 'الاسم',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Facility / Site Name',
                        'name_ar' => 'اسم الجهة / الموقع',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Facility Type',
                        'name_ar' => 'نوع المنشأة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Residential', 'Commercial', 'Industrial', 'Educational', 'Healthcare'],
                        'options_ar' => ['سكني', 'تجاري', 'صناعي', 'تعليمي', 'صحي'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'City & Exact Location',
                        'name_ar' => 'المدينة والموقع الدقيق',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Mobile Number',
                        'name_ar' => 'رقم الجوال',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Type of Cleaning Required',
                        'name_ar' => 'نوع الخدمة المطلوبة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Facade Cleaning', 'Interior Sanitization', 'Water Tank Cleaning', 'Post-construction/Event Cleaning'],
                        'options_ar' => ['تنظيف واجهات', 'تعقيم داخلي', 'تنظيف خزانات مياه', 'تنظيف بعد مشروع'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Approximate Area (in m²)',
                        'name_ar' => 'المساحة التقريبية',
                        'type' => 'number',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 500',
                        'placeholder_ar' => 'مثال: ٥٠٠',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Preferred Service Date & Time',
                        'name_ar' => 'الوقت المفضل لتنفيذ الخدمة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 2025-04-12 09:00 AM',
                        'placeholder_ar' => 'مثال: ٢٠٢٥-٠٤-١٢ ٠٩:٠٠ صباحاً',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Special Instructions or Notes',
                        'name_ar' => 'ملاحظات إضافية أو تعليمات خاصة',
                        'type' => 'textarea',
                        'required' => 'no',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Upload Any Supporting Files',
                        'name_ar' => 'رفع أي ملفات مساعدة',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
            [
                'title' => 'Landscaping & Green Areas Management',
                'title_ar' => 'إدارة المساحات الخضراء',
                'lists' => [
                    ['title' => 'Landscaping and green area maintenance', 'title_ar' => 'تنسيق الحدائق والمسطحات الخضراء'],
                    ['title' => 'Irrigation system maintenance', 'title_ar' => 'صيانة أنظمة الري والتشجير'],
                    ['title' => 'Supplying indoor and outdoor plants', 'title_ar' => 'توريد النباتات الداخلية والخارجية'],
                    ['title' => 'Cleaning and beautifying walkways and public areas', 'title_ar' => 'تنظيف وتجميل الممرات والساحات'],
                ],
                'forms' => [
                    [
                        'name' => 'Name / Company',
                        'name_ar' => 'الاسم / الشركة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Facility Type & Location',
                        'name_ar' => 'نوع المنشأة والموقع',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Mobile Number',
                        'name_ar' => 'رقم الجوال',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Email Address',
                        'name_ar' => 'البريد الإلكتروني',
                        'type' => 'email',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Service Type',
                        'name_ar' => 'نوع الخدمة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Garden Landscaping', 'Irrigation System Maintenance', 'Plant Supply', 'Walkway Cleaning & Beautification'],
                        'options_ar' => ['تنسيق حدائق', 'صيانة نظام ري', 'توريد نباتات', 'نظافة وتجميل المساحات'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Is it a One-Time or Recurring Service?',
                        'name_ar' => 'هل الخدمة لمرة واحدة أم دورية؟',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['One-Time', 'Recurring'],
                        'options_ar' => ['لمرة واحدة', 'دورية'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Approximate Area (in m²)',
                        'name_ar' => 'المساحة التقريبية بالـ م²',
                        'type' => 'number',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 1000',
                        'placeholder_ar' => 'مثال: ١٠٠٠',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Upload Photos or Layout (if available)',
                        'name_ar' => 'رفع صور أو مخطط إن وجد',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Additional Comments',
                        'name_ar' => 'ملاحظات إضافية',
                        'type' => 'textarea',
                        'required' => 'no',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
            [
                'title' => 'Pest Control',
                'title_ar' => 'مكافحة الآفات',
                'lists' => [
                    ['title' => 'Crawling and flying insect control', 'title_ar' => 'مكافحة الحشرات الزاحفة والطائرة'],
                    ['title' => 'Rodent and mouse control', 'title_ar' => 'مكافحة الفئران والقوارض'],
                    ['title' => 'Preventive solutions and full disinfection', 'title_ar' => 'حلول وقائية وتعقيم شامل'],
                    ['title' => 'Use of approved pesticides and routine treatment', 'title_ar' => 'استخدام مبيدات معتمدة ومعالجة دورية'],
                ],
                'forms' => [
                    [
                        'name' => 'Full Name',
                        'name_ar' => 'الاسم الكامل',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Property Type',
                        'name_ar' => 'نوع العقار',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['House', 'Villa', 'Facility', 'Farm', 'Other'],
                        'options_ar' => ['منزل', 'فيلا', 'منشأة', 'مزرعة', 'أخرى'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'City / District',
                        'name_ar' => 'المدينة / الحي',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Contact Number',
                        'name_ar' => 'رقم التواصل',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Pest Type',
                        'name_ar' => 'نوع الآفة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Crawling Insects', 'Flying Insects', 'Rodents / Mice', 'Full Disinfection'],
                        'options_ar' => ['حشرات زاحفة', 'حشرات طائرة', 'فئران / قوارض', 'تعقيم شامل'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Have You Previously Treated the Property?',
                        'name_ar' => 'هل سبق وتمت المعالجة؟',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Yes', 'No'],
                        'options_ar' => ['نعم', 'لا'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Number of Rooms or Affected Areas',
                        'name_ar' => 'عدد الغرف أو المساحات المتضررة',
                        'type' => 'number',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 5',
                        'placeholder_ar' => 'مثال: ٥',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Preferred Treatment Date',
                        'name_ar' => 'وقت التنفيذ المطلوب',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 2025-04-15',
                        'placeholder_ar' => 'مثال: ٢٠٢٥-٠٤-١٥',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Attach Photos / Files (if available)',
                        'name_ar' => 'رفع صور / ملفات إن وجدت',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
            [
                'title' => 'Support & Auxiliary Services',
                'title_ar' => 'خدمات الدعم والمساندة',
                'lists' => [
                    ['title' => 'Reception and assistance staff', 'title_ar' => 'موظفو استقبال ومساعدة'],
                    ['title' => 'Waste management and internal logistics', 'title_ar' => 'إدارة النفايات والنقل الداخلي'],
                    ['title' => 'Hospitality and hotel-style cleaning services', 'title_ar' => 'خدمات الضيافة والنظافة الفندقية'],
                    ['title' => 'Fire safety and emergency equipment maintenance', 'title_ar' => 'صيانة أجهزة الإطفاء والطوارئ'],
                    ['title' => 'Incident reporting and task scheduling via smart systems', 'title_ar' => 'إدارة البلاغات وجدولة المهام عبر الأنظمة الذكية'],
                ],
                'forms' => [
                    [
                        'name' => 'Client / Company Name',
                        'name_ar' => 'اسم العميل / المنشأة',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Mobile Number',
                        'name_ar' => 'رقم الجوال',
                        'type' => 'tel',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Email Address',
                        'name_ar' => 'البريد الإلكتروني',
                        'type' => 'email',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'City / Location',
                        'name_ar' => 'المدينة / الموقع',
                        'type' => 'text',
                        'required' => 'yes',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Requested Service Type',
                        'name_ar' => 'نوع الخدمة المطلوبة',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Reception & Assistance Staff', 'Waste Management', 'Hospitality & Cleaning Services', 'Emergency System Maintenance', 'Smart System Ticket Management'],
                        'options_ar' => ['موظفو استقبال', 'إدارة النفايات', 'خدمات ضيافة', 'صيانة أجهزة الطوارئ', 'إدارة بلاغات إلكترونية'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Service Period',
                        'name_ar' => 'فترة التغطية',
                        'type' => 'select',
                        'required' => 'yes',
                        'placeholder' => 'Select',
                        'placeholder_ar' => 'اختر',
                        'options' => ['Daily', 'Weekly', 'Monthly'],
                        'options_ar' => ['يومية', 'أسبوعية', 'شهرية'],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Number of Personnel or Units Needed',
                        'name_ar' => 'عدد الأفراد أو الوحدات المطلوبة',
                        'type' => 'number',
                        'required' => 'yes',
                        'placeholder' => 'e.g., 3',
                        'placeholder_ar' => 'مثال: ٣',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Operational Notes',
                        'name_ar' => 'ملاحظات تشغيلية',
                        'type' => 'textarea',
                        'required' => 'no',
                        'placeholder' => 'Type Here',
                        'placeholder_ar' => 'اكتب هنا',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                    [
                        'name' => 'Upload Files or Additional Information',
                        'name_ar' => 'إرفاق ملفات أو تفاصيل دعم إضافية',
                        'type' => 'file',
                        'required' => 'no',
                        'placeholder' => 'Upload',
                        'placeholder_ar' => 'رفع',
                        'options' => [],
                        'options_ar' => [],
                        'col' => 12,
                        'status' => 'active'
                    ],
                ]
            ],
        ];



        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        FacilityService::truncate();
        FacilityServiceList::truncate();
        FacilityServiceForm::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



        foreach ($datas as $data) {

            $service = new FacilityService();

            $service->title = $data['title'];
            $service->title_ar = $data['title_ar'];
            $service->save();

            // list 

            foreach ($data['lists'] as $list) {

                $oslist = new FacilityServiceList();

                $oslist->service_id = $service->id;
                $oslist->title = $list['title'];
                $oslist->title_ar = $list['title_ar'];
                $oslist->save();
            }



            foreach ($data['forms'] as $form) {

                $osform = new FacilityServiceForm();

                $osform->service_id = $service->id;
                $osform->name = $form['name'];
                $osform->name_ar = $form['name_ar'];
                $osform->type = $form['type'];
                $osform->required = $form['required'];
                $osform->placeholder = $form['placeholder'] ?? null;
                $osform->placeholder_ar = $form['placeholder_ar'] ?? null;
                $osform->options = isset($form['options']) ? json_encode($form['options']) : null ?? [];
                $osform->options_ar = isset($form['options_ar']) ? json_encode($form['options_ar']) : null ?? [];

                $osform->col = $form['col'];
                $osform->status = $form['status'];
                $osform->save();
            }
        }
    }
}
