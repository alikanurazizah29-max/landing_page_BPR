<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo me-1">
        @include('_partials.macros',["height"=>20])
      </span>
      <span class="app-brand-text demo menu-text fw-semibold ms-2">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu)

    {{-- adding active and open class if child is active --}}

    {{-- menu headers --}}
    @if (isset($menu->menuHeader))
    <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
      $activeClass = null;
      $currentRouteName = Route::currentRouteName();
      $currentPath     = ltrim(request()->path(), '/');
      $menuSlug        = $menu->slug ?? null;

      // Cek aktif via slug (menu JSON)
      if ($menuSlug && $currentRouteName === $menuSlug) {
          $activeClass = 'active';
      }
      // Cek aktif via URL path (menu DB)
      elseif (isset($menu->url) && ltrim($menu->url, '/') === $currentPath) {
          $activeClass = 'active';
      }
      // Cek submenu aktif
      elseif (isset($menu->submenu)) {
        // Via slug
        if ($menuSlug) {
          if (gettype($menuSlug) === 'array') {
            foreach($menuSlug as $slug){
              if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                $activeClass = 'active open';
              }
            }
          } else {
            if (str_contains($currentRouteName, $menuSlug) and strpos($currentRouteName, $menuSlug) === 0) {
              $activeClass = 'active open';
            }
          }
        }
        // Via URL path — cek apakah ada child yang URL-nya cocok
        if (!$activeClass) {
          foreach ($menu->submenu as $child) {
            if (isset($child->url) && ltrim($child->url, '/') === $currentPath) {
              $activeClass = 'active open';
              break;
            }
          }
        }
      }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
        @isset($menu->icon)
        <i class="{{ $menu->icon }}"></i>
        @endisset
        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
        @isset($menu->badge)
        <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}</div>

        @endisset
      </a>

      {{-- submenu --}}
      @isset($menu->submenu)
      @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
      @endisset
    </li>
    @endif
    @endforeach
  </ul>

</aside>
