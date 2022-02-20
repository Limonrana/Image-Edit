<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pageoption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'page', 'option', 'option_value',
    ];

    /**
     * This static function that are find appearance field.
     *
     * @var array
     */
    public static function getAppearance($option, $page= 'all', $default = null)
    {
        $appearance = self::where('page', $page)->where('option', $option)->first();
        return isset($appearance) ? $appearance : $default;
    }

    /**
     * This static function that are find page section field.
     *
     * @var array
     */
    public static function getPageSection($page, $option, $default)
    {
        $page_section = self::where('page', $page)->where('option', $option)->first();
        return isset($page_section) ? $page_section->option_value : $default;
    }
}
