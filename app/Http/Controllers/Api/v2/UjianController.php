<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\UjianConstant;
use App\Services\Ujian\BenarSalahService;
use App\Services\Ujian\EsayService;
use App\Services\Ujian\IsianSingkatService;
use App\Services\Ujian\MengurutkanService;
use App\Services\Ujian\MenjodohkanService;
use App\Services\Ujian\PilihanGandaKomplekService;
use App\Services\Ujian\PilihanGandaService;
use App\Services\Ujian\SetujuTidakService;
use App\Actions\SendResponse;
use App\Http\Controllers\Controller;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use ShellreanDev\Cache\CacheHandler;
use ShellreanDev\Services\Ujian\UjianService;

/**
 * UjianController
 *
 * @author shellrean <wandinak17@gmail.com>
 * @since 2.0.1 <latte>
 */
class UjianController extends Controller
{
    /**
     * @Route(path="api/v2/ujian", methods={"POST"})
     *
     * Simpan/Update jawaban siswa pada ujian aktif
     *
     * @param Request $request
     * @param UjianService $ujianService
     * @param CacheHandler $cache
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function store(Request $request, UjianService $ujianService, CacheHandler $cache)
    {
        $request->validate([
            'jawaban_id' => 'required',
            'index'     => 'required'
        ]);

        $peserta = request()->get('peserta-auth');

        $find = DB::table('jawaban_pesertas')
            ->where('id', $request->jawaban_id)
            ->first();

        if (!$find) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_ANSWER_FOUND);
        }

        # ambil data siswa ujian
        # yang sedang dikerjakan pada hari ini
        # yang mana jadwal tersebut sedang aktif dan tanggal pengerjaannya hari ini
        $ujian = $ujianService->onProgressToday($peserta->id);

        if (!$ujian) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_UJIAN_FOUND);
        }

        # kurangi waktu ujian
        $ujianService->updateReminingTime($ujian);

        # Jika yang dikirimkan adalah esay
        if(isset($request->essy)) {
            return EsayService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah isian singkat
        if(isset($request->isian)) {
            return IsianSingkatService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah jawaban komleks
        if(is_array($request->jawab_complex)) {
            return PilihanGandaKomplekService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah menjodohkan
        if(isset($request->menjodohkan)) {
            return MenjodohkanService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah mengurutkan
        if(isset($request->mengurutkan)) {
            return MengurutkanService::setJawab($request, $find);
        }

        # jika yang dikirimkan adalah salah/benar
        if(is_array($request->benar_salah)) {
            return BenarSalahService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah setuju/tidak
        if(isset($request->setuju_tidak)) {
            return SetujuTidakService::setJawab($request, $find);
        }

        # Jika yang dikirimkan adalah pilihan ganda
        return PilihanGandaService::setJawab($request, $find);
    }

    /**
     * @Route(path="api/v2/ujian/ragu-ragu", methods={"POST"})
     *
     * Set ragu ragu in siswa
     *
     * @param Request $request
     * @param UjianService $ujianService
     * @param CacheHandler $cache
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function setRagu(Request $request, UjianService $ujianService, CacheHandler $cache)
    {
        $peserta = request()->get('peserta-auth');

        $find = DB::table('jawaban_pesertas')
            ->where('id', $request->jawaban_id)
            ->select('id','banksoal_id','soal_id','jawab','esay','ragu_ragu')
            ->first();

        if (!$find) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_ANSWER_FOUND);
        }

        if(!isset($request->ragu_ragu)) {
            return SendResponse::acceptCustom([
                'data' => ['jawab' => $find->jawab],
                'index' => $request->index
            ]);
        }

        # ambil data siswa ujian
        # yang sedang dikerjakan pada hari ini
        # yang mana jadwal tersebut sedang aktif dan tanggal pengerjaannya hari ini
        $ujian = $ujianService->onProgressToday($peserta->id);

        if (!$ujian) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_UJIAN_FOUND);
        }

        # update sisa waktu ujian
        $ujianService->updateReminingTime($ujian);

        try {
            DB::table('jawaban_pesertas')
                ->where('id', $find->id)
                ->update([
                    'ragu_ragu' => $request->ragu_ragu
                ]);
        } catch (Exception $e) {
            return SendResponse::internalServerError('Terjadi kesalahan 500. '.$e->getMessage());
        }

        return SendResponse::acceptCustom(['data' => ['jawab' => $find->jawab ],'index' => $request->index]);
    }

    /**
     * @Route(path="api/v2/ujian/selesai", methods={"GET"})
     *
     * Selesaikan ujian
     *
     * @param UjianService $ujianService
     * @return \Illuminate\Http\Response
     */
    public function selesai(UjianService $ujianService)
    {
        $peserta = request()->get('peserta-auth');

        # ambil data siswa ujian
        # yang sedang dikerjakan pada hari ini
        # yang mana jadwal tersebut sedang aktif dan tanggal pengerjaannya hari ini
        $ujian = $ujianService->onProgressToday($peserta->id);

        if (!$ujian) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_UJIAN_FOUND);
        }

        # Cek apakah hasil ujian pernah di generate sebelumnya
        $hasilUjian = DB::table('hasil_ujians')
            ->where([
                'peserta_id'    => $peserta->id,
                'jadwal_id'     => $ujian->jadwal_id,
            ])
            ->count();

        if($hasilUjian > 0) {
            try {
                DB::table('siswa_ujians')
                    ->where('id', $ujian->id)
                    ->update([
                        'status_ujian'  => 1
                    ]);

                return SendResponse::badRequest(UjianConstant::WARN_UJIAN_HAS_FINISHED_BEFORE);
            } catch (Exception $e) {
                return SendResponse::internalServerError('Terjadi kesalahan 500. '.$e->getMessage());
            }
        }

        # ambil hanya banksoal untuk jawaban peserta pertama
        $jawaban = DB::table('jawaban_pesertas')
            ->where([
                'jadwal_id'     => $ujian->jadwal_id,
                'peserta_id'    => $peserta->id
            ])
            ->select('banksoal_id')
            ->first();

        if (!$jawaban) {
            return SendResponse::badRequest(UjianConstant::NO_WORKING_UJIAN_FOUND);
        }

        try {
            DB::beginTransaction();

            $ujianService->finishing($jawaban->banksoal_id, $ujian->jadwal_id, $peserta->id);

            DB::table('siswa_ujians')
                ->where('id', $ujian->id)
                ->update([
                    'status_ujian'  => UjianConstant::STATUS_FINISHED,
                ]);
            DB::commit();

            return SendResponse::accept('ujian berhasil diselesaikan');
        } catch (Exception $e) {
            DB::rollback();
            return SendResponse::internalServerError('Terjadi kesalahan 500. '.$e->getMessage());
        }
    }
}

