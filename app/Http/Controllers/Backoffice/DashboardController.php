<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Enums\OrderStatus;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            $categories = Category::count();

            $suppliers = Supplier::count();

            $products = Product::count();

            $customers = User::count();

            $transactions = TransactionDetail::sum('quantity');

            $transactionThisMonth = TransactionDetail::whereMonth('created_at', date('m'))->sum('quantity');

            $productsOutStock = Product::where('quantity', '<=', 10)->paginate(5);

            $orders = Order::where('status', OrderStatus::Pending)->get();

            $bestProduct = DB::table('transaction_details')
                            ->addSelect(DB::raw('products.name as name, sum(transaction_details.quantity) as total'))
                            ->join('products', 'products.id', 'transaction_details.product_id')
                            ->groupBy('transaction_details.product_id')
                            ->orderBy('total', 'DESC')
                            ->limit(5)->get();

            $label = [];

            $total = [];

            if(count($bestProduct)){
                foreach($bestProduct as $data){
                    $label[] = $data->name;
                    $total[] = (int) $data->total;
                }
            }else{
                $label[] = '';
                $total[] = '';
            }

            return view('backoffice.dashboard', compact('categories', 'suppliers', 'products', 'customers', 'transactions', 'transactionThisMonth', 'productsOutStock', 'orders', 'label', 'total'));
        }else{
            $orders = Order::where('user_id', $request->user()->id)->get();


            $transactions = Transaction::where('user_id', $request->user()->id)->get();

            return view('backoffice.dashboard', compact('orders', 'transactions'));
        }
    }
}