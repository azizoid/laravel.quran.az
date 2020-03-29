<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;

use App\Quran;
use SEO;
use Notification;

use App\Notifications\TweetAyahNotification;

class QuranController extends Controller
{
  public function index($s=null, $a=null)
  {
      /*
      $where = ['soorah_id'=>$s];
      if(!empty($a)){
          $where['aaya_id'] = $a;
      }
      $out = Quran::select(['soorah_id as s', 'aya_id as a', 'content as c'])->where($where)->where('translator_id', 1)->get();
      return response()->json(
         compact('out') 
      );
      */
      $data       =   ['s'=>null, 'a'=>null, 'q'=>null, 'view'=>'empty'];
      $view       =   "search";
      $limit      =   is_numeric(@$_GET['limit']) && $_GET['limit'] > 0  && $_GET['limit'] <100 ? $_GET['limit'] : 30;
      $trans      =   is_numeric(@$_GET['trans']) && in_array($_GET['trans'], array(1,2,3)) ? $_GET['trans'] : 1;

      $where      =   ['translator_id'=>$trans];

      if(is_numeric($s) && $s>0 && $s<115){
          //
          $data['view'] = 'soorah';
          $data['s']  =   $s;
          $where['soorah_id'] = $s;

          if(is_numeric($a) && $a>0 && $a<287){
              $data['view'] = 'ayah';
              $data['a']      = $a;
              $where['aya_id']= $a;
          }

          $out = Quran::select('id', 'soorah_id as s', 'aya_id as a', 'content as c')
                  ->where($where)->limit($limit)->get();
      }

      if(is_string($s) && strlen($s)>3){ 
          $query = htmlspecialchars($s);
          $data['view'] = 'search';
          $data['q'] =  $query;
          $out = Quran::select('id', 'soorah_id as s', 'aya_id as a', 'content as c')
                  ->where('content', 'like', '%'.$query.'%')
                  ->limit($limit)->get();
      }

      return response()->json(
          compact('out', 'data') 
       );
  }

    public function ayah($soorah=1, $ayah=null, $t='t1')
    {
        $data               = array();
        $data['soorah']     = in_array($soorah, range(1,114)) ? $soorah : false;
        $data['ayah']       = in_array($ayah, range(1,286)) ? $ayah : false;
        $data['translator'] = in_array($t, array('t1', 't2', 't3')) ? substr($t, 1) : 1;

        $where = ['soorah_id'=>$data['soorah'], 'translator_id'=>$data['translator']];

        $out = Quran::select('id', 'soorah_id', 'aya_id', 'content', 'translator_id')
                    ->where($where)
                    ->where(['aya_id'=>$data['ayah']])
                    ->get();

        if($out->count()){
            $id = $out->first()->id;
            $nav['prev']  = Quran::where('id', '<', $id)->where($where)->max('aya_id');
            $nav['next']  = Quran::where('id', '>', $id)->where($where)->min('aya_id');
            $detail       = Quran::find($id)->detail;

            SEO::setTitle($out->first()->soorah_id .':'. $out->first()->aya_id);
            SEO::setDescription($out->first()->content);

            SEO::opengraph()->setTitle($out->first()->soorah_id .':'. $out->first()->aya_id . ' : Müqəddəs Quran - Öz kitabını oxu');
            SEO::opengraph()->setUrl(\Request::url());
            SEO::opengraph()->addProperty('type', 'article');
            SEO::twitter()->setTitle($out->first()->soorah_id .':'. $out->first()->aya_id . ' : Müqəddəs Quran - Öz kitabını oxu');
            $edit_id = $out->first()->id;
        }else return abort(404);
        
        return view('ayah', compact('out', 'data', 'nav', 'detail', 'edit_id'));
    }

