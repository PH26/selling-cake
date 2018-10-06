<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}

	}

	public function add($item, $id){
		if($item->promote_price == 0){
			$storedItem = ['qty'=> 0, 'price' => $item->unit_price, 'item' => $item];
		}
		else{
			$storedItem = ['qty'=> 0, 'price' => $item->promote_price, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty']++;
		if($item->promote_price == 0){
			$storedItem['price'] = $item->unit_price * $storedItem['qty'];
		}
		else{
			$storedItem['price'] = $item->promote_price * $storedItem['qty'];
		}
		$this->items[$id] = $storedItem;
		$this->totalQty++;
		if($item->promote_price == 0){
			$this->totalPrice += $item->unit_price;
		}
		else{
			$this->totalPrice += $item->promote_price;
		}

	}

	public function update($id, $qty)
    {
		// $item = $this->get($id);

		// $a=$this->items[1]->promote_price;
        if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty'] = $qty;
		if($storedItem->promote_price == 0){
			$storedItem['price'] = $storedItem->unit_price * $storedItem['qty'];
		}
		else{
			$storedItem['price'] = $storedItem->promote_price * $storedItem['qty'];
		}
		$this->items[$id] = $storedItem;
		$this->totalQty++;
		$totalNew=0;
		foreach($this->items as $item){
			if($item->promote_price == 0){
				$totalNew += $item->unit_price * $storedItem['qty'];
			}
			else{
				$totalNew += $item->promote_price * $storedItem['qty'];
			}
		}
		$this->totalPrice= $totalNew;


	}

	//Delete a product
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//Delete many product
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
