<?php 
namespace App\traits;
use App\Models\setting;
use illuminate\Http\Request;
use App\Http\Requests\validaterequest;
use Illuminate\Foundation\Http\FormRequest;
trait uploadimage{
public static function uploadimage(Request $request,$validated){
        $logo=$request->file("logo")->getclientOriginalName();
        $logoPath=$request->file("logo")->storeAs("logo",$logo,"images");
        $favicon=$request->file("favicon")->getclientOriginalName();
        $faviconPath=$request->file("favicon")->storeAs("favicon",$favicon,"images");
        $validated = $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        return array_merge($validated, [
            'logo' => $logoPath,
            'favicon' => $faviconPath,
        ]);
}
}
