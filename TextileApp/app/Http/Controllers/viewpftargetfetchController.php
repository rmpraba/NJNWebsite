<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Session;
// use Illuminate\Support\Facades\DB;

class viewpftargetfetchController extends BaseController
{
    public function viewpftargetfetch(Request $req)
    {
        // $username=session()->get('username');
        // $password=session()->get('password');
        // $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        // $tc = DB::select('SELECT * FROM training_centre WHERE district_id in(SELECT district_code FROM districts WHERE district_name=?)',[$info[0]->district]);
        // return view('tcview.pftarget',['district'=>$info[0]->district,'tc'=>$tc]);
      $tcs = DB::table("training_centres")->pluck("centre_name","centre_id");
        return view('tcview.viewpftarget',compact('tcs'));
    }
    public function viewgetBatchList($id)
    {
      // echo "hi".$id;
        $batches = DB::table("training_batches")
                    ->where("centre_id",$id)
                    ->pluck("batch_name","batch_id");
        return json_encode($batches);
    } 
    public function viewgetBatchInfo($id)
    {
      // echo "hi".$id;
        // $info = DB::select('SELECT * FROM training_batches b join training_centre t on(b.centre_id=t.centre_id) join batches ba on(b.batch_id=ba.id) join districts d on(d.district_code=t.district_id) WHERE b.id=?' , [$id]);
        $info = DB::select('SELECT ba.start_date,ba.end_date,b.batch_type,t.centre_type,d.district_name,d.district_code,d.division,
p.general_male_target as genpm,p.general_female_target as genpf,p.general_target_total as genpt,p.tsp_male_target as tsppm
,p.tsp_female_target as tsppf,
p.tsp_target_total as tsppt,p.scp_male_target as scppm,p.scp_female_target as scppf,
p.scp_target_total as scppt,p.min_male_target as minpm,
p.min_female_target as minpf,p.min_target_total as minpt,
f.general_male_target as genfm,f.general_female_target as genff,f.general_target_total as genft ,
f.tsp_male_target as tspfm,f.tsp_female_target as tspff,
f.tsp_target_total as tspft,f.scp_male_target as scpfm,f.scp_female_target as scpff,f.scp_target_total as scpft,
f.min_male_target as minfm,f.min_female_target as minff,f.min_target_total as minft  
FROM training_batches b join training_centres t on(b.centre_id=t.centre_id) join batches ba 
on(b.batch_id=ba.batch_id) join districts d on(d.district_code=t.district_id)
join physical_target p on(p.centre_id=b.centre_id) join financial_target f on(f.centre_id=b.centre_id)
 WHERE b.batch_id=? and p.batch_id=b.batch_id and f.batch_id=b.batch_id and f.batch_id=p.batch_id
 and f.centre_id=p.centre_id' , [$id]);
        return json_encode($info);          
        // return json_encode(['timing'=>$batchinfo[0]->start_date,'type'=>$batchinfo[0]->batch_type]);
    }  

}
