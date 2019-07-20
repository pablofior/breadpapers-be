<?php

namespace App\Presenters;

use App\Transformers\BreadpaperTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BreadpaperPresenter.
 *
 * @package namespace App\Presenters;
 */
class BreadpaperPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BreadpaperTransformer();
    }
}
