@if (session('flash_notification'))
    <div class="row m-b-0 flash-notification">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
    </div>
@endif
