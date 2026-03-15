<!-- Modal -->
<div class="modal fade" id="propertyRequestForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('property.request.send.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ __('Property Request') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="property_id" value="{{ @$property->id }}">
                        <div class="mb-3 col-12">
                            <label for="Name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" id="Name" name="name" value="{{ old('name') }}" class="form-control" a required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"  required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="mobile" class="form-label">{{ __('Mobile number') }}</label>
                            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="jobtitle" class="form-label">{{ __('Job Title') }}</label>
                            <input type="text" id="jobtitle" name="job_title" value="{{ old('job_title') }}" class="form-control" required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="message" class="form-label">{{ __('Message') }}</label>
                            <textarea id="message" name="message" class="form-control" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">@lang('Send Request')</button>
                </div>
            </form>
        </div>
    </div>
</div>
