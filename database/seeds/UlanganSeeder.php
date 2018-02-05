<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'adzikri','nipd'=>'111','alamat'=>'Ciamis','mata_kuliah'=>'ips'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'ardiansyah','nipd'=>'222','alamat'=>'rancamanyar','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Parantos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $elt = jurusan::create(array(
         	'nama_jurusan'=>'karawitan'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $haris = mahasiswa::create(array(
        'nama_mahasiswa'=> 'haris','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));

        $sendi = mahasiswa::create(array(
        'nama_mahasiswa'=> 'sendi','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));
        $nakhla = mahasiswa::create(array(
        'nama_mahasiswa'=> 'nakhla','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $elt->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');

        wali::create(array(
        'nama'=>'arkan',
        'alamat'=>'cangkuang',
        'id_mahasiswa'=>$haris->id
        ));
        wali::create(array(
        'nama'=>'candra',
        'alamat'=>'bandung',
        'id_mahasiswa'=>$sendi->id
        ));
        wali::create(array(
        'nama'=>'Agung',
        'alamat'=>'ciparay',
        'id_mahasiswa'=>$nakhla->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$ips = matkul::create(array('nama_matkul'=>'ips','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$haris->matkul()->attach($ips->id);
        $haris->matkul()->attach($kimia->id);
		$sendi->matkul()->attach($kimia->id);
		$nakhla->matkul()->attach($ips->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
