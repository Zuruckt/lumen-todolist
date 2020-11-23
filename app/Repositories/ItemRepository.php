<?php


namespace App\Repositories;


use App\Models\Item;

class ItemRepository
{
    /**
     * @var Item
     */
    private $model;


    /**
     * ItemRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Item();
    }

    public function createItem(array $data)
    {
        $data['user_id'] = auth()->id();
        return $this->model->create($data);
    }

    public function getItems()
    {
        return $this->model->where('user_id', auth()->id())->paginate(15);
    }

}
