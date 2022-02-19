<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use App\Charts\TodoLineChart;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        $todoschart = $this->getChartData();
        return view('todos.index', compact('todos','todoschart'));
    }

    public function create()
    {
        
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
       $todo = auth()->user()->todos()->create($request->all());
       return redirect(route('todo.index'))->with('message', 'Todo Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title,'description'=>$request->description]);
        return redirect(route('todo.index'))->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted!');
    }

    public function getChartData() {
        $fromDate = Carbon::now()->subMinutes(60);
        $toDate = Carbon::now();

        $todoschart = new TodoLineChart;
        $chartData = auth()->user()->todos()->where('completed', 0)->whereBetween('created_at', [$fromDate, $toDate])->get()->pluck('created_at')->toArray();
        $arr = [];
        foreach ($chartData as $k => $c) {
            $add = $k + 1;
            array_push($arr, $add);
        }
        $todoschart->labels($chartData);
        $todoschart->dataset('New Pending Todo', 'line', $arr)
        ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1)
            ->dashed([5]);
        return $todoschart;
    }
}
