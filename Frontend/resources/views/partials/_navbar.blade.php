@if (auth()->check())
<header class="header-area bg-white">
      <div class="header-wrapper d-flex align-items-center justify-content-between position-relative">
         <button type="button" class="sidebar-toggle-btn d-inline-flex align-items-center gap-3 bg-transparent border-0 position-absolute top-50 translate-middle-y start-0 fw-bold">
            <span class="btn-icon"><i class="fa-regular fa-bars"></i></span>
            <span class="btn-text">Menu</span>
         </button>
         <a href="#" class="logo d-inline-block mx-auto"><img src="assets/img/logo.svg" alt="logo"></a>
         <div class="header-profle d-flex align-items-center position-absolute top-50 translate-middle-y end-0 z-1">
            <div class="header-profle-wrapper d-flex align-items-center">
               <div class="profile-pic d-flex align-items-center justify-content-center fw-bold rounded-circle">PB</div>
               <div class="profile-desc">
                  <p class="mb-0">Welcome </p>
                  <p class="mb-0">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
               </div>
            </div>
            <a href="{{route('logout')}}" class="profile-logout d-inline-block"><img src="assets/img/icon/arrow-right.svg" alt="arrow right"></a>
         </div>   
      </div>
   </header>
@else
<header class="header-area bg-white">
      <div class="header-wrapper d-flex align-items-center justify-content-between">
         <a href="#" class="logo d-inline-block"><img src="{{ asset('assets/img/logo.svg')}}" alt="logo"></a>
         <a href="#" class="header-btn theme-btn d-inline-block fw-bold">Back to Home Page</a>
      </div>
   </header>
   @endif  