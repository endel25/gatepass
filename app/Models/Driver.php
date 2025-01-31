<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
       	'FirstName',
		'LastName',
		'PersonType',
		'LicenseNo',
		'DriverPhoto',
		'LicencePhoto',
		'Blacklist',
		'ContactNo',
		'Active',
		'Notes',
		'accounts'
    ];
}
