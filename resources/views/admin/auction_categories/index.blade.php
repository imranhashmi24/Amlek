@extends('admin.layouts.app', ['title' => 'Categories'])
@section('panel')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive--md table-responsive">
						<table class="table">
							<thead class="table-light">
								<tr>
									<th>@lang('Image')</th>
									<th>@lang('Name')</th>
									<th> @lang('Name') (@lang('Arabic'))</th>
									<th>@lang('Status')</th>
									<th>@lang('Action')</th>
								</tr>
							</thead>
							<tbody>
								@forelse($auctionCategories as $category)
									<tr>
										<td>
											<img style="width: 50px; height: 50px;"
												src="{{ getImage(getFilePath('all_category') . '/' . $category->image, getFileSize('all_category')) }}"
												alt="Image" class="img-fluid">
										</td>
										<td> {{ $category->name }} </td>
										<td> {{ $category->name_ar }} </td>
										<td>
											@if ($category->status === 1)
												<span class="badge bg-success">@lang('Active')</span>
											@else
												<span class="badge bg-warning">@lang('Inactive')</span>
											@endif
										</td>
										<td>
											<div class="btn-group">
												<button data-bs-toggle="dropdown">
													<i class="fa-solid fa-ellipsis-vertical"></i>
												</button>
												<ul class="dropdown-menu dropdown-menu-end">
													<li>
														<a href="{{ route('admin.auction-category.edit', $category->id) }}">
															<i class="bi bi-pencil"></i>@lang('Edit')
														</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
								@empty
									<tr>
										<td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}</td>
									</tr>
								@endforelse

							</tbody>
						</table>
					</div>
				</div>
				@if ($auctionCategories->hasPages())
					<div class="card-footer pagination-card-footer">
						{{ paginateLinks($auctionCategories) }}
					</div>
				@endif
			</div>
		</div>

	</div>
@endsection

@push('breadcrumb-plugins')
	<div class="flex-wrap gap-3 d-flex">
		<x-search-form placeholder="Search" />
		<a href="{{ route('admin.auction-category.create') }}" class="btn btn-primary"> <i
				class="fa-solid fa-plus"></i>@lang('Add New')</a>
	</div>
@endpush
