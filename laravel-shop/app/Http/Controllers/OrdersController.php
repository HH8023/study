<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\ProductSku;
use App\Models\UserAddress;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jobs\CloseOrder;
use App\Services\CartService;
use App\Services\OrderService;

class OrdersController extends Controller
{
    //利用laravel的自动解析功能注入CartService类
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        //开启一个数据库事务
        /*$order = DB::transaction(function () use ($user, $request, $cartService) {
            $address = UserAddress::find($request->input('address_id'));
            //更新此地址后最后使用时间
            $address->update(['last_used_at' => Carbon::now()]);
            //创建一个订单
            $order = new Order([
                'address' => [  //将地址信息放入订单中
                    'address' => $address->full_address,
                    'zip' => $address->zip,
                    'contact_name' => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ],
                'remark' => $request->input('remark'),
                'total_amount' => 0,
            ]);
            //订单关联到当前用户
            $order->user()->associate($user);
            //写入数据库
            $order->save();

            $totalAmount = 0;
            $items = $request->input('items');
            //遍历用户提交的SKU
            foreach ($items as $data) {
                $sku = ProductSku::find($data['sku_id']);
                //创建一个OrderItem并直接与当前订单关联
                $item = $order->items()->make([
                    'amount' => $data['amount'],
                    'price' => $sku->price,
                ]);
                $item->product()->associate($sku->product_id);
                $item->productSku()->associate($sku);
                $item->save();
                $totalAmount += $sku->price * $data['amount'];
                if ($sku->decreaseStock($data['amount']) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }

            //更新订单总金额
            $order->update(['total_amount' => $totalAmount]);

            //将下单的商品从购物车中移除
//            $skuIds = collect($items)->pluck('sku_id');
//            $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
            $skuIds = collect($request->input('items'))->pluck('sku_id')->all();
            $cartService->remove($skuIds);

            return $order;
        });

        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));
        return $order;*/

        $address = UserAddress::find($request->input('address_id'));
        return $orderService->store($user,$address,$request->input('remark'),$request->input('items'));
    }

    //用户端的订单列表页
    public function index(Request $request)
    {
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }
}





