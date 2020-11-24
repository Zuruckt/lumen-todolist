<?php


namespace App\Http\Controllers;


use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * @var ItemRepository
     */
    private ItemRepository $repository;

    /**
     * ItemController constructor.
     * @param ItemRepository $repository
     */
    public function __construct(ItemRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return $this->repository->getItems();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date|after:now',
            'done' => 'sometimes|boolean'
        ]);

        return $this->repository->createItem($request->all());
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'due_date' => 'sometimes|date|after:now',
            'done' => 'sometimes|boolean'
        ]);

        return $this->repository->updateItem($request->all(), $id);
    }

    public function delete(int $id)
    {
        return $this->repository->deleteItem($id);
    }

}
