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
                            <div class="option" style="width:20%; max-width:20%">
                                <input type="radio" id="{{'table'. $item->id }}" name="size" class="option-input" >
                                <label class="option-label" for="{{'table'. $item->id }}">
                                    <span class="option-price text-uppercase">Bàn {{ $item->name }}</span>
                                    <span class="option-text">{{ $item->status }}</span>
                                </label>
                            </div>
                        @endforeach


                    </div>
                </div>

                <hr class="opacity-1">
            @endforeach



            <div class="row">
                <div class="col-2">
                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block" data-bs-dismiss="modal">Hủy</a>
                </div>
                <div class="col-8">
                    <button type="submit"
                        class="btn btn-add-table btn-theme fw-semibold  m-0">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</form>
