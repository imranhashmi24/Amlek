<aside class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<div>
				<img src="{{ siteLogo() }}" alt="" style="width:60%">
			</div>
		</div>
		<div class="toggle-icon ms-auto">
			<i class="bi bi-list"></i>
		</div>
	</div>
	<ul class="metismenu sidebar__menu-main" id="menu">
		<li class="sidebar--menu {{ menuActive('admin.dashboard') }}">
			<a href="{{ route('admin.dashboard') }}">
				<div class="parent-icon"><i class="bi bi-speedometer2"></i>
				</div>
				<div class="menu-title">@lang('Dashboard')</div>
			</a>
		</li>
		<li class="menu-label">@lang('Properties')</li>
		<li
			class="sidebar--menu {{ menuActive(['admin.property.type.index', 'admin.property.type.create', 'admin.property.type.edit']) }}">
			<a href="{{ route('admin.property.type.index') }}">
				<div class="parent-icon"><i class="bi bi-list"></i>
				</div>
				<div class="menu-title">@lang('Property Type')</div>
			</a>
		</li>

		<li
			class="sidebar--menu {{ menuActive(['admin.sub.property.type.index', 'admin.sub.property.type.create', 'admin.sub.property.type.edit']) }}">
			<a href="{{ route('admin.sub.property.type.index') }}">
				<div class="parent-icon"><i class="bi bi-list"></i>
				</div>
				<div class="menu-title">@lang('Sub Property Type')</div>
			</a>
		</li>

		<li
			class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.country*', 'admin.city*', 'admin.property.type.area*']) }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
				</div>
				<div class="menu-title">@lang('Manage Area')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.country*') }}">
					<a href="{{ route('admin.country.index') }}"><i class="bi bi-record-circle"></i>@lang('Countries')</a>
				</li>
				<li class="{{ menuActive('admin.city*') }}">
					<a href="{{ route('admin.city.index') }}"><i class="bi bi-record-circle"></i>@lang('Cities')</a>
				</li>
				<li class="{{ menuActive('admin.property.type.area*') }}">
					<a href="{{ route('admin.property.type.area.index') }}"><i class="bi bi-record-circle"></i>@lang('Property Type Areas')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.properties*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-gear"></i>
				</div>
				<div class="menu-title">@lang('Manage Properties')</div>
				@if ($pendingPropertyCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.properties.index') }}">
					<a href="{{ route('admin.properties.index') }}"><i class="bi bi-record-circle"></i>@lang('All Property')</a>
				</li>
				<li class="{{ menuActive('admin.properties.pending') }}">
					<a href="{{ route('admin.properties.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Property')
						@if ($pendingPropertyCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.properties.published') }}">
					<a href="{{ route('admin.properties.published') }}"><i class="bi bi-record-circle"></i>@lang('Published Property')</a>
				</li>
				<li class="{{ menuActive('admin.properties.review') }}">
					<a href="{{ route('admin.properties.review') }}"><i class="bi bi-record-circle"></i>@lang('Review Property')</a>
				</li>
				<li class="{{ menuActive('admin.properties.rejected') }}">
					<a href="{{ route('admin.properties.rejected') }}"><i class="bi bi-record-circle"></i>@lang('Rejected Property')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-gear"></i>
				</div>
				<div class="menu-title">@lang('Manage Business Post')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.businesscategory.index') }}">
					<a href="{{ route('admin.businesscategory.index') }}">
						<i class="bi bi-record-circle"></i>@lang('Business Category')
					</a>
				</li>
				<li class="{{ menuActive('admin.businesstype.index') }}">
					<a href="{{ route('admin.businesstype.index') }}"><i class="bi bi-record-circle"></i>@lang('Business Type')</a>
				</li>
				<li class="{{ menuActive('admin.businesspost.index') }}">
					<a href="{{ route('admin.businesspost.index') }}"><i class="bi bi-record-circle"></i>@lang('Business Post')</a>
				</li>
				<li class="{{ menuActive('admin.business.request*') }}">
					<a href="{{ route('admin.business.request.index') }}"><i class="bi bi-record-circle"></i>@lang('Business Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu {{ menuActive('admin.promotion.request*') }}">
			<a href="{{ route('admin.promotion.request.index') }}">
				<div class="parent-icon"><i class="bi bi-box2-heart"></i>
				</div>
				<div class="menu-title">@lang('Promotion Request')</div>
			</a>
		</li>
		<li class="sidebar--menu {{ menuActive('admin.asset.liability.request.*') }}">
			<a href="{{ route('admin.asset.liability.request.index') }}">
				<div class="parent-icon"><i class="bi bi-cassette"></i>
				</div>
				<div class="menu-title">@lang('Assets liability Request')</div>
			</a>
		</li>

		<li class="menu-label">@lang('Auctions')</li>
		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.auction-category*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-gear"></i>
				</div>
				<div class="menu-title">@lang('Categories')</div>
				<span class="red__notify"></span>
			</a>
			<ul>
				<li class="{{ menuActive('admin.auction-category.index') }}">
					<a href="{{ route('admin.auction-category.index') }}"><i class="bi bi-record-circle"></i>@lang('Categories')</a>
				</li>

				<li class="{{ menuActive('admin.auction-category.create') }}">
					<a href="{{ route('admin.auction-category.create') }}"><i class="bi bi-record-circle"></i>@lang('Add Category')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.auction*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-gear"></i>
				</div>
				<div class="menu-title">@lang('Auctions')</div>
				<span class="red__notify"></span>
			</a>
			<ul>

				<li class="{{ menuActive('admin.auction.index') }}">
					<a href="{{ route('admin.auction.index') }}"><i class="bi bi-record-circle"></i>@lang('All Auction')</a>
				</li>

				<li class="{{ menuActive('admin.auction.pending') }}">
					<a href="{{ route('admin.auction.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Auction')

					</a>
				</li>

				<li class="{{ menuActive('admin.auction.finished') }}">
					<a href="{{ route('admin.auction.finished') }}"><i class="bi bi-record-circle"></i>@lang('Finished Auction')</a>
				</li>

				<li class="{{ menuActive('admin.auction.current') }}">
					<a href="{{ route('admin.auction.current') }}"><i class="bi bi-record-circle"></i>@lang('Current Auction')
						<span class="red__notify"></span>
					</a>
				</li>

				<li class="{{ menuActive('admin.auction.upcoming') }}">
					<a href="{{ route('admin.auction.upcoming') }}"><i class="bi bi-record-circle"></i>@lang('Upcoming Auction')</a>
				</li>

			</ul>
		</li>

		<li class="menu-label">@lang('Events')</li>
		<li class="sidebar--menu {{ menuActive('admin.all_category*') }}">
			<a href="{{ route('admin.all_category.index') }}">
				<div class="parent-icon"><i class="bi bi-cassette"></i>
				</div>
				<div class="menu-title">@lang('Category')</div>
			</a>
		</li>
		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.events*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-gear"></i>
				</div>
				<div class="menu-title">@lang('Manage Events')</div>
				<span class="red__notify"></span>
			</a>
			<ul>
				<li class="{{ menuActive('admin.events.index') }}">
					<a href="{{ route('admin.events.index') }}"><i class="bi bi-record-circle"></i>@lang('All Events')</a>
				</li>
				<li class="{{ menuActive('admin.events.published') }}">
					<a href="{{ route('admin.events.published') }}">
						<i class="bi bi-record-circle"></i>@lang('Published Events')
					</a>
				</li>
				<li class="{{ menuActive('admin.events.pending') }}">
					<a href="{{ route('admin.events.pending') }}"><i class="bi bi-record-circle"></i>@lang('Pending Events')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu {{ menuActive('admin.event_news*') }}">
			<a href="{{ route('admin.event_news.index') }}">
				<div class="parent-icon"><i class="bi bi-cassette"></i>
				</div>
				<div class="menu-title">@lang('Event News')</div>
			</a>
		</li>

		<li class="sidebar--menu {{ menuActive('admin.event_ask*') }}">
			<a href="{{ route('admin.event_ask.index') }}">
				<div class="parent-icon"><i class="bi bi-cassette"></i>
				</div>
				<div class="menu-title">@lang('Event Ask')</div>
			</a>
		</li>

		<li class="menu-label">@lang('REQUESTS')</li>
		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.property.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-house-check"></i>
				</div>
				<div class="menu-title">@lang('Property Request')</div>
				@if ($pendingPropertyRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.property.request.index') }}">
					<a href="{{ route('admin.property.request.index') }}"><i class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.property.request.pending') }}">
					<a href="{{ route('admin.property.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingPropertyRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.property.request.accepted') }}">
					<a href="{{ route('admin.property.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.property.request.rejected') }}">
					<a href="{{ route('admin.property.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.property-request.send*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-app"></i>
				</div>
				<div class="menu-title">@lang('Send Request')</div>
				@if ($pendingPropertyRequestSendCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.property-request.send.index') }}">
					<a href="{{ route('admin.property-request.send.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.property-request.send.pending') }}">
					<a href="{{ route('admin.property-request.send.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingPropertyRequestSendCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.property-request.send.accepted') }}">
					<a href="{{ route('admin.property-request.send.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.property-request.send.rejected') }}">
					<a href="{{ route('admin.property-request.send.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.service.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-building-fill-gear"></i>
				</div>
				<div class="menu-title">@lang('Service Request')</div>
				@if ($pendingServiceRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.service.request.index') }}">
					<a href="{{ route('admin.service.request.index') }}"><i class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.service.request.pending') }}">
					<a href="{{ route('admin.service.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingServiceRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.service.request.accepted') }}">
					<a href="{{ route('admin.service.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.service.request.rejected') }}">
					<a href="{{ route('admin.service.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.service.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-app"></i>
				</div>
				<div class="menu-title">@lang('Social Request')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.social.service.request.index') }}">
					<a href="{{ route('admin.social.service.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.social.service.request.pending') }}">
					<a href="{{ route('admin.social.service.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingServiceRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.social.service.request.accepted') }}">
					<a href="{{ route('admin.social.service.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.social.service.request.rejected') }}">
					<a href="{{ route('admin.social.service.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.finance.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-cash-coin"></i>
				</div>
				<div class="menu-title">@lang('Finance Request')</div>
				@if ($pendingFinanceRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.finance.request*') }}">
					<a href="{{ route('admin.finance.request.index') }}"><i class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.finance.request.pending') }}">
					<a href="{{ route('admin.finance.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingFinanceRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.finance.request.accepted') }}">
					<a href="{{ route('admin.finance.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.finance.request.rejected') }}">
					<a href="{{ route('admin.finance.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.marketing.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Marketing Request')</div>
				@if ($pendingMarketingRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.marketing.request.index') }}">
					<a href="{{ route('admin.marketing.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.marketing.request.pending') }}">
					<a href="{{ route('admin.marketing.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingMarketingRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.marketing.request.accepted') }}">
					<a href="{{ route('admin.marketing.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.marketing.request.rejected') }}">
					<a href="{{ route('admin.marketing.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.auction.request*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Auction Request')</div>
				@if ($pendingMarketingRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.auction.request.index') }}">
					<a href="{{ route('admin.auction.request.index') }}"><i class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.auction.request.pending') }}">
					<a href="{{ route('admin.auction.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingMarketingRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.marketing.request.accepted') }}">
					<a href="{{ route('admin.auction.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.auction.request.rejected') }}">
					<a href="{{ route('admin.auction.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.property.form.request.*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Property Form Request')</div>
				@if ($pendingMarketingRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.property.form.request.index') }}">
					<a href="{{ route('admin.property.form.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.property.form.request.pending') }}">
					<a href="{{ route('admin.property.form.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingMarketingRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.property.form.request.accepted') }}">
					<a href="{{ route('admin.property.form.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.property.form.request.rejected') }}">
					<a href="{{ route('admin.property.form.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.floor_plan.form.request.*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Floor Plan Request')</div>
				@if ($pendingMarketingRequestCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.floor_plan.form.request.index') }}">
					<a href="{{ route('admin.floor_plan.form.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.floor_plan.form.request.pending') }}">
					<a href="{{ route('admin.floor_plan.form.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
						@if ($pendingMarketingRequestCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.floor_plan.form.request.accepted') }}">
					<a href="{{ route('admin.floor_plan.form.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.floor_plan.form.request.rejected') }}">
					<a href="{{ route('admin.floor_plan.form.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>

			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.ai_service.form.request.*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Ai Service')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.ai_service.form.request.index') }}">
					<a href="{{ route('admin.ai_service.form.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.ai_service.form.request.pending') }}">
					<a href="{{ route('admin.ai_service.form.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
					</a>
				</li>
				<li class="{{ menuActive('admin.ai_service.form.request.accepted') }}">
					<a href="{{ route('admin.ai_service.form.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.ai_service.form.request.rejected') }}">
					<a href="{{ route('admin.ai_service.form.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.oportunity.form.request.*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Oportunity Request')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.oportunity.form.request.index') }}">
					<a href="{{ route('admin.oportunity.form.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.oportunity.form.request.pending') }}">
					<a href="{{ route('admin.oportunity.form.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
					</a>
				</li>
				<li class="{{ menuActive('admin.oportunity.form.request.accepted') }}">
					<a href="{{ route('admin.oportunity.form.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.oportunity.form.request.rejected') }}">
					<a href="{{ route('admin.oportunity.form.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.foreign.form.request.*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
				</div>
				<div class="menu-title">@lang('Foreign Service')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.foreign.form.request.index') }}">
					<a href="{{ route('admin.foreign.form.request.index') }}"><i
							class="bi bi-record-circle"></i>@lang('All Request')</a>
				</li>
				<li class="{{ menuActive('admin.foreign.form.request.pending') }}">
					<a href="{{ route('admin.foreign.form.request.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Request')
					</a>
				</li>
				<li class="{{ menuActive('admin.foreign.form.request.accepted') }}">
					<a href="{{ route('admin.foreign.form.request.accepted') }}"><i
							class="bi bi-record-circle"></i>@lang('Accepted Request')</a>
				</li>

				<li class="{{ menuActive('admin.foreign.form.request.rejected') }}">
					<a href="{{ route('admin.foreign.form.request.rejected') }}"><i
							class="bi bi-record-circle"></i>@lang('Rejected Request')</a>
				</li>
			</ul>
		</li>

		<li class="menu-label">@lang('General Setting')</li>
		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.users*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-people"></i>
				</div>
				<div class="menu-title">@lang('Manage Users')</div>
				@if ($emailUnverifiedUsersCount || $mobileUnverifiedUsersCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.users.active') }}">
					<a href="{{ route('admin.users.active') }}"><i class="bi bi-record-circle"></i>@lang('Active Users')</a>
				</li>
				<li class="{{ menuActive('admin.users.banned') }}">
					<a href="{{ route('admin.users.banned') }}"><i class="bi bi-record-circle"></i>@lang('Banned Users')</a>
				</li>
				<li class="{{ menuActive('admin.users.unverified') }}">
					<a href="{{ route('admin.users.email.unverified') }}"><i class="bi bi-record-circle"></i>@lang('Email Unverified')
						@if ($emailUnverifiedUsersCount)
							<span class="red__notify"></span>
						@endif
					</a>

				</li>
				<li class="{{ menuActive('admin.users.unverified') }}">
					<a href="{{ route('admin.users.mobile.unverified') }}">
						<i class="bi bi-record-circle"></i>@lang('Mobile Unverified')
						@if ($mobileUnverifiedUsersCount)
							<span class="red__notify"></span>
						@endif
					</a>

				</li>
				<li class="{{ menuActive('admin.users.all') }}">
					<a href="{{ route('admin.users.all') }}"><i class="bi bi-record-circle"></i>@lang('All Users')</a>
				</li>
				{{-- <li> <a href="{{ route('admin.users.notification.all') }}"><i
                            class="bi bi-record-circle"></i>@lang('Notification to All')</a></li> --}}
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.report*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-file-earmark-bar-graph"></i>
				</div>
				<div class="menu-title">@lang('Report')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.report.login.history') }}">
					<a href="{{ route('admin.report.login.history') }}"><i class="bi bi-record-circle"></i>@lang('Login History')</a>
				</li>
				<li class="{{ menuActive('admin.report.notification.history') }}">
					<a href="{{ route('admin.report.notification.history') }}"><i
							class="bi bi-record-circle"></i>@lang('Notification History')</a>
				</li>
			</ul>
		</li>

		<li
			class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.setting.index', 'admin.setting.system*', 'admin.setting.cookie', 'admin.setting.logo.icon', 'admin.extensions', 'admin.language*', 'admin.seo', 'admin.maintenance.mode']) }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-gear"></i>
				</div>
				<div class="menu-title">@lang('Settings')</div>
			</a>
			<ul>
				<li class="{{ menuActive(['admin.setting.index']) }}">
					<a href="{{ route('admin.setting.index') }}">
						<i class="bi bi-record-circle"></i>@lang('General Setting')
					</a>
				</li>
				<li class="{{ menuActive('admin.setting.system.configuration') }}">
					<a href="{{ route('admin.setting.system.configuration') }}">
						<i class="bi bi-record-circle"></i>@lang('System Configuration')
					</a>
				</li>
				<li class="{{ menuActive('admin.setting.logo.icon') }}">
					<a href="{{ route('admin.setting.logo.icon') }}">
						<i class="bi bi-record-circle"></i>@lang('Logo & Favicon')</a>
				</li>
				<li class="{{ menuActive('admin.extensions.index') }}">
					<a href="{{ route('admin.extensions.index') }}"><i class="bi bi-record-circle"></i>@lang('Extensions')</a>
				</li>
				<li class="{{ menuActive('admin.language.manage') }}">
					<a href="{{ route('admin.language.manage') }}"><i class="bi bi-record-circle"></i>@lang('Language')</a>
				</li>
				<li class="{{ menuActive('admin.seo') }}">
					<a href="{{ route('admin.seo') }}"><i class="bi bi-record-circle"></i>@lang('SEO Manager')</a>
				</li>

				<li class="{{ menuActive('admin.maintenance.mode') }}">
					<a href="{{ route('admin.maintenance.mode') }}"><i class="bi bi-record-circle"></i>@lang('Maintenance Mode')</a>
				</li>
				<li class="{{ menuActive('admin.setting.cookie') }}">
					<a href="{{ route('admin.setting.cookie') }}"><i class="bi bi-record-circle"></i>@lang('GDPR Cookie')</a>
				</li>
				<li class="{{ menuActive('admin.setting.custom.css') }}">
					<a href="{{ route('admin.setting.custom.css') }}"><i class="bi bi-record-circle"></i>@lang('Custom CSS')</a>
				</li>
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.setting.notification*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bell"></i>
				</div>
				<div class="menu-title">@lang('Notification Setting')</div>
			</a>
			<ul>
				<li class="{{ menuActive('admin.setting.notification.global') }}">
					<a href="{{ route('admin.setting.notification.global') }}"><i
							class="bi bi-record-circle"></i>@lang('Global Template')</a>
				</li>
				<li class="{{ menuActive('admin.setting.notification.email') }}">
					<a href="{{ route('admin.setting.notification.email') }}"><i
							class="bi bi-record-circle"></i>@lang('Email Setting')</a>
				</li>
				<li class="{{ menuActive('admin.setting.notification.sms') }}">
					<a href="{{ route('admin.setting.notification.sms') }}"><i
							class="bi bi-record-circle"></i>@lang('SMS Setting')</a>
				</li>
				<li class="{{ menuActive('admin.setting.notification.templates') }}">
					<a href="{{ route('admin.setting.notification.templates') }}"><i
							class="bi bi-record-circle"></i>@lang('Notification Templates')</a>
				</li>
			</ul>
		</li>

		<li class="menu-label">@lang('CRM')</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.setting.notification*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bell"></i>
				</div>
				<div class="menu-title">@lang('CRM Setting')</div>
			</a>
			<ul>
				@include('admin.partials.mail_sidenav')
			</ul>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.support*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-chat-right-dots"></i>
				</div>
				<div class="menu-title">@lang('Customer Support')</div>
				@if ($pendingSupportCount)
					<span class="red__notify"></span>
				@endif
			</a>
			<ul>
				<li class="{{ menuActive('admin.support.pending') }}">
					<a href="{{ route('admin.support.pending') }}">
						<i class="bi bi-record-circle"></i>@lang('Pending Support')
						@if ($pendingSupportCount)
							<span class="red__notify"></span>
						@endif
					</a>
				</li>
				<li class="{{ menuActive('admin.support.closed') }}">
					<a href="{{ route('admin.support.closed') }}"><i class="bi bi-record-circle"></i>@lang('Closed Support')</a>
				</li>
				<li class="{{ menuActive('admin.support.answered') }}">
					<a href="{{ route('admin.support.answered') }}"><i class="bi bi-record-circle"></i>@lang('Answered Support')</a>
				</li>
				<li class="{{ menuActive('admin.support.index') }}">
					<a href="{{ route('admin.support.index') }}"><i class="bi bi-record-circle"></i>@lang('All Support')</a>
				</li>
			</ul>
		</li>
		<li class="sidebar--menu {{ menuActive('admin.subscriber*') }}">
			<a href="{{ route('admin.subscriber.index') }}">
				<div class="parent-icon"><i class="bi bi-bell-slash"></i>
				</div>
				<div class="menu-title">@lang('Subscribers')</div>
			</a>
		</li>

		<li class="menu-label">@lang('Blog')</li>

		<li class="sidebar--menu sidebar--dropdown">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bookshelf"></i>
				</div>
				<div class="menu-title">@lang('Blog Section')</div>
			</a>
			<ul>
				<li class="">
					<a href="{{ route('admin.blog.category.index') }}">
						<i class="bi bi-record-circle"></i>{{ __('Blog Category') }}
					</a>
				</li>
				<li class="">
					<a href="{{ route('admin.blog.index') }}">
						<i class="bi bi-record-circle"></i>{{ __('Blog') }}
					</a>
				</li>
			</ul>
		</li>

		<li class="menu-label">@lang('Pages & Section')</li>
		<li class="sidebar--menu {{ menuActive('admin.frontend.manage.pages*') }}">
			<a href="{{ route('admin.frontend.manage.pages') }}">
				<div class="parent-icon"><i class="bi bi-file-earmark"></i>
				</div>
				<div class="menu-title">@lang('Manage Pages')</div>
			</a>
		</li>

		<li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.frontend.sections*') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bi bi-bookshelf"></i>
				</div>
				<div class="menu-title">@lang('Manage Section')</div>
			</a>
			<ul>
				@php
					$lastSegment = collect(request()->segments())->last();
				@endphp
				@foreach (getPageSections(true) as $k => $secs)
					@if ($secs['builder'])
						<li class="{{ $lastSegment == $k ? 'mm-active' : '' }}">
							<a href="{{ route('admin.frontend.sections', $k) }}">
								<i class="bi bi-record-circle"></i>{{ __($secs['name']) }}
							</a>
						</li>
					@endif
				@endforeach
			</ul>
		</li>
	</ul>
</aside>
