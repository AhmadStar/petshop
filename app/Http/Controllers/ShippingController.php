<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Coupon;
class ShippingController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping=Shipping::orderBy('id','DESC')->paginate(10);
        return view('backend.shipping.index')->with('shippings',$shipping);
    }
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping.create');
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=Shipping::create($data);
        if($status){
            request()->session()->flash('success','Kargo başarıyla oluşturuldu!');
        }
        else{
            request()->session()->flash('error','Hata, Lütfen daha sonra tekrar deneyin!');
        }
        return redirect()->route('shipping.index');
    }
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping=Shipping::find($id);
        if(!$shipping){
            request()->session()->flash('error','Kargo bulunamadı');
        }
        return view('backend.shipping.edit')->with('shipping',$shipping);
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shipping=Shipping::find($id);
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=$shipping->fill($data)->save();
        if($status){
            request()->session()->flash('success','Kargo güncellendi');
        }
        else{
            request()->session()->flash('error','Lütfen daha sonra tekrar deneyin!');
        }
        return redirect()->route('shipping.index');
    }
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping=Shipping::find($id);
        if($shipping){
            $status=$shipping->delete();
            if($status){
                request()->session()->flash('success','Kargo silindi!');
            }
            else{
                request()->session()->flash('error','Lütfen daha sonra tekrar deneyin!');
            }
            return redirect()->route('shipping.index');
        }
        else{
            request()->session()->flash('error','Kargo bulunamadı');
            return redirect()->back();
        }
    }
}
