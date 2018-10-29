<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\OrderDetail;
use DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');

//        validation
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
        ]);
//        image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('upload/products',$imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);
        return redirect('admin/product/index')->with('notification', 'The product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.show',compact('product', 'categories'));
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $formInput=$request->except('image');

        $this->validate($request,[
            'name' => 'sometimes|required',
            'unit_price' => 'sometimes|required',
            'quantity' => 'sometimes|required',
        ]);

//        image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('upload/products',$imageName);
            $formInput['image']=$imageName;
        }
        $product->update($formInput);
        return redirect('admin/product/index')->with('notification','The product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
    	$order = OrderDetail::where('product_id', $product->id)->get();
        if ($order->count() > 0){
            return redirect('admin/product/index')->with('warning', "You can't delete the product because an order has this product!");
        } else {
            Product::destroy($id);
            return redirect('admin/product/index')->with('notification','The product deleted successfully');
        }
    }

    function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="sub-menu" style=" position:relative;">';
            foreach($data as $row){
                $output .= '
                <li><a href="product/'.$row->id.'">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
            }
    }

    public function action(Request $request)
    {
     if($request->ajax()) {
      $output = '';
      $query = $request->get('query');
      if($query != '') {
       $data =Product::where('name', 'LIKE', "%{$query}%")
         ->orwhere('category_id','LIKE',"%{$query}%")
         ->orwhere('unit_price','LIKE',"%{$query}%")
         ->orderBy('id', 'desc')
         ->paginate(5)->appends(['query'=> $query]);
        $total_row = $data->count();

      } else {
        $data = Product::orderBy('id', 'desc')
          ->paginate(5);
        $total_row = DB::table('products')->count();
      }

      if($total_row > 0){
       foreach($data as $row){
        $output .= '
        <tr>
            <td class="center">'.$row->id.'</td>
            <td class="center">'.$row->name.'</td>
            <td class="center">'.$row->categories->name.'</td>
            <td class="center">'.$row->quantity.'</td>
            <td class="center">
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="blue" href="admin/product/show/'.$row->id.'">
                    <i class="ace-icon fa fa-eye bigger-130"></i></a>
                    <a class="green" href="admin/product/edit/'.$row->id.'">
                    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
                    <a class="red" data-productid='.$row->id.' data-toggle="modal" data-target="#delete" title="Delete product">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                </div>
            </td>
        </tr>
        ';


       }
     } else {
         $output = '
         <tr>
          <td align="center" colspan="5">No Data Found</td>
         </tr>
         ';
    }
      $products = array(
       'table_data'  => $output,
       'total_data'  => $total_row,
       'datas' => $data
      );
      // dd($data);
      echo json_encode($products);
     }
   }
}