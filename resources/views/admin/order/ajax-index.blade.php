<div class="tab-pane fade show active" id="home2" role="tabpanel">
    <!-- multiple select row Datatable start -->
    <div class="card-box mb-30">
        <div class="pb-20">
            <table class="table hover nowrap">
                <thead>
                    <tr>
                        <th>@lang('lable.user_order')</th>
                        <th>@lang('lable.type_payment')</th>
                        <th>@lang('lable.detail', ['name' => 'Order'])</th>
                        <th>@lang('lable.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        @if ($order->status === config('app.status_confirm'))
                        <tr>
                            <td class="table-plus">{{ $order->user->fullname }}</td>
                            <td>
                                @if ($order->type_payment === config('app.payment_on_delivery'))
                                @lang('lable.payment_on_delivery')
                                @else
                                @lang('lable.payment_online')
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                    @lang('lable.detail', ['name' => 'Order'])
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('orders.change-status', $order->id)}}" data-id="{{ $order->id }}" class="btn btn-outline-primary change-status">
                                    @lang('lable.go_to_order')
                                </a>
                            </td>
                        </tr>
                        @endif
                    @empty
                    <tr>
                        <td class="table-plus text-center" colspan="2">
                            @lang('lable.no_have_value')
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
</div>
<div class="tab-pane fade" id="profile2" role="tabpanel">
    <!-- multiple select row Datatable start -->
    <div class="card-box mb-30">
        <div class="pb-20">
            <table class="table hover nowrap">
                <thead>
                    <tr>
                        <th>@lang('lable.user_order')</th>
                        <th>@lang('lable.detail', ['name' => 'Order'])</th>
                        <th>@lang('lable.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        @if ($order->status === config('app.status_delivery'))
                        <tr>
                            <td class="table-plus">{{ $order->user->fullname }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                    @lang('lable.detail', ['name' => 'Order'])
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('orders.change-status', $order->id)}}" data-id="{{ $order->id }}" class="btn btn-outline-primary change-status">
                                    @lang('lable.go_to_delivery')
                                </a>
                            </td>
                        </tr>
                        @endif
                    @empty
                    <tr>
                        <td class="table-plus text-align" colspan="2">
                            @lang('lable.no_have_value')
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
</div>
<div class="tab-pane fade" id="contact2" role="tabpanel">
    <div class="card-box mb-30">
        <div class="pb-20">
            <table class="table hover nowrap">
                <thead>
                    <tr>
                        <th>@lang('lable.user_order')</th>
                        <th>@lang('lable.detail', ['name' => 'Order'])</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        @if ($order->status === config('app.status_done'))
                            <tr>
                                <td class="table-plus">{{ $order->user->fullname }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                        @lang('lable.detail', ['name' => 'Order'])
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @empty
                    <tr>
                        <td class="table-plus text-align" colspan="2">
                            @lang('lable.no_have_value')
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
