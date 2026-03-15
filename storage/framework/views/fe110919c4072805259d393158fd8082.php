<?php
    $lang = session()->get('lang') == 'ar' ? 'ar' : 'en';
?>

<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>" <?php if($lang == 'ar'): ?> dir="rtl" <?php endif; ?> itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(__(gs('site_name'))); ?> - <?php echo e(__(@$title ?? '')); ?></title>


    <?php echo $__env->yieldContent("meta_tags"); ?>
    
    <?php echo $__env->yieldPushContent('seo'); ?>
    <!-- Bootstrap CSS -->

    
    <?php if($lang == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.rtl.min.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>" />


    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/main.css')); ?>" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <?php if($lang == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/arabic.css')); ?>" />
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/jssocials.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/select2.min.css')); ?>">

    <?php echo $__env->yieldPushContent('style-lib'); ?>

    <?php echo $__env->yieldPushContent('style'); ?>
    
    <script src="https://cdn.pagesense.io/js/amlaek712/57b4b2dd9c9b4d009bcbfeee27693f15.js"></script>

</head>

<body>
    
    


    <?php echo $__env->yieldContent('panel'); ?>


    <script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/jssocials.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/main.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <script>
        (function($) {
            "use strict";

            $(".langSel").on("click", function() {
                var langCode = $(this).data('lang');
                window.location.href = "<?php echo e(route('home')); ?>/change/" + langCode;
            });

            $('.policy').on('click', function() {
                $.get('<?php echo e(route('cookie.accept')); ?>', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);

            var inputElements = $('[type=text],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input, select, textarea'), function(i, element) {
                var elementType = $(element);
                if (elementType.attr('type') != 'checkbox') {
                    if (element.hasAttribute('required')) {
                        $(element).closest('.form-group').find('label').addClass('required');
                    }
                }

            });

            $(document).ready(function() {
                $('.select2-multiple').select2({
                    tags: true
                });
            });


        })(jQuery);
    </script>
    
 <?php if($lang == 'ar'): ?>
    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?15319';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#39004E",
                "ctaText": "تواصل معنا",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "50",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "تنمية الاملاك",
                "brandSubTitle": "تنمية الاملاك",
                "brandImg": "https://new.amlaek.com/assets/images/logoIcon/logo.png",
                "welcomeText": "",
                "messageText": "",
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "966551175959"
            }
        };
    
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
  <?php else: ?>
   <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?15319';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "50",
                "position": "left"
            },
            "brandSetting": {
                "brandName": "Amlaek ",
                "brandSubTitle": "Amlaek for Real Estate Services ",
                "brandImg": "https://new.amlaek.com/assets/images/logoIcon/logo.png",
                "welcomeText": "",
                "messageText": "",
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "966550217734"
            }
        };
    
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
  
  <?php endif; ?>
  
  
  <script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siq8651fe423762bdbbb7ee71a874a6c1849aef2a89c4f93ea157ec937e74f45b7d" defer></script>
</body>

</html>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/layouts/app.blade.php ENDPATH**/ ?>