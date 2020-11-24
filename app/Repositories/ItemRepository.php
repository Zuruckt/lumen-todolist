<?php


namespace App\Repositories;


use App\Models\Item;

class ItemRepository
{
    /**
     * @var Item
     */
    private Item $model;


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

    public function updateItem(array $data, int $id)
    {
        $item = $this->model->find($id);

        if (!\Gate::allows('update-item', $item)) {
            return $this->respondUnauthorized();
        }

        return $item->update($data);
    }

    public function deleteItem(int $id)
    {
        $item = $this->model->find($id);

        if (!\Gate::allows('delete-item', $item)) {
            return $this->respondUnauthorized();
        }

        return $item->delete();
    }

    private function respondUnauthorized()
    {
        return response()->json(['message' => 'That item does not belong to the current authenticated user.'], 401);
    }
}
