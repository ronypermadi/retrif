<?php

namespace App\Http\View;

use Illuminate\View\View;

class CartComposer
{
    private function getCarts(){
        $carts = json_decode(request()->cookie('my-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function compose(View $view)
    {
      $carts = collect($this->getCarts());
      $mycart = $carts->count();

        $view->with('mycart', $mycart);
    }
}