<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\PostComment;
use App\Rules\MatchOldPassword;
use Hash;
class HomeController extends Controller
{
    /**
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('user.index');
    }
    public function profile(){
        $profile=Auth()->user();
        return view('user.users.profile')->with('profile',$profile);
    }
    public function profileUpdate(Request $request,$id){
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Profil başarıyla güncellendi!');
        }
        else{
            request()->session()->flash('error','Lütfen daha sonra tekrar deneyin!');
        }
        return redirect()->back();
    }
    // Sipariş
    public function orderIndex(){
        $orders=Order::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders',$orders);
    }
    public function userOrderDelete($id)
    {
        $order=Order::find($id);
        if($order){
           if($order->status=="process" || $order->status=='delivered' || $order->status=='cancel'){
                return redirect()->back()->with('error','Bu siparişi şuan silemezsiniz!');
           }
           else{
                $status=$order->delete();
                if($status){
                    request()->session()->flash('success','Sipariş başarıyla silindi!');
                }
                else{
                    request()->session()->flash('error','Sipariş silinemedi!');
                }
                return redirect()->route('user.order.index');
           }
        }
        else{
            request()->session()->flash('error','Sipariş bulunamadı!');
            return redirect()->back();
        }
    }
    public function orderShow($id)
    {
        $order=Order::find($id);
        return view('user.order.show')->with('order',$order);
    }
    // Ürün Değerlendirmesi
    public function productReviewIndex(){
        $reviews=ProductReview::getAllUserReview();
        return view('user.review.index')->with('reviews',$reviews);
    }
    public function productReviewEdit($id)
    {
        $review=ProductReview::find($id);
        return view('user.review.edit')->with('review',$review);
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewUpdate(Request $request, $id)
    {
        $review=ProductReview::find($id);
        if($review){
            $data=$request->all();
            $status=$review->fill($data)->update();
            if($status){
                request()->session()->flash('success','Yorum güncellendi!');
            }
            else{
                request()->session()->flash('error','Bir şeyler ters gitti! Lütfen tekrar deneyin!');
            }
        }
        else{
            request()->session()->flash('error','Yorum bulunamadı!');
        }
        return redirect()->route('user.productreview.index');
    }
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewDelete($id)
    {
        $review=ProductReview::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success','Yorum silindi');
        }
        else{
            request()->session()->flash('error','Bir şeyler ters gitti! Lütfen tekrar deneyin!');
        }
        return redirect()->route('user.productreview.index');
    }
    public function userComment()
    {
        $comments=PostComment::getAllUserComments();
        return view('user.comment.index')->with('comments',$comments);
    }
    public function userCommentDelete($id){
        $comment=PostComment::find($id);
        if($comment){
            $status=$comment->delete();
            if($status){
                request()->session()->flash('success','Ürün yorumu silindi');
            }
            else{
                request()->session()->flash('error','Bir şeyler ters gitti! Lütfen tekrar deneyin!');
            }
            return back();
        }
        else{
            request()->session()->flash('error','Ürün yorumu bulunamadı!');
            return redirect()->back();
        }
    }
    public function userCommentEdit($id)
    {
        $comments=PostComment::find($id);
        if($comments){
            return view('user.comment.edit')->with('comment',$comments);
        }
        else{
            request()->session()->flash('error','Ürün yorumu bulunamadı!');
            return redirect()->back();
        }
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCommentUpdate(Request $request, $id)
    {
        $comment=PostComment::find($id);
        if($comment){
            $data=$request->all();
            $status=$comment->fill($data)->update();
            if($status){
                request()->session()->flash('success','Yorum güncellendi');
            }
            else{
                request()->session()->flash('error','Bir şeyler ters gitti! Lütfen tekrar deneyin!');
            }
            return redirect()->route('user.post-comment.index');
        }
        else{
            request()->session()->flash('error','Yorum bulunamadı');
            return redirect()->back();
        }
    }
    public function changePassword(){
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->route('user')->with('success','Şifre başarıyla güncellendi!');
    }
}
