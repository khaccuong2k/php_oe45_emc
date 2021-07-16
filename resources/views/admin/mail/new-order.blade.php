<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">@lang('lable.app.search.from')</th>
            <th scope="col">@lang('lable.email')</th>
            <th scope="col">@lang('lable.quantity')</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">{{ $data['user'] }}</td>
            <td scope="row">{{ $data['email'] }}</td>
            <td scope="row">{{ $data['quantity'] }}</td>
        </tr>
    </tbody>
</table>
