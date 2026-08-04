<?php

namespace App\Http\Controllers;

use App\Services\PantooVillageApi;
use Illuminate\Http\Request;

class PublicSiteController extends Controller
{
    public function __construct(private PantooVillageApi $api) {}
    private function data(): array { return $this->api->portal(); }
    public function home() { return view('home', $this->data()); }
    public function page(string $view) { return view("pages.$view", $this->data()); }
    public function activity(string $slug) { $data=$this->data(); $data['item']=collect($data['activities'])->firstWhere('slug',$slug) ?? abort(404); return view('pages.activity-detail',$data); }
    public function potential(string $slug) { $data=$this->data(); $data['item']=collect($data['potentials'])->firstWhere('slug',$slug) ?? abort(404); return view('pages.potential-detail',$data); }
    public function tourism() { return view('pages.tourism', $this->data()); }
    public function tourismDetail(string $slug) { $data=$this->data(); $data['item']=collect($data['tourism'])->firstWhere('slug',$slug) ?? abort(404); return view('pages.tourism-detail',$data); }
    public function service(string $slug) { $data=$this->data(); $data['item']=collect($data['services'])->firstWhere('slug',$slug) ?? abort(404); return view('pages.service-detail',$data); }
    public function complaint(Request $request) {
        $validated=$request->validate(['name'=>['nullable','string','max:120'],'contact'=>['nullable','string','max:80'],'category'=>['required','string'],'title'=>['required','string','max:160'],'description'=>['required','string','max:3000'],'location'=>['nullable','string','max:300']]);
        $categories=['Fasilitas Umum'=>'INFRASTRUCTURE','Lingkungan'=>'ENVIRONMENT','Keamanan'=>'SECURITY','Pelayanan'=>'PUBLIC_SERVICE','Usulan Kegiatan'=>'SOCIAL'];
        $receipt=$this->api->submitComplaint(['reporter_name'=>$validated['name']??'','reporter_contact'=>$validated['contact']??'','is_anonymous'=>empty($validated['name']),'category'=>$categories[$validated['category']]??'OTHER','title'=>$validated['title'],'description'=>$validated['description'],'location'=>$validated['location']??'']);
        return redirect()->route('complaint')->with('success',"Aduan {$receipt['complaint_number']} berhasil diterima.");
    }
}
