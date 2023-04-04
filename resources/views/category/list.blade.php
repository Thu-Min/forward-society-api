<div class="overflow-x-auto">
    <table class="table table-compact w-full mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Manage</th>
                <th>Created at</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
        <tbody>
            <tr>
                <td class="font-bold"> {{ $category->id}} </td>
                <td> {{ $category->title }} </td>
                <td>
                    <div class="btn-group">
                        {{-- edit --}}
                        <a href= "{{ route('category.edit',$category->id)}}" class="btn btn-primary btn-outline btn-sm">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        {{-- delete --}}
                        <button form="delForm{{ $category->id }}" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-primary btn-outline btn-sm" style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                          <form id="delForm{{$category->id}}" action="{{ route('category.destroy',$category->id) }}" method="post">
                            @csrf
                            @method('delete')
                          </form>
                    </div>
                </td>
                <td>
                    <p class="date mb-0">
                      <i class="fa-regular fa-calendar"></i>
                      {{ $category->created_at->format("d M Y") }}
                    </p>
                    <p class="time mb-0">
                      <i class="fa-regular fa-clock"></i>
                      {{ $category->created_at->format("h:i A") }}
                    </p>
                  </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
