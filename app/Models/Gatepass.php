<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gatepass extends Model
{
    use HasFactory;

     protected $fillable = [
        'GatepassEntryTime',
        'GatepassExitTime',
        'GatepassType',
        'VehicleNo',
        'Transporter',
        'DriverName',
        'LicenseNo',
        'DriverNote',
        'TareWeight',
        'GrossWeight',
        'NetWeight',
        'UserId',
        'Notes',
        'Status',
        'ApprovedBy',
        
    ];



}
