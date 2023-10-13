<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMeta;
use App\Models\FaqMeta;

class AdminSiteMetaController extends Controller
{
    public function index(){
        $sitemeta = SiteMeta::first();
        return view('admin.sitemeta.index',compact('sitemeta'));
    }
    public function addProcc(Request $request){
        $sitemeta = SiteMeta::first();
        if($sitemeta){
            $sitemeta->header_text = $request->header_text;
            $sitemeta->support_email = $request->support_email;
            $sitemeta->support_phone = $request->support_phone;
            $sitemeta->facebook = $request->facebook;
            $sitemeta->instagram = $request->instagram;
            $sitemeta->pintrest = $request->pintrest;
            $sitemeta->footer_title = $request->footer_title;
            $sitemeta->footer_text = $request->footer_text;
            $sitemeta->update();
        }else{
            $sitemeta = new SiteMeta;
            $sitemeta->header_text = $request->header_text;
            $sitemeta->support_email = $request->support_email;
            $sitemeta->support_phone = $request->support_phone;
            $sitemeta->facebook = $request->facebook;
            $sitemeta->instagram = $request->instagram;
            $sitemeta->pintrest = $request->pintrest;
            $sitemeta->footer_title = $request->footer_title;
            $sitemeta->footer_text = $request->footer_text;
            $sitemeta->save();
        }
        return redirect()->back()->with('success','Successfully updated');
    }
    public function faqs($slug = null){
        $faqmeta = FaqMeta::all();
        $editdata = FaqMeta::where('slug',$slug)->first();

        return view('admin.sitemeta.faqs',compact('faqmeta','editdata'));
    }
    public function faqaddProcc(Request $request){
      
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:faq_metas,slug,'.$request->id,
        ]);
        if($request->id){
        $faqmeta = FaqMeta::find($request->id);
        $faqmeta->title = $request->title;
        $faqmeta->slug = $request->slug;
        $faqmeta->text = $request->text;
        if($request->question && $request->answer){
            $faqmeta->questions = json_encode($request->question);
            $faqmeta->answers = json_encode($request->answer);
        }else{
            $faqmeta->questions = null;
            $faqmeta->answers = null;
        }
        $faqmeta->update();
        return redirect('/admin-dashboard/faqs/'.$faqmeta->slug)->with('success','Successfully updated');
        }else{
        $faqmeta = new FaqMeta;
        $faqmeta->title = $request->title;
        $faqmeta->slug = $request->slug;
        if($request->question && $request->answer){
            $faqmeta->questions = json_encode($request->question);
            $faqmeta->answers = json_encode($request->answer);
        }
        $faqmeta->save();
        return redirect()->back()->with('success','Successfully saved');
        }
    }
    public function faqDelete($id){
        $faqmeta = FaqMeta::find($id);
        if($faqmeta){
            $faqmeta->delete();
            return redirect('admin-dashboard/faqs')->with('success','Successfully deleted');
        }else{
            return redirect('admin-dashboard/faqs')->with('error','Failed! Something went wrong');
        }
    }
}
