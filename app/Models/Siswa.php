<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'siswa';

  protected $fillable = ['nis', 'nama', 'jk', 'alamat', 'status_siswa', 'gambar'];
	// protected $dates = ['deleted_at'];
  public static function booted()
  {
    static::creating(function (Model $model) {
      $model->nis = date('ym') . $model->max('id') + 1;
    });
  }
}
