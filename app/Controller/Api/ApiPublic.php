<?php

namespace App\Controller\Api;

use App\Model\Entity\Cart as EntityCart;
use App\Utils\Utilities;
use \Exception;

class ApiPublic
{

    /**
     * Method to return all products
     * @param Request $request
     * @return array
     */
    public static function getCart($request)
    {
        $cart = EntityCart::list();

        return $cart;
    }

    public static function setCart($request)
    {
        $postVars = $request->getPostVars();

        $p_name = $postVars['name'];
        $p_category = $postVars['category'];
        $p_qtd = $postVars['qtd'];
        $p_price = $postVars['price'];

        if ($p_price <= 0)
            return false;

        $obCart = new EntityCart;
        $obCart->p_name = $p_name;
        $obCart->p_category = $p_category;
        $obCart->p_qtd = $p_qtd;
        $obCart->p_price = $p_price;

        $obCart->insert();
    }

    public static function updateCart($request, $id)
    {
        $obCart = EntityCart::getProductById($id);

        if (!$obCart instanceof EntityCart)
            return false;

        $postVars = $request->getPostVars();

        $p_name = $postVars['name'];
        $p_category = $postVars['category'];
        $p_qtd = $postVars['qtd'];
        $p_price = $postVars['price'];

        if ($p_price <= 0)
            return false;
            
        $obCart->p_name = $p_name;
        $obCart->p_category = $p_category;
        $obCart->p_qtd = $p_qtd;
        $obCart->p_price = $p_price;

        $obCart->update();
    }

    public static function deleteCart($request, $id)
    {
        $obCart = EntityCart::getProductById($id);

        if (!$obCart instanceof EntityCart)
            return false;

        $obCart->deleteProduct();

        return true;
    }
}
