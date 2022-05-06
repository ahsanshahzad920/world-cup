<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Warehouse;
use App\Product;
use App\User;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;
use Spatie\PdfToText\Pdf;
use Validator;
use Illuminate\Support\Facades\Auth;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Imports\StocksImport;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
 
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = Stock::with(['product','warehouse'])->get();
        
        return view('admin.stocks.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();
        $warehouses = Warehouse::all();

        return view('admin.stocks.create',compact('products','warehouses'));
    }

    public function store(Request $request)
    {
         $this->validate($request, [ 
            'id_product' => 'required',
            'id_warehouse' => 'required',   
            'quantity' => 'required',
        ]);
        
        $order = new Stock;
        $order->id_product=$request->id_product;
        $order->id_warehouse=$request->id_warehouse;
        $order->quantity=$request->quantity;
        $order->save();
       
        return redirect()->route('admin.stocks.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $user=Stock::where('id',$id)->first();
        $products = Product::all();
        $warehouses = Warehouse::all();

        return view('admin.stocks.edit', compact('user','products','warehouses'));
    }

    public function update(Request $request,$id)
    {   
        $data = request()->except(['_method','_token']);
        $user=Stock::where('id',$id)->update($data);
        // $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.stocks.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.stocks.show', compact('user'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user=Stock::where('id',$id)->first();
        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function Import(Request $request)
    {
        //dd('sadsa');
        try {
            Excel::import(new StocksImport, request()->file('file'));
           
            return redirect()->back()->with('success', 'File has imported!');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }
}
