<?php

namespace App\Model\Entity;

use WilliamCosta\DatabaseManager\Database;
use App\Utils\Utilities;
use PDO;

class Cart{

    /**
     * Product id
     * @var integer
     */
    public $id;

    /**
     * Product name
     * @var string
     */
    public $p_name;

    /**
     * Product category
     * @var string
     */
    public $p_category;

    /**
     * Product quantity
     * @var integer
     */
    public $p_qtd;

    /**
     * Product price
     * @var double
     */
    public $p_price;

    public static function list(){

        return (new Database('cart'))->select(null,'id DESC')->fetchAll(PDO::FETCH_OBJ);

    }

    public static function getProductById($id){
        return (new Database('cart'))->select('id = '.$id)->fetchObject(self::class);
    }

    public function insert()
    {
        $this->id = (new Database('cart'))->insert([
            'name' => $this->p_name,
            'category' => $this->p_category,
            'qtd' => $this->p_qtd,
            'price' => $this->p_price,
        ]);

        return true;
    }

    public function update(){
        $values = [
            'name' => $this->p_name,
            'category' => $this->p_category,
            'qtd' => $this->p_qtd,
            'price' => $this->p_price,
        ];
        return (new Database('cart'))->update('id = '.$this->id,$values);
    }

    public function deleteProduct(){

        return (new Database('cart'))->delete('id = ' . $this->id);

    }

}