<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	public $thanhtien = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->thanhtien = $oldCart->thanhtien;
		}
	}

	public function add($item, $id){
        if($item->giagiam==0)
        {
            $giohang = ['qty'=>0, 'price' => $item->dongia, 'item' => $item];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $giohang = $this->items[$id];
                }
            }
            $giohang['qty']++;
            $giohang['price'] = $item->dongia * $giohang['qty'];
            $this->items[$id] = $giohang;
            $this->totalQty++;
            $this->totalPrice += $item->dongia;
			$this->thanhtien = $giohang['price'];
            }
		else
        {
            $giohang = ['qty'=>0, 'price' => $item->giagiam, 'item' => $item];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $giohang = $this->items[$id];
                }
            }
            $giohang['qty']++;
            $giohang['price'] = $item->giagiam * $giohang['qty'];
            $this->items[$id] = $giohang;
            $this->totalQty++;
            $this->totalPrice += $item->giagiam;
			$this->thanhtien = $giohang['price'];
            }

	}
    public function update($item, $id,$quantity_new)
    {
        if($item->giagiam==0)
        {
            $giohang = ['qty'=>0, 'price' => $item->dongia, 'item' => $item];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $giohang = $this->items[$id];
                }
            }
            $giohang['qty']=$quantity_new;
            $giohang['price'] = $item->dongia * $giohang['qty'];
            $this->items[$id] = $giohang;
            $this->totalQty++;
            $this->totalPrice +=  $giohang['price'];
			$this->thanhtien =  $giohang['price'];
            }
        else
        {
            $giohang = ['qty'=>0, 'price' => $item->giagiam, 'item' => $item];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $giohang = $this->items[$id];
                }
            }
            $giohang['qty']=$quantity_new;
            $giohang['price'] = $item->giagiam * $giohang['qty'];
            $this->items[$id] = $giohang;
            $this->totalQty++;
            $this->totalPrice +=  $giohang['price'];
        }
    }
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
