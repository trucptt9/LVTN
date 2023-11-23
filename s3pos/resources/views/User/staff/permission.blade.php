<div class="accordion" id="accordionExample">

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Accordion Item #1
            </button>
        </h2>


        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table table-bordered">
                    @foreach ($item->modules as $module)
                        @php
                            $permission = permission_detail($role->id, $module->code);
                        @endphp
                        <tr>
                            <td class="bg-info-subtle">
                                <div class="form-check form-switch">
                                    <input class="form-check-input " data-id="{{ $module->id }}"
                                        value="{{ $module->code }}" type="checkbox" 
                                        {{ $permission ? 'checked' : '' }} id="switch_module_{{ $module->id }}">
                                    <label class="form-check-label" for="switch_module_{{ $module->id }}">
                                        {{ $module->name }}
                                    </label>
                                </div>
                            </td>
                            @php
                                $actions = json_decode($module->actions);
                                $action_permisisons = $permission ? json_decode($permission->actions) : [];
                            @endphp
                            @foreach ($actions as $action)
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input switch_action module_{{ $module->id }}"
                                            data-moduleid="{{ $module->id }}" data-code="{{ $action->code }}"
                                            {{ in_array($action->code, $action_permisisons) ? ' checked ' : '' }}
                                            name="actions[{{ $module->code }}][]" value="{{ $action->code }}"
                                            type="checkbox" role="switch"
                                            id="switch_action_{{ $action->code }}_{{ $module->id }}">
                                        <label class="form-check-label"
                                            for="switch_action_{{ $action->code }}_{{ $module->id }}">
                                            {{ $action->name }}
                                        </label>
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


</div>
