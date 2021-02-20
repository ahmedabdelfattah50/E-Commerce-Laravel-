<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    public function index(){
        $languages = Language::select() -> paginate(PAGINATION_MY_COUNT);
        return view('admin.languages.index',compact('languages'));
    }

    public function create(){
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        try {
            Language::create($request -> except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'لقد تم اضافة اللغة بنجاح']);
        } catch (\Exception $ex){
            return redirect()->route('admin.languages.create')->with(['error' => 'خطأ فى ادخال اللغة']);
        }
    }

    public function edit($id){
        try {
            $language = Language::select()->find($id);
            if(!$language){
                return redirect()->route('admin.languages')->with(['error' => 'هذة اللغة غير موجودة']);
            }
            // go to the page of edit language
            return view('admin.languages.edit',compact('language'));
        } catch (\Exception $ex){
            return redirect()->route('admin.languages.create')->with(['error' => 'خطأ فى ادخال اللغة']);
        }
    }

    public function update($id,LanguageRequest $request){
        try {
            $language = Language::select()->find($id);
            if(!$language){
                return redirect()->route('admin.languages')->with(['error' => 'هذة اللغة غير موجودة']);
            }

            // update the language
            if( !$request -> active ){
                $request->request->add(['active' => '0']); // this to add value (0) to the active value in the request for checkBox ::: my own code
            }

            $language->update($request->except('_token'));
            return redirect() -> route('admin.languages')->with(['success' => 'تم تعديل اللغة بنجاح']);
        } catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error' => 'خطأ فى اللغة']);
        }
    }

    public function destroy($id){
        try {
            $language = Language::select()->find($id);
            if(!$language){
                return redirect()->route('admin.languages')->with(['error' => 'هذة اللغة غير موجودة']);
            }
            
            // update the language
            $language->delete();
            return redirect() -> route('admin.languages')->with(['success' => 'تم مسح اللغة بنجاح']);
        } catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error' => 'خطأ فى اللغة']);
        }
    }


}