    public function soorah($soorah, $t='t1')
    {
      $data               = array();
      $data['soorah']     = in_array($soorah, range(1,114)) ? $soorah : false;//abort(404);
      $data['translator'] = in_array($t, array('t1', 't2', 't3')) ? substr($t, 1) : 1;

      $out = Quran::select('id', 'soorah_id', 'aya_id', 'content', 'translator_id')
                  ->where(['soorah_id'=>$data['soorah'], 'translator_id'=>$data['translator']])
                  ->get();

      $url = 'https://quran.az/'.$data['soorah'].'/t'.$data['translator'];
      $metaAze    = \Config::get('quranmeta.aze');

      SEO::setTitle($metaAze[$soorah]);
      SEO::opengraph()->setTitle($metaAze[$soorah] . ' : Müqəddəs Quran - Öz kitabını oxu');
      SEO::opengraph()->setUrl(\Request::url());
      SEO::opengraph()->addProperty('type', 'article');
      SEO::twitter()->setTitle($metaAze[$soorah] . ' : Müqəddəs Quran - Öz kitabını oxu');
      SEO::twitter()->setSite('@quranaz');

      return view('soorah', compact('out', 'data', 'soorah'));
    }

    public function show($query, $t='1')
    {
        $data               = array();
        $data['query']      = htmlspecialchars($query);
        $data['translator'] = in_array($t, array('t1', 't2', 't3')) ? substr($t, 1) : 1;
        
        $out = Quran::select('id', 'soorah_id', 'aya_id', 'content', 'translator_id')
                    ->where('translator_id', $data['translator'])
                    ->where('content', 'like', '%'.$data['query'].'%')
                    ->paginate(30);

        //dd(compact('out'));

        /*
        $axtar              = new Axtar;
        $axtar->content     = $data['query'];
        $axtar->axtar_count = $out->total();
        $axtar->requested_by= $_SERVER['REMOTE_ADDR'];
        $axtar->created_at  = date('H:i d-m-Y');
        $axtar->save();
        */

        return view('show', compact('out', 'data'));
    }

    public function search(Request $request)
    {
        $url = '/';
        $view = 'index';
        $data = array();

        $temp = $request->validate([
            's' => 'nullable|numeric|digits_between:1,114',
            'a' => 'nullable|numeric|digits_between:1,286',
            't' => 'nullable|in:1,2,3',
            'q' => 'nullable|string',
        ]);
        //dd($temp);

        if(!empty($temp['s'])){
            $data['Quran.soorah_id'] = $temp['s'];
            $url.=$temp['s'];
            $view = 'soorah';
        }


        if(!empty($temp['a'])){
            $data['Quran.aya_id'] = $temp['a'];
            if($view == 'soorah'){
                $url .= '/'.$temp['a'];
                $view = 'aya';
            }
        }

        $temp['q'] = htmlspecialchars($temp['q']);
        if( $view != 'aya' && strlen($temp['q']) > 2 ){
            $data['Quran.content LIKE'] = '%'.$temp['q'].'%';

            $url = '/show/'.$temp['q'];
            //if ($view == 'soorah')
            //    $url.='/'.$temp['s'];

            $view = 'show';
        }

        if(!empty($temp['t']) && in_array($temp['t'], array(1,2,3))){
          $t = $data['Quran.translator_id'] = $temp['t'];
        }else{
          $t = $data['Quran.translator_id'] = 1;
        }


        if(in_array($view, array('soorah', 'aya', 'show')))
        {
            $url.= '/t'.$t;
        }else $url = '/';

        return redirect($url)->withInput();
    }

    /*
    public function edit($id){
      $out    = Quran::find($id);
      $soorah = \Config::get('quranmeta.aze');
      return view('admin.edit', compact('out', 'soorah'));
    }

    public function update(Request $request, $id){
      //update
      $tmp = $request->only('content');
      $out = Quran::find($id);
      $out->content = $tmp['content'];
      $out->save();
      return $this->q($id);
    }

    public function q($id){
      $out = Quran::find($id);
      return redirect(url('/', [$out->soorah_id, $out->aya_id, 't'.$out->translator_id]));
    }

    public function axtarilanlar($s=-1)
    {
      if($s==0){
        $out = Axtar::where('axtar_count', 0)->get();
      }else if($s==1){
        $out = Axtar::where('axtar_count', '>', 0)->get();
      }else {
        $out = Axtar::all();
      }

      return view('admin.axtarilanlar', compact('out'));
    }
    */

}
