<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HasilPE;
use App\Models\Produk;
use App\Models\Peramalan;
use App\Models\Transaksi;

class PeramalanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // Ambil data dari request
        $data = $request->input('product');
        $alpa = $request->input('alpa', 0.2); // Nilai default untuk alpha

        // Hapus data peramalan yang sudah ada
        Peramalan::where('Jenis_Mukena', $data)->delete();

        // Ambil data transaksi bulanan
        $monthlyData = DB::table('transaksis')
            ->select(DB::raw('YEAR(tanggal) as tahun, MONTH(tanggal) as bulan, SUM(Jumlah) as jumlah_data'))
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->where('id_produk', $data)
            ->get();

        // Inisialisasi variabel peramalan
        $alpha = $alpa;
        $forecasts = [];
        $previousForecast = null;

        // Hitung peramalan menggunakan metode Double Exponential Smoothing
        foreach ($monthlyData as $key => $item) {
            if ($key == 0) {
                $forecast = $item->jumlah_data;
            } else {
                $forecast = $alpha * $item->jumlah_data + (1 - $alpha) * $previousForecast;
            }

            $previousForecast = $forecast;
            $forecasts[] = $forecast;
        }

        // Peramalan untuk 3 bulan ke depan
        $lastDataPoint = $monthlyData->last();
        $lastYear = $lastDataPoint->tahun;
        $lastMonth = $lastDataPoint->bulan - 1;
        $nextForecasts = [];

        for ($i = 0; $i < 3; $i++) {
            $lastMonth++;
            if ($lastMonth > 12) {
                $lastMonth = 1;
                $lastYear++;
            }
            $nextForecast = $alpha * $lastDataPoint->jumlah_data + (1 - $alpha) * $previousForecast;
            $previousForecast = $nextForecast;
            $nextForecasts[] = $nextForecast;
        }

        // Menyimpan hasil peramalan dan error ke dalam tabel Peramalan
        foreach ($forecasts as $key => $forecast) {
            $dataPoint = $monthlyData[$key];
            $dataPoint2 = ($key <= 10) ? $monthlyData[$key + 1] : null;
            $bulan = $dataPoint->bulan + 1;
            $tahun = $dataPoint->tahun;
            $namaBulan = date('F', mktime(0, 0, 0, $bulan, 1));
            $error = ($dataPoint2) ? abs($dataPoint2->jumlah_data - $forecast) / $dataPoint2->jumlah_data * 100 : 0;

            // Menyimpan hasil peramalan ke dalam tabel Peramalan
            Peramalan::create([
                'nama_produk' => $data,
                'Bulan' => $namaBulan,
                'Tahun' => $tahun,
                'Jumlah' => $forecast,
                'pe' => $error,
                // 'alpa' => $alpa,,
            ]);
        }

        // Menyimpan peramalan untuk 3 bulan ke depan
        $nextMonth = $lastMonth;
        $nextYear = $lastYear;

        foreach ($nextForecasts as $forecast) {
            if ($nextMonth > 12) {
                $nextMonth = 1;
                $nextYear++;
            }
            $namaBulan = date('F', mktime(0, 0, 0, $nextMonth, 1));

            // Menyimpan hasil peramalan ke dalam tabel Peramalan
            Peramalan::create([
                'nama_produk' => $data,
                'Bulan' => $namaBulan,
                'Tahun' => $nextYear,
                'Jumlah' => $forecast,
                'pe' => 0,
                'alpa' => $alpa,
            ]);

            $nextMonth++;
        }

        // Tampilkan data transaksi bulanan (untuk keperluan debug)
        dd($monthlyData);
    }
    public function index_view(Request $request)
    {
        // dd($request->jenis);

        // Mendapatkan nilai alpa dan jenis dari request
        $alpa = $request->alpa;
        $jenis = $request->jenis;

        // Query berdasarkan nilai alpa dan jenis jika keduanya disertakan dalam request
        $query = Peramalan::query();
        if ($alpa != null && $jenis != null) {
            $peramalan = $query->where('alpa', $alpa)->where('Jenis_Mukena', $jenis)->simplePaginate(10);
        } else {
            $peramalan = $query->simplePaginate(10);
            $alpa = "pilih alpa";
        }

        // Mendapatkan nilai alpa yang mungkin
        $alpaOptions = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9];

        // Mendapatkan semua jenis mukena
        $jenisMukena = Jenis_Mukena::all();

        // Mengirimkan nilai alpa, jenis mukena, dan jenis terpilih ke view
        return view('admin.peramalan.index', compact('peramalan', 'alpaOptions', 'jenisMukena', 'alpa', 'jenis'));
    }

