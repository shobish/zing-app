<?php

namespace Litecms\Employee\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Actions\Traits\Actionable;
use Litepie\Database\Model;
use Litepie\Database\Traits\Scopable;
use Litepie\Database\Traits\Searchable;
use Litepie\Database\Traits\Sluggable;
use Litepie\Database\Traits\Sortable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Trans\Traits\Translatable;
use Litepie\Workflow\Traits\Workflowable;

class Employe extends Model
{
    use Filer;
    use Hashids;
    use Sluggable;
    use SoftDeletes;
    use Sortable;
    use Translatable;
    use Searchable;
    use Scopable;
    use Actionable;
    use Workflowable;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.employee.employe.model';

    /*
     * Get the model that the creator belongs to.
     */
    public function owner()
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }
    
    /**
     * Check if the current user is the owner of the advert.
     *
     * @return bool
     */
    public function getIsOwnerAttribute() : bool
    {
        if ($this->client_id == user_id() && Client::class == user_type()) {
            return true;
        }

        if ($this->user_id == user_id() && $this->user_type == user_type()) {
            return true;
        }
        return false;
    }
    
}
