<div class="col-md-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Danh mục sản phẩm
            </h4>
        </div>
        <div class="list-group">
            {{-- <ul class="list-group"> --}}
            @foreach ($cats_home as $cat)
                {{-- <li class="list-group-item"> --}}
                <a
                    href="{{ route('home.category', $cat->id) }}"class="list-group-item">{{ $cat->name }}</a>
                {{-- </li> --}}
            @endforeach
            {{-- </ul> --}}
        </div>
    </div>
</div>