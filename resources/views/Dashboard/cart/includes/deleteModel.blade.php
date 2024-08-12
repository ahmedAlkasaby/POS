<form action="{{ route('client.cart.destroy',['cart'=>$cart->id,'client'=>$client->id]) }}" method="post">
    @csrf
    @method('delete')
<div class="modal fade" id="modal-default" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('site.are_you_sure_from_delete')</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
