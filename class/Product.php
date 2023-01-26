<?php
class Product
{
	public $id;
	public $name;
	public $bug;
	public $type;
	public $price;
	public $expiration;
	public $stock;
	public $about;
	public $from;

	public function __construct($data)
	{
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->bug = $data['bug'];
		$this->type = $data['type'];
		$this->price = $data['price'];
		$this->expiration = $data['expiration'];
		$this->stock = $data['stock'];
		$this->about = $data['about'];
		$this->from = $data['from'];
	}
}