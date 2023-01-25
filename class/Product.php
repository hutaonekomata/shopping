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
	public $explain;
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
		$this->explain = $data['explain'];
		$this->from = $data['from'];
	}
}
