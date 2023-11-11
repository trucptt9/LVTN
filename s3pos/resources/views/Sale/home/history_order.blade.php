@foreach ($list as $item)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $item->code }}
        <span class="badge bg-primary rounded-pill">
            {{ number_format($item->total) }}
        </span>
    </li>
@endforeach
