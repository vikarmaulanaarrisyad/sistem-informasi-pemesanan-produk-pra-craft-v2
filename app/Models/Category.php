<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function statusColor()
    {
        $color = '';

        switch ($this->status) {
            case 'publish':
                $color = 'success';
                break;
            case 'archived':
                $color = 'dark';
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
            case 'publish':
                $text = 'Ditampilkan';
                break;
            case 'archived':
                $text = 'Diarsipkan';
                break;
            default:
                break;
        }

        return $text;
    }
}
