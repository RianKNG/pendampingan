<?php

namespace App\Http\Controllers;

use App\Models\Merek;


use App\Models\Cabang;
use App\Models\DilModel;
use App\Models\Golongan;
use App\Exports\DilExport;
use App\Imports\DilImport;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;




class DilController extends Controller
{
    protected $user;

    public function __construct()
    {
       
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
          });
        //   $this->middleware(function ($request, $next) {
        //     $this->user = Auth::admin();
        //     return $next($request);
        //   });
    }
    
    public function index(Request $request)
   
    {
        // $cab = Cabang::all();
        $username = $this->user->name;
        if($username == 'admin') {
            $data = DB::table('tbl_dil as d')
            ->select([
                    'd.id','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
                    'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
                    'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_cabang','d.id_golongan','d.id_merek','m.merek','u.nama_cabang'
                    // 'g.nama_golongan','g.kode','u.id','u.nama_cabang'
        ])
        ->Join('merek as m','d.id_merek','=','m.id')
        ->Join('cabang as u','d.id_cabang','=','u.id')
        ->Join('golongan as g','d.id_golongan','=','g.id')
        ->leftJoin('bbn as s','s.id_dil','=','d.id')
        // ->where('id_cabang',11)
        ->simplePaginate(100);
        
        // if (request('term')) {
        //     $data = DB::table('tbl_dil as d')
        // ->select([
        //     'd.id','d.id_cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
        //     'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
        //     'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
        //     'g.nama_golongan','g.kode','s.nama_baru','p.alasan','m.merek','c.id','c.nama_cabang'
        // ])
        // ->Join('merek as m','d.id_merek','=','m.id')
        // ->Join('cabang as c','d.id_cabang','=','c.id')
        // ->Join('golongan as g','d.id_golongan','=','g.id')
        // ->leftJoin('bbn as s','s.id_dil','=','d.id')
        // ->leftJoin('penutupan as p','p.alasan','=','d.id')
        // ->orderBy('d.status','desc')
        // ->where('d.id_cabang', 'Like', '%' . request('term') . '%')
        // ->orWhere('d.id', 'Like', '%' . request('term') . '%')
        // ->simplePaginate(100);
        // return view('dil.v_dil', compact('data'));
        // }else{
        //     $data = DB::table('tbl_dil as d')
        // ->select([
        //     'd.id','d.id_cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
        //     'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
        //     'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
        //     'd.id_golongan','g.nama_golongan','g.kode','s.nama_baru','p.alasan','m.merek','c.id','c.nama_cabang'
        // ])
        // ->Join('merek as m','d.id_merek','=','m.id')
        // ->Join('cabang as c','d.id_cabang','=','c.id')
        // ->Join('golongan as g','d.id_golongan','=','g.id')
        // ->leftJoin('bbn as s','s.id_dil','=','d.id')
        // ->leftJoin('penutupan as p','p.alasan','=','d.id')
        // // ->orderBy('d.id_cabang','desc')
        // ->orderBy('d.status','desc')
        // // ->where('d.status',2)
        // ->simplePaginate(100);
        // // dd($data);
        // if (request('term')) {
        //     $data = DB::table('tbl_dil as d')
        // ->select([
        //     'd.id','d.id_cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
        //     'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
        //     'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
        //     'g.nama_golongan','g.kode','s.nama_baru','p.alasan','m.merek','c.id','c.nama_cabang'
        // ])
        // ->Join('merek as m','d.id_merek','=','m.id')
        // ->Join('cabang as c','d.id_cabang','=','c.id')
        // ->Join('golongan as g','d.id_golongan','=','g.id')
        // ->leftJoin('bbn as s','s.id_dil','=','d.id')
        // ->leftJoin('penutupan as p','p.alasan','=','d.id')
        // ->orderBy('d.status','desc')
        // ->where('d.id_cabang', 'Like', '%' . request('term') . '%')
        // ->orWhere('d.id', 'Like', '%' . request('term') . '%')
        // ->simplePaginate(100);
           
        // }
        return view('dil.v_dil', compact('data'))->render(); 
    //    dd($data);
    
        }

     
      
    }
    public function add()
    {
        $mer = Merek::all();
        $gol = Golongan::all();
        $cab = Cabang::all();
        // dd($cab);
        return view('dil.v_dil_tambah',compact('mer','gol','cab'));

    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $dateinit = \Carbon\Carbon::parse($request->tanggal_file);
        $datefim = \Carbon\Carbon::parse($request->tanggal_pasang);
        $this->validate($request,[
          'id' => 'required|unique:tbl_dil,id|max:11',
          'status' => 'required',
          'id_cabang'=>'required',
          'no_rekening' => 'required|max:8',
          'nama_sekarang' => 'required',
          'nama_pemilik' => 'required',
          'alamat' => 'required',
          'angka' => 'required',
          'status_milik' => 'required',
          'jml_jiwa_tetap' => 'required|numeric',
          'jml_jiwa_tidak_tetap' => 'required|numeric',
          'kondisi_wm' => 'required',
          'segel' => 'required',
          'stop_kran' => 'required',
          'ceck_valve' => 'required',
          'kopling' => 'required',
          'plugran' => 'required',
          'box' => 'required',
          'usaha' => 'required',
          'sumber_lain' => 'required',
          'id_golongan' => 'required',
          'id_merek' => 'required',
          'no_seri' => 'required',
          'jenis_usaha' => 'required',
          'tanggal_pasang' => 'required',
          'tanggal_file' => 'required',

        ]);
        
        
        DilModel::create([
          
          'id' => $request->id,
          'status' => $request->status,
          'id_cabang' => $request->id_cabang,
          'no_rekening' => $request->no_rekening,
          'nama_sekarang' => $request->nama_sekarang,
          'nama_pemilik' => $request->nama_pemilik,
          'alamat' => $request->alamat,
          'angka' => $request->angka,
          'status_milik' => $request->status_milik,
          'jml_jiwa_tetap' => $request->jml_jiwa_tetap,
          'jml_jiwa_tidak_tetap' => $request->jml_jiwa_tidak_tetap,
          'kondisi_wm' => $request->kondisi_wm,
          'segel' => $request->segel,
          'stop_kran' => $request->stop_kran,
          'ceck_valve' => $request->ceck_valve,
          'kopling' => $request->kopling,
          'plugran' => $request->plugran,
          'box' => $request->box,
          'usaha' => $request->usaha,
          'sumber_lain' => $request->sumber_lain,
          'id_golongan' => $request->id_golongan,
          'id_merek' => $request->id_merek,
          'no_seri' => $request->no_seri,
          'jenis_usaha' => $request->jenis_usaha,
          'tanggal_pasang' => $request->tanggal_pasang,
          'tanggal_file' => $request->tanggal_file,
        ])
        ->get();
  
        return redirect()->route('dil')->with('success','data berhasil ditambahkan');
      }  

    public function edit($id)
    {
       // ini cara baru
       $mer = Merek::all();
       $gol = Golongan::all();
       $cab = Cabang::all();
        $data = DilModel::find($id);
        // dd($data);r
       
        return view('dil.v_editdil',compact('data','mer','gol','cab'));
    }
    // public function jumlahstatus(Request $request,$id){
    //     $data = DilModel::find($id);
    //     dd($data);
    // }
    public function update(Request $request,$id)
    {
     
       
        $data = DilModel::find($id);
        $data->update($request->all());
        // ini cara lama

        return redirect()->route('dil')->with('success','data berhasil diubah');
    }
    public function hapus($id)
    {
        $data = DilModel::find($id);
        $data->delete();
      
        
        return redirect()->route('dil')->with('success','data berhasil hapus');
    }
    public function status($id)
    {

        $data = DilModel::select('status')->where('id',$id)->first();
        // dd($data);
        if ($data->status == 1) {
            $status = 2;
        }else{
            $status = 1;
        }
        DilModel::where('id',$id)->update(['status'=>$status]);
        // return $data;
    return redirect()->route('dil')->with('success','status pelanggan berhasil diubah');

    }
    public function jumlah(Request $request)
    {
        // $data = DilModel::get();
        // $stok = DilModel::Count('status');
        $data = DilModel::select('status')->sum('status',1);
        
        // dd($data);
       return view('v_home',compact('data'));
    }

   public function exportexcel(Request $request,$id_cabang)
  
   {

    $from = Carbon::parse($request->get('from'));
    $to = Carbon::parse($request->get('to'));

//  dd($request->all());
    return Excel::download(new DilExport($request->id_cabang,$from, $to), 'DilCabang.xlsx');
      
   }
   public function exportpdf()
   {
    $s=DB::table('tbl_dil as d')
    ->select([
                'd.id','d.id_cabang','d.status',
              
            ])
        // ->where('status', 2)
        // ->get();
        ->paginate(10);
        
      
        // dd($s);
        // view()->share('naha');

        $pdf = PDF::loadView('coba', array('s' => $s));
    return $pdf->download('xx.pdf');
      
   }
   public function exportpdfa(Request $request)
   {
       
    if($request->cabang)
    $data = DB::table('tbl_dil as a')
    ->leftJoin('merek as b','b.id','=','a.id_merek')
    ->leftJoin('penutupan as c','c.id_dil','=','a.id')
    ->leftJoin('ganti as d','d.id_dil','=','a.id')
    ->leftJoin('sambung as e','e.id_dil','=','a.id')

    ->select([
        'a.id','a.status','a.id_cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','a.kondisi_wm','tanggal_file',
        'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
        'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
    ])
    ->where('a.cabang', 'Like', '%' . request('cabang') . '%')
    ->get();

        $pdf = PDF::loadView('reportdetail',compact('data'));
        return $pdf->download('dataDIL.pdf');
   }
   public function exportpdfn()
   {
        $data = DilModel::select('*')
        ->where('status', 2)
        ->get();
        // return $data;
        view()->share('data', $data);
        $pdf = PDF::loadView('coba');
        return $pdf->download('dataDIL.pdf');
      
   }
   public function importexcel(Request $request)
   {
    $birthday = \Carbon\Carbon::parse($request->tanggal_pasang);
    $ulang = \Carbon\Carbon::parse($request->tanggal_file);
    $this->validate($request, [
       
        'file' => 'required|mimes:csv,xls,xlsx',
        'tanggal_pasang'=>  Carbon::parse($birthday),
        'tanggal_file'=>   Carbon::parse($ulang),

    ]);
    // return($request->all());
    $data = $request->file('file');
    $namafile = $data->getClientOriginalName();
    $data->move('Pelanggan',$namafile);
    

    $import = Excel::import(new DilImport, \public_path('../Pelanggan/'. $namafile));
    
 
    if($import) {
        //redirect
        return redirect()->route('dil')->with(['success' => 'Data Berhasil Diimport!']);
    } else {
        //redirect
        return redirect()->route('dil')->with(['error' => 'Data Gagal Diimport!']);
    }
   }
   public function detail(Request $request, $id)
   {

    $lain = DB::table('tbl_dil as d')

            ->select([
                'd.id','d.id_cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
                'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','d.kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
                'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_merek',
                'm.merek',
                'd.id_golongan','g.nama_golongan','g.kode','s.nama_baru','t.tanggal_tutup','gan.tanggal_ganti'
            ])
        ->Join('merek as m','d.id_merek','=','m.id')
        ->Join('golongan as g','d.id_golongan','=','g.id')
        ->leftJoin('bbn as s','s.id_dil','=','d.id')
        ->leftJoin('penutupan as t','t.id_dil','=','d.id')
        ->leftJoin('ganti as gan','gan.id_dil','=','d.id')
        ->where('d.id', $id)
        ->get();


    return view('dil.v_detail',compact('lain'));
   }
   public function statustutup($id)
   {

       $data = DilModel::select('status')->where('id',$id)->first();
       // dd($data);
       if ($data->status == 1) {
           $status = 2;
       } else {
           $status = 1;
       }
       DilModel::where('id',$id)->update(['status'=>$status]);
       // return $data;
       return redirect()->route('penutupan')->with('success','data penutupan berhasil dithapus');
    }
    
   public function statussambung($id)
   {

       $data = DilModel::select('status')->where('id',$id)->first();
       // dd($data);
       if ($data->status == 1) {
           $status = 2;
       } else {
           $status = 1;
       }
       DilModel::where('id',$id)->update(['status'=>$status]);
       // return $data;
        return redirect()->route('penyambungan')->with('success','data penutupan berhasil dithapus');
    }
    public function cetaklaporanpenggantian()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = DB::table('ganti as a')
            ->join('tbl_dil as b','a.id_dil','=','b.id')
            ->select(DB::raw("(COUNT(*)) as jumlah"),'cabang', DB::raw('COUNT(tanggal_ganti) as tanggal_ganti'))
              ->whereBetween('tanggal_ganti',[$start_date,$end_date])
              ->groupBy('cabang')
              ->get();
                $sum = $data->sum(function ($item) {
                    return $item->jumlah;
                });
            $diltotal=DB::table('ganti as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',1)
            ->count();
            // dd($data);
            $totaldilaktip=DB::table('penutupan as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',1)
            ->count();
            $totaldilnonaktip=DB::table('penutupan as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',2)
            ->count();
                $pdf = PDF::loadView('coba2', array('data' => $data,'sum'=>$sum,'diltotal'=>$diltotal,'totaldilaktip'=>$totaldilaktip,'totaldilnonaktip'=>$totaldilnonaktip,));
        return $pdf->download('laporanPDVR.pdf');
    }
}
    
    public function cetaklaporanpenyambungan()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = DB::table('sambung as a')
            ->join('tbl_dil as b','a.id_dil','=','b.id')
            ->select(DB::raw("(COUNT(*)) as jumlah"),'cabang', DB::raw('COUNT(tanggal_sambung) as tanggal_sambung'))
              ->whereBetween('tanggal_sambung',[$start_date,$end_date])

              ->groupBy('cabang')

              ->get();

                $sum = $data->sum(function ($item) {
                    return $item->jumlah;
                });
            $diltotal=DB::table('sambung as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',1)
            ->count();
            $totaldilaktip=DB::table('penutupan as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',1)
            ->count();
            $totaldilnonaktip=DB::table('penutupan as a')
            ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
            ->where('status',2)
            ->count();

                $pdf = PDF::loadView('coba2', array('data' => $data,'sum'=>$sum,'diltotal'=>$diltotal,'totaldilaktip'=>$totaldilaktip,'totaldilnonaktip'=>$totaldilnonaktip,));
        return $pdf->download('laporanPDVR.pdf');
    }
}
public function cetakperiode()
{
    
// dd($data);
$title='Laporan DIL Berdasarkan Cabang Dan Merek';
 if (request()->start_date || request()->end_date) {
     $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
     $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
     $data = DB::table('tbl_dil')
    ->Join('merek as m','tbl_dil.id_merek','=','m.id')
     ->select(DB::raw("(COUNT(id_cabang)) as jumlah"),'id_cabang')
       ->whereBetween('tanggal_pasang',[$start_date,$end_date])
       ->groupBy('id_cabang')
       ->where('status',1)
       ->get();
       $datamerek = DB::table('tbl_dil')
       ->Join('merek as m','tbl_dil.id_merek','=','m.id')
       ->select(DB::raw("(COUNT(m.merek)) as jumlah"),'m.merek','id_cabang','m.id')
       ->whereBetween('tanggal_pasang',[$start_date,$end_date])
       ->groupBy('m.id')
       ->groupBy('m.merek')
       ->groupBy('id_cabang')
       ->orderBy('id_cabang')
       ->get();
// dd($datamerek);
$pdf = PDF::loadView('periode', compact('data','title','datamerek'));
        //  $pdf = PDF::loadView('periode',compact($data));
        return $pdf->download('laporan DIL Berdasarkan Cabang dan Golongan.pdf');
 }
 } 
 public function cetakrt()
{
    
// dd($data);
$title='Laporan DIL Berdasarkan Cabang Dan Golongan';
 if (request()->start_date || request()->end_date) {
     $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
     $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
     $data = DB::table('tbl_dil')
    ->Join('golongan as m','tbl_dil.id_golongan','=','m.id')
     ->select(DB::raw("(COUNT(id_cabang)) as jumlah"),'id_cabang')
       ->whereBetween('tanggal_pasang',[$start_date,$end_date])
       ->groupBy('id_cabang')
       ->where('status',1)
       ->get();
    //    dd($data);
       $datagolongan = DB::table('tbl_dil')
       ->Join('golongan as m','tbl_dil.id_golongan','=','m.id')
       ->select(DB::raw("(COUNT(m.nama_golongan)) as jumlah"),'m.nama_golongan','m.kode','id_cabang')
       ->whereBetween('tanggal_pasang',[$start_date,$end_date])
       ->groupBy('m.nama_golongan')
       ->groupBy('m.kode')
       ->groupBy('id_cabang')
       ->orderBy('id_cabang')
       ->get();
// dd($datagolongan);
$pdf = PDF::loadView('periodegolongan', compact('data','title','datagolongan'));
        //  $pdf = PDF::loadView('periode',compact($data));
        return $pdf->download('laporan DIL Bedasarkan Cabang dan Golongan.pdf');
 }
 } 
