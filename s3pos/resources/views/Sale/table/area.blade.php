<li class="nav-item">
    <a class="nav-link active" href="#" data-filter="all">
        </i> Tất cả
    </a>
</li>
@foreach ($areas as $item)
    <li class="nav-item">
        <a class="nav-link" href="#" data-filter="{{ $item->id }}">
            {{ $item->name }}
        </a>
    </li>
@endforeach
