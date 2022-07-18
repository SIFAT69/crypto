<ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
    <li class="nav-item">
        <a @if(Route::is('dashboard.ads.create.one')) class="nav-link"  style="pointer-events: none;"@else style="pointer-events: none; color: gray" class="nav-link active" class="nav-link active"@endif id="border-top-home-tab" data-toggle="tab" href="#border-top-home" role="tab" aria-controls="border-top-home" aria-selected="true">
          Step 1: Ad Details
        </a>
    </li>
    <li class="nav-item">
        <a @if(Route::is('dashboard.ads.create.two')) class="nav-link"  style="pointer-events: none;"@else style="pointer-events: none; color: gray" class="nav-link active" @endif id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false">
          Step 2: Targeting
        </a>
    </li>
    <li class="nav-item">
        <a @if(Route::is('dashboard.ads.create.three')) class="nav-link" style="pointer-events: none;" @else style="pointer-events: none; color: gray" class="nav-link active" @endif id="border-top-contact-tab" data-toggle="tab" href="#border-top-contact" role="tab" aria-controls="border-top-contact" aria-selected="false">
          Step 3: Payment
        </a>
    </li>
</ul>
