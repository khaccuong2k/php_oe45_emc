@if (session()->has('success'))
    <div class="alert alert-success">
        <ul>
            <li> @lang(session()->get('success') ) </li>
        </ul>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            <li> @lang( session()->get('error') ) </li>
        </ul>
    </div>
@endif
