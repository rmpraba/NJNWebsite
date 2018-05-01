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


class insertpftargetController extends BaseController
{
    public function insertpf(Request $req)
    {
        // echo $req->input('fiscalyear')."---".$req->input('tc')."---"$req->input('batch')."---"$req->input('type')."---".$req->input('genpm')."---".$req->input('genpf')."---".$req->input('getpt');
        $districtid = $req->input('districtcode');
        $year = $req->input('fiscalyear');
        $tc = $req->input('tc');
        $batch = $req->input('batch');
        $type = $req->input('type');
        $genpm = $req->input('genpm');
        $genpf = $req->input('genpf');
        $genpt = $req->input('genpt');
        $tsppm = $req->input('tsppm');
        $tsppf = $req->input('tsppf');
        $tsppt = $req->input('tsppt');
        $scppm = $req->input('scppm');
        $scppf = $req->input('scppf');
        $scppt = $req->input('scppt');
        $minpm = $req->input('minpm');
        $minpf = $req->input('minpf');
        $minpt = $req->input('minpt');

        $genfm = $req->input('genfm');
        $genff = $req->input('genff');
        $genft = $req->input('genft');
        $tspfm = $req->input('tspfm');
        $tspff = $req->input('tspff');
        $tspft = $req->input('tspft');
        $scpfm = $req->input('scpfm');
        $scpff = $req->input('scpff');
        $scpft = $req->input('scpft');
        $minfm = $req->input('minfm');
        $minff = $req->input('minff');
        $minft = $req->input('minft');
        // echo $year."---".$tc;
        // echo $batch."---".$type;
        // echo $genpm."---".$genpf;
        
    	$data1 = array("district_id"=>$districtid,"financial_year"=>$year,"centre_id"=>$tc,"batch_id"=>$batch,"general_male_target"=>$genpm,"general_female_target"=>$genpf,"general_target_total"=>$genpt,"tsp_male_target"=>$tsppm,"tsp_female_target"=>$tsppf,"tsp_target_total"=>$tsppt,"scp_male_target"=>$scppm,"scp_female_target"=>$scppf,"scp_target_total"=>$scppt,"min_male_target"=>$minpm,"min_female_target"=>$minpf,"min_target_total"=>$minpt);
        $data2 = array("district_id"=>$districtid,"financial_year"=>$year,"centre_id"=>$tc,"batch_id"=>$batch,"general_male_target"=>$genfm,"general_female_target"=>$genff,"general_target_total"=>$genft,"tsp_male_target"=>$tspfm,"tsp_female_target"=>$tspff,"tsp_target_total"=>$tspft,"scp_male_target"=>$scpfm,"scp_female_target"=>$scpff,"scp_target_total"=>$scpft,"min_male_target"=>$minfm,"min_female_target"=>$minff,"min_target_total"=>$minft);
        // $data2 = array("id"=>'2',"name"=>"demo.expertphp.in","details"=>"Find running example");
        DB::table('physical_target')->insert(array($data1));
        DB::table('financial_target')->insert(array($data2));

        return view('pages.success');

    }
}
