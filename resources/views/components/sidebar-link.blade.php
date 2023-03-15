<li>
  <a href="{{ $url }}" class="{{ request()->url() == $url ? 'active' : '' }}">
  
      {{ $slot }}
    </a>
</li>
