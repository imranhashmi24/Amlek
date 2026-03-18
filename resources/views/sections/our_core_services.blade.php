<section class="core-services py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Left Images -->
            <div class="col-lg-6">
                <div class="image-grid">

                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab" class="img-fluid big-img"
                        alt="">

                    <div class="small-imgs d-flex gap-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab" class="img-fluid"
                            alt="">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab" class="img-fluid"
                            alt="">
                    </div>

                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">@lang('Our Core Services')</h2>

                <!-- Service 1 -->
                <div class="service-item d-flex mb-4">
                    <div class="icon-box bg-warning-subtle text-warning">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold">@lang('Property Management')</h6>
                        <p class="text-muted small mb-0">
                            @lang('Managing properties and rental units, collecting dues, contract documentation, and maintenance follow-up.')
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-item d-flex mb-4">
                    <div class="icon-box bg-danger-subtle text-danger">
                        <i class="bi bi-building"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold">@lang('Facility Management & Maintenance')</h6>
                        <p class="text-muted small mb-0">
                            @lang('Operating buildings and facilities professionally including maintenance, cleaning, landscaping, and support.')
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-item d-flex">
                    <div class="icon-box bg-info-subtle text-info">
                        <i class="bi bi-hammer"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold">@lang('Auction Organization')</h6>
                        <p class="text-muted small">
                            @lang('Offering investment opportunities through trusted online auctions covering:')
                        </p>

                        <ul class="service-list">
                            <li>@lang('Real estate (lands, villas, buildings)')</li>
                            <li>@lang('Cars and trucks')</li>
                            <li>@lang('Antiques and collectibles')</li>
                            <li>@lang('Livestock and animals')</li>
                            <li>@lang('Agricultural products')</li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@push('style')
    <style>
        .core-services {
            background: linear-gradient(to right, #f8f9fb, #eef3f8);
        }

        .image-grid .big-img {
            border-radius: 15px;
            height: 280px;
            object-fit: cover;
            width: 100%;
        }

        .small-imgs img {
            border-radius: 12px;
            height: 120px;
            width: 100%;
            object-fit: cover;
        }

        .service-item {
            align-items: flex-start;
            gap: 15px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .service-list {
            padding-left: 20px;
            margin-bottom: 0;
        }

        .service-list li {
            font-size: 14px;
            margin-bottom: 6px;
            list-style: none;
            position: relative;
            padding-left: 20px;
        }

        .service-list li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #0d6efd;
        }
    </style>
@endpush
