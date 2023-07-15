<?php

namespace App\Http\Controllers\Anugrah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cluster;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_dc = DB::select('SELECT c.id_cluster,c.tanggal,b.kode_alternatif,c.qty,c.stock  FROM tbl_cluster c  INNER JOIN tbl_barang b ON b.id_alternatif=c.id_alternatif');
        $title = 'Data Cluster';
        return view('data_cluster.list-dc', compact('title', 'res_dc'));
    }

    public function normalisasi()
    {
        $res_normal = DB::select('SELECT * FROM tbl_cluster');
        $title = 'Data Cluster Normalisasi';
        return view('data_cluster.list-normal', compact('title', 'res_normal'));
    }

    public function hitung()
    {
        $data = cluster::all();
        // Inisialisasi centroid awal
        $centroid = [
            ['qty' => 10, 'stock' => 1],
            ['qty' => 90, 'stock' => 1],
            ['qty' => 10, 'stock' => 4]
        ];

        // $k = 5;
        // $numAttributes = 5;

        // // Inisialisasi centroid awal secara acak
        // $centroid = [];
        // for ($i = 0; $i < $k; $i++) {
        //     $centroid[$i] = [];
        //     for ($j = 0; $j < $numAttributes; $j++) {
        //         $centroid[$i][$j] = rand(0, 500);
        //     }
        // }

        // Jumlah klaster
        $k = 3;

        // Inisialisasi hasil klasterisasi
        $clusters = [];

        // Melakukan iterasi hingga konvergen
        $maxIterations = 100;
        $count = 0; // Variabel hitung iterasi
        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            // Mengosongkan klaster pada setiap iterasi
            $clusters = array_fill(0, $k, []);

            // Memasukkan setiap data ke klaster terdekat
            foreach ($data as $point) {
                $minDistance = PHP_INT_MAX;
                $closestCluster = 0;

                // Menghitung jarak ke setiap centroid
                for ($i = 0; $i < $k; $i++) {
                    $distance = sqrt(
                        pow($point['qty'] - $centroid[$i]['qty'], 2) +
                            pow($point['stock'] - $centroid[$i]['stock'], 2)
                    );

                    // Memperbarui centroid terdekat jika ditemukan jarak yang lebih kecil
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $closestCluster = $i;
                    }
                }

                // Memasukkan data ke klaster terdekat
                $clusters[$closestCluster][] = $point;
                $count++; // Menambah hitungan iterasi
            }

            // Memperbarui centroid
            $newCentroid = [];
            foreach ($clusters as $cluster) {
                $numPoints = count($cluster);
                $sumValues = array_fill(0, 2, 0);

                // Menjumlahkan nilai atribut untuk menghitung rata-rata
                foreach ($cluster as $point) {
                    $sumValues[0] += $point['qty'];
                    $sumValues[1] += $point['stock'];
                }

                // Menghitung rata-rata untuk mendapatkan centroid baru
                $newCentroid[] = [
                    'qty' => $sumValues[0] / $numPoints,
                    'stock' => $sumValues[1] / $numPoints,
                ];
            }

            // Memeriksa konvergensi
            $isConverged = true;
            for ($i = 0; $i < $k; $i++) {
                if ($centroid[$i] != $newCentroid[$i]) {
                    $isConverged = false;
                    break;
                }
            }

            // Menghentikan iterasi jika sudah konvergen
            if ($isConverged) {
                break;
            }


            // Memperbarui centroid dengan centroid baru
            $centroid = $newCentroid;
        }

        return view('cluster.clustering')
            ->with('count', $count)
            ->with('clusters', $clusters)
            ->with('centroids', $centroid);
    }
    public function hasil()
    {
        $res_hc = DB::select('SELECT c.id_cluster,c.tanggal,b.kode_alternatif,c.qty,c.stock,c.cluster  FROM cluster_contoh c  INNER JOIN tbl_barang b ON b.id_alternatif=c.id_alternatif');
        $title = '';
        return view('data_cluster.list-hasil', compact('title', 'res_hc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
