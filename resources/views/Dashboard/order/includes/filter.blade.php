<div class="card-tools">
    <form action="{{ route('order.index') }}" method="get">

        <div class="input-group input-group-m" style="width: 400px;">
            <select class="custom-select rounded-0" style="width:150px;" name="payment_method">
                <option value="">@lang('site.payment_method')</option>
                <option value="cash" {{ request('payment_method')=='cash' ? 'selected' : '' }}>@lang('site.cash')</option>
                <option value="cash" {{ request('payment_method')=='stripe' ? 'selected' : '' }}>@lang('site.stripe')</option>
            </select>
            <select class="custom-select rounded-0" style="width:150px;" name="payment_status">
                <option value="">@lang('site.payment_status')</option>
                <option value="waiting" {{ request('payment_status')=='waiting' ? 'selected' : '' }}>@lang('site.waiting')</option>
                <option value="failed" {{ request('payment_status')=='failed' ? 'selected' : '' }}>@lang('site.failed')</option>
                <option value="success" {{ request('payment_status')=='success' ? 'selected' : '' }}>@lang('site.success')</option>
            </select>
            <select class="custom-select rounded-0" style="width:150px;" name="status">
                <option value="">@lang('site.status')</option>
                <option value="processing" {{ request('status')=='processing' ? 'selected' : '' }}>@lang('site.new')</option>
                <option value="processing" {{ request('status')=='processing' ? 'selected' : '' }}>@lang('site.processing')</option>
                <option value="shipped" {{ request('status')=='shipped' ? 'selected' : '' }}>@lang('site.shipped')</option>
                <option value="delivered" {{ request('status')=='delivered' ? 'selected' : '' }}>@lang('site.delivered')</option>
            </select>


            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
