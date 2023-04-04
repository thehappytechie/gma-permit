<?php

namespace App\Http\Controllers;

use App\Models\BrandSetting;
use Illuminate\Http\Request;
 
class BrandSettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandSetting  $brandSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandSetting $brandSetting)
    {
        return view('brand-setting.edit', compact('brandSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrandSetting  $brandSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandSetting $brandSetting)
    {
        $data = $this->doValidation($request, $brandSetting);
        $brandSetting->update($data);
        $request->session()->flash('success', 'Setting updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandSetting  $brandSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandSetting $brandSetting)
    {
        //
    }

    public function doValidation($request, $brandSetting)
    {
        return $request->validate(
            [
                'site_name' =>  [($brandSetting->id) ? "sometimes" : "required"],
            ],
        );
    }
}
