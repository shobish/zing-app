<?php

namespace Litecms\Employee\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Sluggable;
use Litepie\Database\Traits\Sortable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Database\Traits\Scopable;
use Litepie\Trans\Traits\Translatable;

class Employee extends Model
{
    use Filer;
    use Hashids;
    use Sluggable;
    use SoftDeletes;
    use Sortable;
    use Translatable;
    use Scopable;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.employee.employee.model';


    /**
     * The array of searchable fields.
     * 
     * @var array
     */
    public $search = 'litecms.employee.employee.model.search';


}