public function cetaklaporansl()
{
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = DB::table('tbl_dil as a')
        ->select(DB::raw("(COUNT(*)) as jumlah"),'cabang', DB::raw('COUNT(tanggal_file) as tanggal_file'))
          ->whereBetween('tanggal_file',[$start_date,$end_date])
          ->groupBy('cabang')
          ->get();


            $sum = $data->sum(function ($item) {
                return $item->jumlah;
            });
        $diltotal=DB::table('tbl_dil as a')
        ->count();
        $totaldil=$data = DB::table('tbl_dil as a')
        ->select(DB::raw("(COUNT(*)) as jumlah"),'cabang', DB::raw('COUNT(tanggal_file) as tanggal_file'))
          ->whereBetween('tanggal_file',[$start_date,$end_date])

          ->groupBy('cabang')
          ->get();


            $sum = $totaldil->sum(function ($item) {
                return $item->jumlah;
            });
        $totaldilaktip=DB::table('tbl_dil as a')
        ->where('status',1)
        ->count();
        $totaldilnonaktip=DB::table('tbl_dil as a')
        ->where('status',2)
        ->count();

            $pdf = PDF::loadView('coba2', array('data' => $data,'sum'=>$sum,'diltotal'=>$diltotal,'totaldilaktip'=>$totaldilaktip,'totaldilnonaktip'=>$totaldilnonaktip,));
    return $pdf->download('laporanPDVR.pdf');
}
}

    public function cetaklaporan()
   {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("(COUNT(*)) as jumlah"),'cabang', DB::raw('COUNT(tanggal_tutup) as tanggal_tutup'))
          ->whereBetween('tanggal_tutup',[$start_date,$end_date])
          ->groupBy('cabang')
          ->get();
            $sum = $data->sum(function ($item) {
                return $item->jumlah;
            });
        $diltotal=DB::table('penutupan as a')
        ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
        ->where('status',1)
        ->count();
        $totaldilaktip=DB::table('penutupan as a')
        ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
        ->where('status',1)
        ->count();
        $totaldilnonaktip=DB::table('penutupan as a')
        ->rightJoin('tbl_dil as b','a.id_dil','=','b.id')
        ->where('status',2)
        ->count();

            $pdf = PDF::loadView('coba2', array('data' => $data,'sum'=>$sum,'diltotal'=>$diltotal,'totaldilaktip'=>$totaldilaktip,'totaldilnonaktip'=>$totaldilnonaktip,));
    return $pdf->download('laporanPDVR.pdf');
    }
    } 
    
    
}
