<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Actions\SendResponse;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Ambil data jawaban esay peserta 
     * yang belum dikoreksi
     * 
     * @return \App\Actions\SendResponse
     * @author <wandinak17@gmail.com>
     */
    public function getExistEsay()
    {
        $user = request()->user('api');
        try {
            // Ambil semua jawaban yang telah dikoreksi
            $has = DB::table('jawaban_esays')
                ->select('jawab_id')
                ->get()
                ->pluck('jawab_id')
                ->unique();

            // Ambil banksoal yang digunakan oleh peserta esay
            $exists = DB::table('jawaban_pesertas')
                ->whereNotIn('jawaban_pesertas.id', $has)
                ->join('soals', 'jawaban_pesertas.soal_id','=','soals.id')
                ->where('soals.tipe_soal', '2')
                ->whereNotNull('jawaban_pesertas.esay')
                ->select('soals.banksoal_id')
                ->get()
                ->pluck('banksoal_id')
                ->unique();

            // Ambil banksoal yang ada
            $banksoal = DB::table('banksoals')
                ->whereIn('banksoals.id', $exists)
                ->join('matpels', 'banksoals.matpel_id', '=', 'matpels.id')
                ->select('banksoals.id', 'banksoals.kode_banksoal','matpels.nama as nama_matpel','matpels.correctors')
                ->get();

            // Filter banksoal untuk mencegah 
            // dari selsain pengoreksi
            $filtered = $banksoal->reject(function ($value, $key) use($user) {
                return !in_array($user->id, json_decode($value->correctors, true));
            });
        } catch (\Exception $e) {
            return SendResponse::internalServerError('Kesalahan 500. '.$e->getMessage());
        }

        return SendResponse::acceptData($filtered);
    }

    /**
     * Ambil data jawaban esay peserta
     * dari banksoal yang diminta
     * 
     * @param int $banksoal_id
     * @return \App\Actions\Sendresponse
     * @author <wandinak17@gmail.com>
     */
    public function getExistEsayByBanksoal($banksoal_id)
    {
        try {
            $banksoal = DB::table('banksoals')
                ->where('id', $banksoal_id)
                ->first();
            if (!$banksoal) {
                return SendResponse::badRequest('Tidak dapat menemukan banksoal yang diminta');
            }

            // Ambil jawaban yang telah dikoreksi
            $has = DB::table('jawaban_esays')
                ->where('banksoal_id', $banksoal->id)
                ->select('jawab_id')
                ->get()
                ->pluck('jawab_id');

            // Jawaban peserta yang belum dikoreksi
            $exists = DB::table('jawaban_pesertas')
                ->whereNotIn('jawaban_pesertas.id', $has)
                ->join('soals', 'jawaban_pesertas.soal_id','=','soals.id')
                ->where('soals.tipe_soal', '2')
                ->whereNotNull('jawaban_pesertas.esay')
                ->where('soals.banksoal_id', $banksoal->id)
                ->select('jawaban_pesertas.id','soals.banksoal_id','soals.audio','jawaban_pesertas.esay','soals.pertanyaan','soals.rujukan')
                ->paginate(30);
        } catch (\Exception $e) {
            return SendResponse::internalServerError('Kesalahan 500. '.$e->getMessage());
        }

        return SendResponse::acceptData($exists);
    }

    /**
     * Simpan nilai esay
     * 
     * @param \Illuminate\Http\Request
     * @return \App\Actions\SendResponse
     * @author <wandinak17@gmail.com>
     */
    public function storeNilaiEsay(Request $request)
    {
        $request->validate([
            'val'   => 'required|numeric|min:0|max:1',
            'id'    => 'required'
        ]);

        $jawab = DB::table('jawaban_pesertas')
            ->where('jawaban_pesertas.id', $request->id)
            ->join('banksoals', 'jawaban_pesertas.banksoal_id', '=', 'banksoals.id')
            ->select('jawaban_pesertas.id', 'jawaban_pesertas.esay','jawaban_pesertas.banksoal_id','jawaban_pesertas.soal_id','jawaban_pesertas.jadwal_id','banksoals.jumlah_soal','banksoals.jumlah_soal_listening','banksoals.jumlah_soal_ganda_kompleks','banksoals.jumlah_isian_singkat','banksoals.jumlah_soal_esay','banksoals.persen','jawaban_pesertas.peserta_id')
            ->first();

        if (!$jawab) {
            return SendResponse::badRequest('Tidak dapat menemukan data yang diminta');
        }

        $user = request()->user('api');

        $has = DB::table('jawaban_esays')
            ->where('banksoal_id', $jawab->banksoal_id)
            ->select('jawab_id')
            ->pluck('jawab_id');

        $sames = DB::table('jawaban_pesertas')
            ->whereNotIn('jawaban_pesertas.id', $has)
            ->where('jawaban_pesertas.esay', $jawab->esay)
            ->where('jawaban_pesertas.banksoal_id', $jawab->banksoal_id)
            ->where('jawaban_pesertas.soal_id', $jawab->soal_id)
            ->join('banksoals', 'jawaban_pesertas.banksoal_id', '=', 'banksoals.id')
            ->select('jawaban_pesertas.id', 'jawaban_pesertas.esay','jawaban_pesertas.banksoal_id','jawaban_pesertas.soal_id','jawaban_pesertas.jadwal_id','banksoals.jumlah_soal','banksoals.jumlah_soal_listening','banksoals.jumlah_soal_ganda_kompleks','banksoals.jumlah_isian_singkat','banksoals.jumlah_soal_esay','banksoals.persen')
            ->get();

        if ($sames->count() > 1) {
            foreach($sames as $same) {
                $hasil = DB::table('hasil_ujians')->where([
                    'banksoal_id'   => $same->banksoal_id,
                    'jadwal_id'     => $same->jadwal_id,
                    'peserta_id'    => $same->peserta_id,
                ])->first();

                // Hitung total pertanyaan
                $pg_jmlh = $same->jumlah_soal;
                $listening_jmlh = $same->jumlah_soal_listening;
                $complex_jmlh = $same->jumlah_soal_ganda_kompleks;
                $isian_singkat_jmlh = $same->jumlah_isian_singkat;
                $jml_esay =  $same->jumlah_soal_esay;

                $persen = json_decode($same->persen,true);
                
                // Hitung hasil listening
                $hasil_listening = 0;
                if($hasil->jumlah_benar_listening > 0) {
                    $hasil_listening = ($hasil->jumlah_benar_listening/$listening_jmlh)*$persen['listening'];
                }

                // Hitung hasil pilihan ganda
                $hasil_pg = 0;
                if($hasil->jumlah_benar > 0) {
                    $hasil_pg = ($hasil->jumlah_benar/$pg_jmlh)*$persen['pilihan_ganda'];
                }

                // Hitung hasil pilihan ganda complex
                $hasil_complex = 0;
                if($hasil->jumlah_benar_complek > 0) {
                    $hasil_complex = ($hasil->jumlah_benar_complek/$complex_jmlh)*$persen['pilihan_ganda_komplek'];
                }

                // Hitung hasil isian singkat
                $hasil_isian_singkat = 0;
                if($hasil->jumlah_benar_isian_singkat > 0) {
                    $hasil_isian_singkat = ($hasil->jumlah_benar_isian_singkat/$isian_singkat_jmlh)*$persen['isian_singkat'];
                }

                $hasil_ganda = $hasil_listening+$hasil_pg+$hasil_complex+$hasil_isian_singkat;

                if($request->val != 0) {
                    $hasil_esay = $hasil->point_esay + ($request->val/$jml_esay);
                } else {
                    $hasil_esay = $hasil->point_esay;
                }

                $hasil_val = ($hasil_ganda)+($hasil_esay*$persen['esay']);

                try {
                    DB::beginTransaction();
                    DB::table('hasil_ujians')
                        ->where('id', $hasil->id)
                        ->update([
                            'point_esay'    => $hasil_esay,
                            'hasil'         => $hasil_val,
                        ]);

                    DB::table('jawaban_esays')->insert([
                        'banksoal_id'   => $same->banksoal_id,
                        'peserta_id'    => $same->peserta_id,
                        'jawab_id'      => $same->id,
                        'corrected_by'  => $user->id,
                        'point'         => $request->val,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);
                    
                    DB::commit();
                    return SendResponse::accept();
                } catch (\Exception $e) {
                    DB::rollBack();
                    return SendResponse::internalServerError('Kesalahan 500.'.$e->getMessage());
                }
            }
        }

        $hasil = DB::table('hasil_ujians')->where([
            'banksoal_id'   => $jawab->banksoal_id,
            'jadwal_id'     => $jawab->jadwal_id,
            'peserta_id'    => $jawab->peserta_id,
        ])->first();

        // Hitung total pertanyaan
        $pg_jmlh = $jawab->jumlah_soal;
        $listening_jmlh = $jawab->jumlah_soal_listening;
        $complex_jmlh = $jawab->jumlah_soal_ganda_kompleks;
        $isian_singkat_jmlh = $jawab->jumlah_isian_singkat;
        $jml_esay =  $jawab->jumlah_soal_esay;

        $persen = json_decode($jawab->persen,true);
        
        // Hitung hasil listening
        $hasil_listening = 0;
        if($hasil->jumlah_benar_listening > 0) {
            $hasil_listening = ($hasil->jumlah_benar_listening/$listening_jmlh)*$persen['listening'];
        }

        // Hitung hasil pilihan ganda
        $hasil_pg = 0;
        if($hasil->jumlah_benar > 0) {
            $hasil_pg = ($hasil->jumlah_benar/$pg_jmlh)*$persen['pilihan_ganda'];
        }

        // Hitung hasil pilihan ganda complex
        $hasil_complex = 0;
        if($hasil->jumlah_benar_complek > 0) {
            $hasil_complex = ($hasil->jumlah_benar_complek/$complex_jmlh)*$persen['pilihan_ganda_komplek'];
        }

        // Hitung hasil isian singkat
        $hasil_isian_singkat = 0;
        if($hasil->jumlah_benar_isian_singkat > 0) {
            $hasil_isian_singkat = ($hasil->jumlah_benar_isian_singkat/$isian_singkat_jmlh)*$persen['isian_singkat'];
        }

        $hasil_ganda = $hasil_listening+$hasil_pg+$hasil_complex+$hasil_isian_singkat;

        if($request->val != 0) {
            $hasil_esay = $hasil->point_esay + ($request->val/$jml_esay);
        } else {
            $hasil_esay = $hasil->point_esay;
        }

        $hasil_val = ($hasil_ganda)+($hasil_esay*$persen['esay']);

        try {
            DB::beginTransaction();
            DB::table('hasil_ujians')
                ->where('id', $hasil->id)
                ->update([
                    'point_esay'    => $hasil_esay,
                    'hasil'         => $hasil_val,
                ]);
            DB::table('jawaban_esays')->insert([
                'banksoal_id'   => $jawab->banksoal_id,
                'peserta_id'    => $jawab->peserta_id,
                'jawab_id'      => $jawab->id,
                'corrected_by'  => $user->id,
                'point'         => $request->val,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
            
            DB::commit();
            return SendResponse::accept();
        } catch (\Exception $e) {
            DB::rollBack();
            return SendResponse::internalServerError('Kesalahan 500.'.$e->getMessage());
        }
    }
}