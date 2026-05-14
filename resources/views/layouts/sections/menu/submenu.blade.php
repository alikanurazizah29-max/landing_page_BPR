<ul class="menu-sub">
  @if (isset($menu))
    @foreach ($menu as $submenu)

    {{-- active menu method --}}
    @php
      $activeClass = null;
      $active = 'active open';
      $currentRouteName = Route::currentRouteName();
      $currentPath  = ltrim(request()->path(), '/');
      $submenuSlug  = $submenu->slug ?? null;

      // Cek aktif via slug (menu JSON)
      if ($submenuSlug && $currentRouteName === $submenuSlug) {
          $activeClass = 'active';
      }
      // Cek aktif via URL path (menu DB)
      elseif (isset($submenu->url) && ltrim($submenu->url, '/') === $currentPath) {
          $activeClass = 'active';
      }
      // Cek nested submenu
      elseif (isset($submenu->submenu) && $submenuSlug) {
        if (gettype($submenuSlug) === 'array') {
          foreach($submenuSlug as $slug){
            if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
                $activeClass = $active;
            }
          }
        }
        else{
          if (str_contains($currentRouteName,$submenuSlug) and strpos($currentRouteName,$submenuSlug) === 0) {
            $activeClass = $active;
          }
        }
      }
    @endphp

      <li class="menu-item {{$activeClass}}">
        <a href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}" class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
          @if (isset($submenu->icon))
          <i class="{{ $submenu->icon }}"></i>
          @endif
          <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
          @isset($submenu->badge)
            <div class="badge bg-{{ $submenu->badge[0] }} rounded-pill ms-auto">{{ $submenu->badge[1] }}</div>
          @endisset
        </a>

        {{-- submenu --}}
        @if (isset($submenu->submenu))
          @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
        @endif
      </li>
    @endforeach
  @endif
</ul>
