<table class="table table-bordered">
    <form action="">
        @foreach ($modules as $module)
            <tr>
                <td class="">
                    <div class="form-check fw-semibold">
                        {{ $module->name }}
                    </div>
                </td>
                <td>
                    <div class="form-check ">
                        <input type="checkbox" name="all-action" class="form-check-input check-all" 
                        id="check-all-{{ $module->id }}" data-id="{{ $module->id }}">
                        <label class="">
                            Tất cả
                        </label>
                    </div>
                </td>
                @php
                    $actions = json_decode($module->actions);
                @endphp
                @foreach ($actions as $action)
                    <td>
                        <div class="form-check ">
                            <input type="checkbox" name="action" class="form-check-input module-{{ $module->id }}">
                            <label class="" for="switch_action_{{ $action->code }}_{{ $module->id }}">
                                {{ $action->name }}
                            </label>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </form>
</table>
