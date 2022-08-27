<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Appointment extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'names','status', 'phone', 'plateNumber', 'carModel','cost','Service', 'AdditionalService','carwashdate', 'email'
     ];
     protected $table='appointment';  
    }