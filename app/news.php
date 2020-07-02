<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $primaryKey = 'id_news';
    protected $table = 'table_news';

    protected $fillable = ['judul_news','potongan_news','isi_news','tgl_news','gambar'];
}
