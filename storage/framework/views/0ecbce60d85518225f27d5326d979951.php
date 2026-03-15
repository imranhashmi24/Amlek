<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-gear"></i>
        </div>
        <div class="menu-title"><?php echo app('translator')->get('Category'); ?></div>
    </a>
    <ul>
        <li>
            <a href="<?php echo e(route('admin.category.index')); ?>?type=EMAIL"><i class="bi bi-circle"></i><?php echo app('translator')->get('Mail Category'); ?></a>
        </li>
        

    </ul>
</li>

<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-chat"></i>
        </div>
        <div class="menu-title"><?php echo app('translator')->get('Contacts'); ?></div>
    </a>
    <ul>
        
        <li>
            <a href="<?php echo e(route('admin.contacts.email.index')); ?>"><i class="bi bi-circle"></i><?php echo app('translator')->get('Email Contacts'); ?></a>
        </li>
    </ul>
</li>



<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-envelope"></i>
        </div>
        <div class="menu-title"><?php echo app('translator')->get('Mailing'); ?></div>
    </a>
    <ul>
        <li>
            <a href="<?php echo e(route('admin.send-mail.index')); ?>"><i class="bi bi-circle"></i><?php echo app('translator')->get('Send Mail'); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.send-mail.group')); ?>"><i class="bi bi-circle"></i><?php echo app('translator')->get('Group Send Mail'); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.send-mail.mail.history')); ?>"><i class="bi bi-circle"></i><?php echo app('translator')->get('Mail History'); ?></a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-gear"></i>
        </div>
        <div class="menu-title"><?php echo app('translator')->get('CRM Config'); ?></div>
    </a>
    <ul>
        
        <li>
            <a href="<?php echo e(route('admin.setting.email')); ?>"><i class="bi bi-circle"></i><?php echo app('translator')->get('Mail Setting'); ?></a>
        </li>
    </ul>
</li>
<?php /**PATH /home/amlaek/public_html/resources/views/admin/partials/mail_sidenav.blade.php ENDPATH**/ ?>