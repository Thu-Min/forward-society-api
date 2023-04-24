@if (count($event_categories) > 0)
    <div class="overflow-x-auto">
        <table class="table table-compact w-full mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($event_categories as $event_category)
                <tbody>
                    <tr>
                        <td class="font-bold"> {{ $event_category->id }} </td>
                        <td> {{ $event_category->title }} </td>
                        <td>
                            <p class="date mb-0">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $event_category->created_at->format('d M Y') }}
                            </p>
                            <p class="time mb-0">
                                <i class="fa-regular fa-clock"></i>
                                {{ $event_category->created_at->format('h:i A') }}
                            </p>
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- edit --}}
                                <a href="{{ route('event_categories.edit', $event_category->id) }}"
                                    class="btn btn-primary btn-outline btn-sm">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                {{-- delete --}}
                                <button form="delForm{{ $event_category->id }}"
                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                    class="btn btn-primary btn-outline btn-sm"
                                    style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <form id="delForm{{ $event_category->id }}"
                                    action="{{ route('event_categories.destroy', $event_category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $event_categories->onEachSide(1)->links() }}

    </div>
@else
    <h3 class="mx-auto mt-10 text-2xl font-semibold text-center text-blue-600"> There is no Category Data. Add
        some new....</h3>
@endif