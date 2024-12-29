<?php

namespace App\Repository\Eloquent;

use App\Models\Banner;
use App\Models\Color;

/**
 * Class BrandRepository
 * @package App\Repositories\Eloquent
 */
class BannerRepository extends BaseRepository
{
    /**
     * BrandRepository constructor.
     *
     * @param Banner $brand
     */
    public function __construct(Banner $brand)
    {
        parent::__construct($brand);
    }
}

?>
