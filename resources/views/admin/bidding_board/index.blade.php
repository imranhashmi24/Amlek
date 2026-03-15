@extends('admin.layouts.app', ['title' => $title])

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @forelse ($auction->properties as $auction)
                            <div class="mb-4 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <strong>@lang('Project'):</strong> <a href="{{ route('admin.properties.show', $auction->property->id) }}">
                                                    {{ app()->getLocale() == 'en' ? $auction->property->title : $auction->property->title_ar }}
                                                </a>
                                            </div>
                                            <div class="col-md-2">
                                                <p><strong>@lang('Participants'):</strong> <span class="badge bg-primary">{{ optional($auction->property->biddings)->count('user_id') }}</span></p>
                                            </div>

                                            <div class="col-md-2">
                                                <p><strong>@lang('Entry Amount'):</strong> {{ $auction->property->price }}</p>
                                            </div>

                                            <div class="col-md-2">
                                                <p><strong>@lang('Bidding Amount'):</strong> {{ optional($auction->property->biddings)->max('amount') }}</p>
                                            </div>

                                            <div class="col-md-1">
                                                <div data-bs-toggle="collapse" data-bs-target="#item_{{ $auction->id }}" class="item_{{ $auction->id }}" aria-expanded="false" aria-controls="item_{{ $auction->id }}">
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="my-2 collapse" id="item_{{ $auction->id }}">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive--md table-responsive">
                                                        <table class="table">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>@lang('User')</th>
                                                                    <th>@lang('Time')</th>
                                                                    <th>@lang('Entry Amount')</th>
                                                                    <th>@lang('Bit Amount')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($auction->property->biddings->sortByDesc('amount') as $bid)
                                                                    <tr>
                                                                        <td><a href="#">{{ @$bid->user->name }}</a></td>
                                                                        <td><small>{{ showDateTime($bid->created_at, 'd M Y H:i:s A') }}</small></td>
                                                                        <td><span class="badge bg-primary">{{ $auction->property->price }}</span></td>
                                                                        <td><span class="badge bg-primary">{{ $bid->amount }}</span></td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}</td>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table><!-- table end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const items = document.querySelectorAll('.item_{{ $auction->id }}');
                                    items.forEach(item => {
                                        const icon = item.querySelector('i');
                                        item.addEventListener('click', function () {
                                            if (icon.classList.contains('fa-angle-up')) {
                                                icon.classList.remove('fa-angle-up');
                                                icon.classList.add('fa-angle-down');
                                            } else {
                                                icon.classList.remove('fa-angle-down');
                                                icon.classList.add('fa-angle-up');
                                            }
                                        });
                                    });
                                });
                            </script>
                        @empty
                            <div class="col-md-12">
                                <p class="text-center text-muted">{{ __($emptyMessage) }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')

@endpush

@push('style')
<style>
    .collapse {
        width: 100%;
    }

</style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('[class^="item"]');
            items.forEach(function (item) {
                const icon = item.querySelector('i');
                item.addEventListener('click', function () {
                    if (icon.classList.contains('fa-angle-up')) {
                        icon.classList.remove('fa-angle-up');
                        icon.classList.add('fa-angle-down');
                    } else {
                        icon.classList.remove('fa-angle-down');
                        icon.classList.add('fa-angle-up');
                    }
                });
            });
        });
    </script>
@endpush
