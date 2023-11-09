<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use App\Models\AdminSettingGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    protected $dir;

    public function __construct()
    {
        $this->dir = 'uploads/setting/';
    }

    public function index()
    {
        $type = request('type', 'general');
        $data = [
            'bank_list' => Cache::get('cache-list-bank') ?? [],
            'groups' => AdminSettingGroup::ofStatus(AdminSettingGroup::STATUS_ACTIVE)->get(),
            'group' => AdminSettingGroup::with('settings')->ofCode($type)->ofStatus(AdminSettingGroup::STATUS_ACTIVE)->firstOrFail()
        ];
        return view('Admin.setting.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $rules = array(
                'type' => 'required|exists:admin_setting_groups,code',
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
            $group = AdminSettingGroup::ofCode($data['type'])->first();
            // get setting of group
            $settings = AdminSetting::groupId($group->id)->get();

            foreach ($settings as $setting) {
                if (request()->has($setting->code)) {
                    switch ($setting->type) {
                        case AdminSetting::TYPE_FILE:
                            if (request()->hasFile($setting->code)) {
                                $file = request()->file($setting->code);
                                $extension = $file->getClientOriginalExtension();
                                $name = Carbon::now()->format('Ymd') . '_' . time() . '.' . $extension;
                                $file->storeAs('public/files', $name);
                                $data['value'] = "files/" . $name;

                                // delete old image
                                if ($setting->file) {
                                    Storage::disk('public')->delete($setting->value);
                                }
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
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            showLog($th);
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
    }

}