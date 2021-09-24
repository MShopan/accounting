<?php

namespace App\Models;
use App\Models\Partition;
use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'partition_id',
        'trait',
        'status',
        'bill_id',
        'charis',
        'table',
        'employee_id',
        'done',
        'prepaid',
        'creator',
        'last_bill_id',
        'notes',
        'created_at',
        'updated_at',
    ];


    public function partition()
    {
        return $this->belongsTo(Partition::class, 'id', 'partition_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id', 'partition_id');
    }
}
