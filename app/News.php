<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property string $meta_title
 * @property string $meta_description
*/
class News extends Model
{
    use SoftDeletes;

    
    protected $table = "news";
    
    protected $fillable = ['title', 'description', 'meta_title', 'meta_description'];
    

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'description' => 'max:65535|required',
            'meta_title' => 'max:191|nullable',
            'meta_description' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'description' => 'max:65535|required',
            'meta_title' => 'max:191|nullable',
            'meta_description' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
