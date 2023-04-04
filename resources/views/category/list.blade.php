@if (count($categories) > 0)
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
            @foreach ($categories as $category)
                <tbody>
                    <tr>
                        <td class="font-bold"> {{ $category->id }} </td>
                        <td> {{ $category->title }} </td>
                        <td>
                            <p class="date mb-0">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $category->created_at->format('d M Y') }}
                            </p>
                            <p class="time mb-0">
                                <i class="fa-regular fa-clock"></i>
                                {{ $category->created_at->format('h:i A') }}
                            </p>
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- edit --}}
                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="btn btn-primary btn-outline btn-sm">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                {{-- delete --}}
                                <button form="delForm{{ $category->id }}"
                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                    class="btn btn-primary btn-outline btn-sm"
                                    style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <form id="delForm{{ $category->id }}"
                                    action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@else
    <h3 class="mx-auto mt-10 text-2xl font-semibold text-center text-blue-600"> There is no Category Data. Add
        some new....</h3>
@endif
