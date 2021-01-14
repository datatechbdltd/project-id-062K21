<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('id', 'desc')->get();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content_of_json_file = file_get_contents(resource_path('lang').'/'.App::getLocale().'.json');
        $contents = json_decode($content_of_json_file);
        return view('admin.language.create', compact( 'contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_name'      => 'required|string|min:2|max:12|unique:languages,name,',
            'language_code'      => 'required|string|min:2|max:2|unique:languages,code,',
            'language_flag_icon' => 'required|string|min:2|max:250',
            'language_status'    => 'required|boolean',
        ]);
        $language = new Language();
        $language->code = $request->language_code;
        $language->name     = $request->language_name;
        $language->status   = $request->language_status;
        $language->flag     = $request->language_flag_icon;

        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->withInfo('Please fill one minimum one field');
        }else{
            try {
                $language->save();
                file_put_contents(resource_path('lang/') . $language->code . '.json', $content);
                toast('Sucessfully language added!!!!','success');
                return redirect()->route('setting.language.edit', $language)->withToastSuccess('Successfully added language-'.$language->name);
            }catch (\Exception $exception){
                toast('Something going wrong!!!!','error');
                return back()->withErrors('Something going wrong.');
            }
        }
    }

    /**
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Language $language)
    {
        try {
            $content_of_json_file = file_get_contents(resource_path('lang').'/'.$language->code.'.json');
            $contents = json_decode($content_of_json_file);
            return view('admin.language.show', compact('language', 'contents'));
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return back();
        }
      }

    /**
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Language $language)
    {
        try {
            $content_of_json_file = file_get_contents(resource_path('lang').'/'.$language->code.'.json');
            $contents = json_decode($content_of_json_file);
            return view('admin.language.edit', compact('language', 'contents'));
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'language_name'      => 'required|string|min:2|max:12|unique:languages,name,'.$language->id,
            'language_code'      => 'required|string|min:2|max:12|unique:languages,code,'.$language->id,
            'language_flag_icon' => 'required|string|min:2|max:250',
            'language_status'    => 'required|boolean',
        ]);
        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->withInfo('Please fill one minimum one field');
        }else{
            if ($request->language_code != $language->code){
                //if language code means json file name is changed need to rename first.
                rename(resource_path('lang/').$language->code . '.json', resource_path('lang/').$request->language_code . '.json');
                $language->code = $request->language_code;
            }
            $language->name     = $request->language_name;
            $language->status   = $request->language_status;
            $language->flag     = $request->language_flag_icon;
            try {
                $language->save();
                file_put_contents(resource_path('lang/') . $language->code . '.json', $content);
                toast('Sucessfully updated!!!!','success');
                return back();
            }catch (\Exception $exception){
                toast('Something going wrong!!!!','error');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        try {
            unlink(resource_path('lang/').$language->code . '.json');
            $language->delete();
            toast('Sucessfully data Deleted!!!!','success');
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
        }
        return back();
    }
}
