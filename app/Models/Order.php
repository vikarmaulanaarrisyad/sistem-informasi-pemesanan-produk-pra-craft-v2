<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function statusColor()
    {
        $color = '';

        switch ($this->status) {
            case 'submit':
                $color = 'warning';
                break;
            case 'process':
                $color = 'info';
                break;
            case 'finish':
                $color = 'success';
                break;
            case 'cancel':
                $color = 'danger';
                break;
            default:
                break;
        }

        return $color;
    }
    public function statusText()
    {
        $text = '';

        switch ($this->status) {
            case 'submit':
                $text = 'Submit';
                break;
            case 'process':
                $text = 'Proses';
                break;
            case 'finish':
                $text = 'Selesai';
                break;
            case 'cancel':
                $text = 'Batal';
                break;
            default:
                break;
        }

        return $text;
    }
}
