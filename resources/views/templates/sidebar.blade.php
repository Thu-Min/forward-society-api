<section
      id="sideBar"
      class="w-[345px] h-screen bg-[#00122C] flex flex-col gap-5 fixed left-0 top-0" style="overflow-y: scroll;">

    <figure class="mt-5">
        <img src="{{ asset('img/watermark.png') }}" alt="logo" class="h-[80px] ml-5"  />
    </figure>

    <ul class="menu w-full p-2 text-white">

        <x-sidebar-menu-title>
          Navigation
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('dashboard')">
          <i class="fa-solid fa-fw fa-house"></i>
          Dashboard
        </x-sidebar-link>

        <x-sidebar-menu-title>
            Gallery
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('photo.create')">
            <i class="fa-solid fa-images"></i>
            Photo
        </x-sidebar-link>

        <x-sidebar-menu-title>
            Testimonial
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('testimonial.index')">
            <i class="fa-regular fa-rectangle-list"></i>
            Testimonial List
        </x-sidebar-link>

        <x-sidebar-link :url="route('testimonial.create')">
            <i class="fa-regular fa-square-plus"></i>
            Create Testimonial
        </x-sidebar-link>

        <x-sidebar-menu-title>
          Blog Management
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('category.index')">
          <i class="fa-regular fa-rectangle-list"></i>
          Category List
        </x-sidebar-link>

        <x-sidebar-link :url="route('blog.index')">
          <i class="fa-solid fa-book-open"></i>
          Blog List
        </x-sidebar-link>

        <x-sidebar-link :url="route('blog.create')">
          <i class="fa-regular fa-square-plus"></i>
          Create Blog
        </x-sidebar-link>

        <x-sidebar-menu-title>
          Event Management
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('event_categories.index')">
          <i class="fa-regular fa-rectangle-list"></i>
          Event Category List
        </x-sidebar-link>

        <x-sidebar-link :url="route('events.index')">
          <i class="fa-solid fa-book-open"></i>
          Event List
        </x-sidebar-link>

        <x-sidebar-link :url="route('events.create')">
          <i class="fa-regular fa-square-plus"></i>
          Create Event
        </x-sidebar-link>

        <x-sidebar-menu-title>
            Contact
        </x-sidebar-menu-title>

        <x-sidebar-link :url="route('contact.index')">
            <i class="fa-regular fa-rectangle-list"></i>
            Contact List
        </x-sidebar-link>

    </ul>

    <form action="{{ route('logout') }}" method="post" class="mt-auto block p-2">
        @csrf
        <button class="btn btn-outline btn-primary block w-full" type="submit">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </button>
    </form>
</section>
