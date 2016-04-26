
@if (count($errors) > 0)
    <div class="alert alert-danger">
        @lang('auth.errors_title'):<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:#0B53B4">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif