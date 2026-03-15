<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <div>
                <img src="<?php echo e(siteLogo()); ?>" alt="" style="width:60%">
            </div>
        </div>
        <div class="toggle-icon ms-auto">
            <i class="bi bi-list"></i>
        </div>
    </div>
    <ul class="metismenu sidebar__menu-main" id="menu">
        <li class="sidebar--menu <?php echo e(menuActive('admin.dashboard')); ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>">
                <div class="parent-icon"><i class="bi bi-speedometer2"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></div>
            </a>
        </li>
        <li class="menu-label"><?php echo app('translator')->get('Properties'); ?></li>
        <li
            class="sidebar--menu <?php echo e(menuActive(['admin.property.type.index', 'admin.property.type.create', 'admin.property.type.edit'])); ?>">
            <a href="<?php echo e(route('admin.property.type.index')); ?>">
                <div class="parent-icon"><i class="bi bi-list"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Property Type'); ?></div>
            </a>
        </li>

        <li
            class="sidebar--menu <?php echo e(menuActive(['admin.sub.property.type.index', 'admin.sub.property.type.create', 'admin.sub.property.type.edit'])); ?>">
            <a href="<?php echo e(route('admin.sub.property.type.index')); ?>">
                <div class="parent-icon"><i class="bi bi-list"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Sub Property Type'); ?></div>
            </a>
        </li>

        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.country*', 'admin.city*', 'admin.property.type.area*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Area'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.country*')); ?>">
                    <a href="<?php echo e(route('admin.country.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Countries'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.city*')); ?>">
                    <a href="<?php echo e(route('admin.city.index')); ?>"><i class="bi bi-record-circle"></i><?php echo app('translator')->get('Cities'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.property.type.area*')); ?>">
                    <a href="<?php echo e(route('admin.property.type.area.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Property Type Areas'); ?></a>
                </li>
            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.properties*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Properties'); ?></div>
                <?php if($pendingPropertyCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.properties.index')); ?>">
                    <a href="<?php echo e(route('admin.properties.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Property'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.properties.pending')); ?>">
                    <a href="<?php echo e(route('admin.properties.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Property'); ?>
                        <?php if($pendingPropertyCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.properties.published')); ?>">
                    <a href="<?php echo e(route('admin.properties.published')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Published Property'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.properties.review')); ?>">
                    <a href="<?php echo e(route('admin.properties.review')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Review Property'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.properties.rejected')); ?>">
                    <a href="<?php echo e(route('admin.properties.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Property'); ?></a>
                </li>

            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Business Post'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.businesscategory.index')); ?>">
                    <a href="<?php echo e(route('admin.businesscategory.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Business Category'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.businesstype.index')); ?>">
                    <a href="<?php echo e(route('admin.businesstype.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Business Type'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.businesspost.index')); ?>">
                    <a href="<?php echo e(route('admin.businesspost.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Business Post'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.business.request*')); ?>">
                    <a href="<?php echo e(route('admin.business.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Business Request'); ?></a>
                </li>

            </ul>
        </li>

        <li class="sidebar--menu <?php echo e(menuActive('admin.promotion.request*')); ?>">
            <a href="<?php echo e(route('admin.promotion.request.index')); ?>">
                <div class="parent-icon"><i class="bi bi-box2-heart"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Promotion Request'); ?></div>
            </a>
        </li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.asset.liability.request.*')); ?>">
            <a href="<?php echo e(route('admin.asset.liability.request.index')); ?>">
                <div class="parent-icon"><i class="bi bi-cassette"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Assets liability Request'); ?></div>
            </a>
        </li>


        <li class="menu-label"><?php echo app('translator')->get('Auctions'); ?></li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.auction*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Auctions'); ?></div>
                <span class="red__notify"></span>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.auction.index')); ?>">
                    <a href="<?php echo e(route('admin.auction.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Auction'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.auction.pending')); ?>">
                    <a href="<?php echo e(route('admin.auction.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Auction'); ?>

                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.auction.finished')); ?>">
                    <a href="<?php echo e(route('admin.auction.finished')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Finished Auction'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.auction.current')); ?>">
                    <a href="<?php echo e(route('admin.auction.current')); ?>"><i
                        class="bi bi-record-circle"></i><?php echo app('translator')->get('Current Auction'); ?>
                        <span class="red__notify"></span>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.auction.upcoming')); ?>">
                    <a href="<?php echo e(route('admin.auction.upcoming')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Upcoming Auction'); ?></a>
                </li>

            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Events'); ?></li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.all_category*')); ?>">
            <a href="<?php echo e(route('admin.all_category.index')); ?>">
                <div class="parent-icon"><i class="bi bi-cassette"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Category'); ?></div>
            </a>
        </li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.events*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Events'); ?></div>
                <span class="red__notify"></span>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.events.index')); ?>">
                    <a href="<?php echo e(route('admin.events.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Events'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.events.published')); ?>">
                    <a href="<?php echo e(route('admin.events.published')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Published Events'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.events.pending')); ?>">
                    <a href="<?php echo e(route('admin.events.pending')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Events'); ?></a>
                </li>
            </ul>
        </li>


        <li class="sidebar--menu <?php echo e(menuActive('admin.event_news*')); ?>">
            <a href="<?php echo e(route('admin.event_news.index')); ?>">
                <div class="parent-icon"><i class="bi bi-cassette"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Event News'); ?></div>
            </a>
        </li>

        <li class="sidebar--menu <?php echo e(menuActive('admin.event_ask*')); ?>">
            <a href="<?php echo e(route('admin.event_ask.index')); ?>">
                <div class="parent-icon"><i class="bi bi-cassette"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Event Ask'); ?></div>
            </a>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('REQUESTS'); ?></li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.property.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-check"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Property Request'); ?></div>
                <?php if($pendingPropertyRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.property.request.index')); ?>">
                    <a href="<?php echo e(route('admin.property.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.property.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.property.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingPropertyRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.property.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.property.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.property.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.property.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.property-request.send*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-app"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Send Request'); ?></div>
                <?php if($pendingPropertyRequestSendCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.property-request.send.index')); ?>">
                    <a href="<?php echo e(route('admin.property-request.send.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.property-request.send.pending')); ?>">
                    <a href="<?php echo e(route('admin.property-request.send.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingPropertyRequestSendCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.property-request.send.accepted')); ?>">
                    <a href="<?php echo e(route('admin.property-request.send.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.property-request.send.rejected')); ?>">
                    <a href="<?php echo e(route('admin.property-request.send.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.service.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-building-fill-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Service Request'); ?></div>
                <?php if($pendingServiceRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.service.request.index')); ?>">
                    <a href="<?php echo e(route('admin.service.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.service.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.service.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingServiceRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.service.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.service.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.service.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.service.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.service.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-app"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Social Request'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.social.service.request.index')); ?>">
                    <a href="<?php echo e(route('admin.social.service.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.social.service.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.social.service.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingServiceRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.social.service.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.social.service.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.social.service.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.social.service.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>



        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.finance.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-cash-coin"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Finance Request'); ?></div>
                <?php if($pendingFinanceRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.finance.request*')); ?>">
                    <a href="<?php echo e(route('admin.finance.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.finance.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.finance.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingFinanceRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.finance.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.finance.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.finance.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.finance.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.marketing.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Marketing Request'); ?></div>
                <?php if($pendingMarketingRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.marketing.request.index')); ?>">
                    <a href="<?php echo e(route('admin.marketing.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.marketing.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.marketing.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingMarketingRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.marketing.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.marketing.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.marketing.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.marketing.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>
        
        
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.auction.request*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Auction Request'); ?></div>
                <?php if($pendingMarketingRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.auction.request.index')); ?>">
                    <a href="<?php echo e(route('admin.auction.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.auction.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.auction.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingMarketingRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.marketing.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.auction.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.auction.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.auction.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.property.form.request.*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Property Form Request'); ?></div>
                <?php if($pendingMarketingRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.property.form.request.index')); ?>">
                    <a href="<?php echo e(route('admin.property.form.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.property.form.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.property.form.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingMarketingRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.property.form.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.property.form.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.property.form.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.property.form.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>
        
         <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.floor_plan.form.request.*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Floor Plan Request'); ?></div>
                <?php if($pendingMarketingRequestCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.floor_plan.form.request.index')); ?>">
                    <a href="<?php echo e(route('admin.floor_plan.form.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.floor_plan.form.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.floor_plan.form.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                        <?php if($pendingMarketingRequestCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.floor_plan.form.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.floor_plan.form.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.floor_plan.form.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.floor_plan.form.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>

            </ul>
        </li>
        
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.ai_service.form.request.*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Ai Service'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.ai_service.form.request.index')); ?>">
                    <a href="<?php echo e(route('admin.ai_service.form.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.ai_service.form.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.ai_service.form.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.ai_service.form.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.ai_service.form.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.ai_service.form.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.ai_service.form.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>
            </ul>
        </li>
        
        
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.oportunity.form.request.*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Oportunity Request'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.oportunity.form.request.index')); ?>">
                    <a href="<?php echo e(route('admin.oportunity.form.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.oportunity.form.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.oportunity.form.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.oportunity.form.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.oportunity.form.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.oportunity.form.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.oportunity.form.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>
            </ul>
        </li>
        
        
         <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.foreign.form.request.*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Foreign Service'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.foreign.form.request.index')); ?>">
                    <a href="<?php echo e(route('admin.foreign.form.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Request'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.foreign.form.request.pending')); ?>">
                    <a href="<?php echo e(route('admin.foreign.form.request.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Request'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.foreign.form.request.accepted')); ?>">
                    <a href="<?php echo e(route('admin.foreign.form.request.accepted')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Accepted Request'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.foreign.form.request.rejected')); ?>">
                    <a href="<?php echo e(route('admin.foreign.form.request.rejected')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Rejected Request'); ?></a>
                </li>
            </ul>
        </li>





        <li class="menu-label"><?php echo app('translator')->get('General Setting'); ?></li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.users*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Users'); ?></div>
                <?php if($emailUnverifiedUsersCount || $mobileUnverifiedUsersCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.users.active')); ?>">
                    <a href="<?php echo e(route('admin.users.active')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Active Users'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.users.banned')); ?>">
                    <a href="<?php echo e(route('admin.users.banned')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Banned Users'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.users.unverified')); ?>">
                    <a href="<?php echo e(route('admin.users.email.unverified')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Email Unverified'); ?>
                        <?php if($emailUnverifiedUsersCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>

                </li>
                <li class="<?php echo e(menuActive('admin.users.unverified')); ?>">
                    <a href="<?php echo e(route('admin.users.mobile.unverified')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Mobile Unverified'); ?>
                        <?php if($mobileUnverifiedUsersCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>

                </li>
                <li class="<?php echo e(menuActive('admin.users.all')); ?>">
                    <a href="<?php echo e(route('admin.users.all')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Users'); ?></a>
                </li>
                
            </ul>
        </li>



        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.report*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Report'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.report.login.history')); ?>">
                    <a href="<?php echo e(route('admin.report.login.history')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Login History'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.report.notification.history')); ?>">
                    <a href="<?php echo e(route('admin.report.notification.history')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Notification History'); ?></a>
                </li>
            </ul>
        </li>


        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.setting.index', 'admin.setting.system*', 'admin.setting.cookie', 'admin.setting.logo.icon', 'admin.extensions', 'admin.language*', 'admin.seo', 'admin.maintenance.mode'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Settings'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive(['admin.setting.index'])); ?>">
                    <a href="<?php echo e(route('admin.setting.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('General Setting'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.system.configuration')); ?>">
                    <a href="<?php echo e(route('admin.setting.system.configuration')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('System Configuration'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.logo.icon')); ?>">
                    <a href="<?php echo e(route('admin.setting.logo.icon')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Logo & Favicon'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.extensions.index')); ?>">
                    <a href="<?php echo e(route('admin.extensions.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Extensions'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.language.manage')); ?>">
                    <a href="<?php echo e(route('admin.language.manage')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Language'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.seo')); ?>">
                    <a href="<?php echo e(route('admin.seo')); ?>"><i class="bi bi-record-circle"></i><?php echo app('translator')->get('SEO Manager'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.maintenance.mode')); ?>">
                    <a href="<?php echo e(route('admin.maintenance.mode')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Maintenance Mode'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.cookie')); ?>">
                    <a href="<?php echo e(route('admin.setting.cookie')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('GDPR Cookie'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.custom.css')); ?>">
                    <a href="<?php echo e(route('admin.setting.custom.css')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Custom CSS'); ?></a>
                </li>
            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.setting.notification*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Notification Setting'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.setting.notification.global')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.global')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Global Template'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.email')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.email')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Email Setting'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.sms')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.sms')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('SMS Setting'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.templates')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.templates')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Notification Templates'); ?></a>
                </li>
            </ul>
        </li>


        <li class="menu-label"><?php echo app('translator')->get('CRM'); ?></li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.setting.notification*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('CRM Setting'); ?></div>
            </a>
            <ul>
                <?php echo $__env->make('admin.partials.mail_sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.support*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-chat-right-dots"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Customer Support'); ?></div>
                <?php if($pendingSupportCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.support.pending')); ?>">
                    <a href="<?php echo e(route('admin.support.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Support'); ?>
                        <?php if($pendingSupportCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.closed')); ?>">
                    <a href="<?php echo e(route('admin.support.closed')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Closed Support'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.answered')); ?>">
                    <a href="<?php echo e(route('admin.support.answered')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Answered Support'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.index')); ?>">
                    <a href="<?php echo e(route('admin.support.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Support'); ?></a>
                </li>
            </ul>
        </li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.subscriber*')); ?>">
            <a href="<?php echo e(route('admin.subscriber.index')); ?>">
                <div class="parent-icon"><i class="bi bi-bell-slash"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Subscribers'); ?></div>
            </a>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Blog'); ?></li>

        <li class="sidebar--menu sidebar--dropdown">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Blog Section'); ?></div>
            </a>
            <ul>
                <li class="">
                    <a href="<?php echo e(route('admin.blog.category.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo e(__('Blog Category')); ?>

                    </a>
                </li>
                <li class="">
                    <a href="<?php echo e(route('admin.blog.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo e(__('Blog')); ?>

                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Pages & Section'); ?></li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.frontend.manage.pages*')); ?>">
            <a href="<?php echo e(route('admin.frontend.manage.pages')); ?>">
                <div class="parent-icon"><i class="bi bi-file-earmark"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Pages'); ?></div>
            </a>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.frontend.sections*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Section'); ?></div>
            </a>
            <ul>
                <?php
                    $lastSegment = collect(request()->segments())->last();
                ?>
                <?php $__currentLoopData = getPageSections(true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($secs['builder']): ?>
                        <li class="<?php echo e($lastSegment == $k ? 'mm-active' : ''); ?>">
                            <a href="<?php echo e(route('admin.frontend.sections', $k)); ?>">
                                <i class="bi bi-record-circle"></i><?php echo e(__($secs['name'])); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    </ul>
</aside>
<?php /**PATH /home/amlaek/public_html/resources/views/admin/partials/sidenav.blade.php ENDPATH**/ ?>