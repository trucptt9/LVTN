<div class="modal-header title text-uppercase fw-bold">Chọn bàn</div>
<form action="" type="POST" id="form-add-table">
    <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
    <div class="modal-pos-product">
        <div class="modal-pos-product-info" style="width:100% ; flex:0 0 100%;max-width:100%">
            @foreach ($area as $item)
                <div class="mb-2">
                    <div class="fw-bold">{{ $item->name }}</div>
                    <div class="option-list">
                        <?php
                        $list = $item->tables()->get();
                        ?>
                        @foreach ($list as $item)
                            <div class="option option-table" style="width:20%; max-width:20%"
                                data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                <input type="radio" id="{{ 'table' . $item->id }}" name="size"
                                    class="option-input">
                                <label class="option-label" for="{{ 'table' . $item->id }}">
                                    <span class="option-price text-uppercase">Bàn {{ $item->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>
