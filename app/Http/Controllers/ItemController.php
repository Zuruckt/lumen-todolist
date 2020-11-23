<?php


namespace App\Http\Controllers;


use App\Repositories\ItemRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * @var ItemRepository
     */
    private $repository;

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
            'name' => 'required',
            'due_date' => 'required|date|after:now'
        ]);

        return $this->repository->createItem($request->all());
    }
}
