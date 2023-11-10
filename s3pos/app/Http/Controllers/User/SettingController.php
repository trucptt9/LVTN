<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SettingGroup;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index()
    {
        $type = request('type', 'notification');
        $data = [
            'groups' => SettingGroup::ofStatus(SettingGroup::STATUS_ACTIVE)->orderBy('numering', 'desc')->get(),
            'group' => SettingGroup::with('settings')->ofCode($type)->ofStatus(SettingGroup::STATUS_ACTIVE)->firstOrFail(),
        ];
        return view('user.setting.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $rules = array(
                'type' => 'required|exists:setting_groups,code',
            );
            $messages = array(
                'type.required' => 'Vui lòng chọn loại cấu hình!',
                'type.exists' => 'Không hỗ trợ cấu hình này!',
            );
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                $error = $validator->errors()->all();
                $msg = array_shift($error);
                return redirect()->back()->with('error', $msg);
            }
            $group = SettingGroup::ofCode($data['type'])->first();
            // get setting of group
            $settings = Settings::groupId($group->id)->get();
            $checkbox = [];
            foreach ($settings as $setting) {
                if (request()->has($setting->code)) {
                    switch ($setting->type) {
                        case Settings::TYPE_FILE:
                            break;
                        case Settings::TYPE_RADIO:
                            if (request($setting->code) == 'on') {
                                array_push($checkbox, $setting->id);
                                $data['value'] = 1;
                            }
                            break;
                        default:
                            $data['value'] = trim(request($setting->code));
                            break;
                    }
                    $setting->value = $data['value'];
                    $setting->save();
                }
            }
            Settings::groupId($group->id)->ofType(Settings::TYPE_RADIO)->whereNotIn('id', $checkbox)->update(['value' => 0]);
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            showLog($th);
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
    }
}
