<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices'; 
    public $timestamps = true; 

    protected $fillable = [
        'user_agent', 'primary_hardware_type', 'os_version',
        'vendor', 'browser_name', 'model', 'os_name', 'browser_rendering_engine'
    ];
}