public function index_view2(Request $request){
    // dd($request->jenis);
    // if($request->alpa !=null && $request->jenis !=null){
        $hasilpe=HasilPE::where('alpa',$request->alpa)->where('nama',$request->jenis)->get();
        $rekompe=HasilPE::where('nama',$request->jenis)->orderBy('jumlah_pe','asc')->limit(1)->get();
        // dd($rekompe);
    $peramalan=Peramalan::where('alpa',$request->alpa)->where('Jenis_Mukena',$request->jenis)->simplePaginate(10);
       $alp=$request->alpa;
    // }
    $alpa=[0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9];
    $jenis=Jenis_Mukena::all();
    $jenis2=$request->jenis;
    return view('admin.peramalan.index',compact('peramalan','alpa','jenis','jenis2','alp','hasilpe','rekompe'));
}
public function index_cari(Request $request){
    // dd("o");
    $transaksis = Transaksi::where('id_Jenis', 'like', '%' . $request->cari . '%')->simplePaginate(10);
    $alpa=[0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9];
    // dd($alpa);
    return view('admin.transaksi.index',compact('transaksis','alpa'));
}
public function index_pe($data,$alpa){

    HasilPE::where('nama',$data)->where('alpa',$alpa)->delete();
    // dd($alpa,$data);
$totalPe = Peramalan::where('Jenis_Mukena',$data)->where('alpa',$alpa)
                    ->sum('pe');

$totalData = Peramalan::where('Jenis_Mukena',$data)->where('alpa',$alpa)->where('Tahun',2022)
                    ->count();

                    // dd($totalData);

if ($totalData > 0) {
    $averagePe = $totalPe / $totalData;
} else {
    $averagePe = 0;
}
HasilPE::create([
    'nama'=>$data,
    'alpa'=>$alpa,
    'jumlah_pe'=>$averagePe
]);

// Output nilai rata-rata pe
echo $averagePe;

}
public function grafik($data,$alpa){
//    $data = $data;
    // dd('ok');
    $monthlyData = DB::table('transaksis')
        ->select(DB::raw('YEAR(tanggal) as tahun, MONTH(tanggal) as bulan, SUM(Jumlah) as jumlah_data'))
        ->groupBy('tahun', 'bulan')
        ->orderBy('tahun', 'asc')
        ->orderBy('bulan', 'asc')
        ->where('id_Jenis', $data)
        ->get();

    $dataAktual = [];
    $dataPeramalan = [];
$peramalan = Peramalan::where('Jenis_Mukena', $data)
            ->where('alpa', $alpa)
            ->get();
    foreach ($monthlyData as $index=>$data) {
        $dataAktual[] = $data->jumlah_data;

        $dataPeramalan[] = $peramalan[$index]->Jumlah;
    }
$labels = $monthlyData->pluck('bulan')->map(function ($bulan) {
    return date('F', mktime(0, 0, 0, $bulan, 1));
});
// dd('ok');
    $response = [
        'labels' => $labels,
        'dataAktual' => $dataAktual,
        'dataPeramalan' => $dataPeramalan
    ];

    // dd($response);
    return Response()->json($response);

// Output data gabungan
// print_r($gabungData->toArray());
// dd($gabungData);

}

}
