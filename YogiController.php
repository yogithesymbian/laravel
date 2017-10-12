<?php
// laravel/app/Http/Controllers/YogiController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Yogi;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class YogiController extends Controller
{
    public function index(){
      $yogis = Yogi::all();
      return view('yogi.index',['yogis' => $yogis]);

    }

    public function editItemyogi(Request $req) {
      $yogi = Yogi::find ($req->id);
      $yogi->judulyogiaw = $req->judulyogiaw;
      $yogi->deskripsiyogiaw = $req->deskripsiyogiaw;
      $yogi->save();
      return response()->json($yogi);
    }

    public function addItemyogi(Request $req){
      $caranya = array(
        'judulyogiaw' => 'required',
        'deskripsiyogiaw' => 'required',
      );
      // 4 valid yogi
      $validator = Validator::make ( Input::all (), $caranya );
      if ($validator->fails())
      return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $yogi = new Yogi();
        $yogi->judulyogiaw = $req->judulyogiaw;
        $yogi->deskripsiyogiaw = $req->deskripsiyogiaw;
        $yogi->save();
        return response()->json($yogi);
      }
    }

    //del ini yogis
    public function deleteItemyogi(Request $req){
      Yogi::find($req->id)->delete();
      return Response()->json();
    }
}
