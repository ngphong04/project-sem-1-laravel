<?php
namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];

    }
    // phương thức lấy về danh sách sản phẩm trong giỏ hàng
    public function list()
    {
        return $this->items;
    }
    // thêm mới sản phẩm vào giỏ hàng
    public function add($product, $quantity = 1, $size = null)
    {
        $item = [
            'productId' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
            'size' => $size
        ];
        $this->items[$product->id] = $item;
        session(['cart' => $this->items]);
    }


    // cập nhật giỏ hàng
    public function update($id, $quantity)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }

    // xóa sản phẩm khỏi giỏ hàng 
    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    // xóa hết sản phẩm khỏi giỏ hàng
    public function clear()
    {
        session(['cart' => []]);
    }
    // phương thức tính tổng số tiền

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;

    }
    // phương thức tính tổng số sản phẩm trong giỏ hàng
    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['quantity'];
        }

        return $total;

    }
}
