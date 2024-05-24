<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Requests\validaterequest;
use  App\traits\uploadimage;

class settingscontroller extends Controller
{
    use uploadimage;
//     public function update(Request $request){
// // dd($request->all());
//     setting::create($request->all());
//     return redirect()->route('dashboard.settings');
    
    public function update(validaterequest $request){
        setting::create($request->all());
        $setting = setting::firstOrFail();        
        $validateddata= $request->validated();
        $setting->update($this->uploadimage($request,$validateddata) );
        return redirect()->route('dashboard.settings');
    }
    // public function store(request $request){
    //     return $this->uploadimage($request);
    // }
}
