<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMeta;
use App\Models\FaqMeta;
use App\Models\OurStoryMeta;

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
    public function faqhomestatus(Request $request){
        $faqs = FaqMeta::where('status',1)->get();
        foreach($faqs as $f){
           
             $faqsupdate = FaqMeta::find($f->id);
             $faqsupdate->home_page = 0;
             $faqsupdate->update();
        }
        $faqmeta = FaqMeta::find($request->id);
        $faqmeta->home_page = 1;
        $faqmeta->update();
        return response()->json(['success'=>'successfully updated']);
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
    public function ourStory(){
        $StoryMeta = OurStoryMeta::first();
        return view('admin.sitemeta.ourstory',compact('StoryMeta'));
    }
    public function ourStoryAdd(Request $request){
       
        if($request->hasFile('thumnail_image')){
            $thumnail_image = $request->file('thumnail_image');
            $filename = 'thumnail'.rand(0,100).'.'.$thumnail_image->extension();
            $thumnail_image->move(public_path().'/site_meta/', $filename);
        }else{
            $filename = null;
        }
        if($request->hasFile('profile_image')){
            $profile_image = $request->file('profile_image');
            $filename2 = 'profile'.rand(0,100).'.'.$profile_image->extension();
            $profile_image->move(public_path().'/site_meta/', $filename2);
           
        }else{
            $filename2 = null;
        }
        $StoryMeta = OurStoryMeta::first();
        if($StoryMeta){
            $StoryMeta->banner_text = $request->banner_text;
            $StoryMeta->video_text = $request->video_text;
            if($filename !== null){ 
            $StoryMeta->video_thumnail_image = $filename;
            }

            $StoryMeta->video_link = $request->video_url;
            $StoryMeta->profile_name = $request->profile_name;
            $StoryMeta->profile_position = $request->profile_position;
            if($filename2 !== null){ 
            $StoryMeta->profile_image = $filename2;
            }   
            $StoryMeta->profile_text = $request->profile_description;
            $StoryMeta->message = $request->profile_message;
            $StoryMeta->save();
        }else{
            $StoryMeta = new OurStoryMeta;
            $StoryMeta->banner_text = $request->banner_text;
            $StoryMeta->video_text = $request->video_text;
            if($filename !== null){ 
            $StoryMeta->video_thumnail_image = $filename;
            }

            $StoryMeta->video_link = $request->video_url;
            $StoryMeta->profile_name = $request->profile_name;
            $StoryMeta->profile_position = $request->profile_position;
            if($filename2 !== null){ 
            $StoryMeta->profile_image = $filename2;
            }   
            $StoryMeta->profile_text = $request->profile_description;
            $StoryMeta->message = $request->profile_message;
            $StoryMeta->save();
        }
        return redirect()->back()->with('success','Successfully updated story meta');

    }
}
