<?php
    namespace App\Http\Controllers;

    use App\Core\Repositories\OrderRepository\OrderRepository;
    use App\Core\Services\OrderService;
    use Illuminate\Support\Facades\Session;

    class OrderController extends Controller
    {
        const SUCCESS = 1;
        const ERROR = 0;
        public function index(OrderRepository $orderRepository)
        {
            $orders = $orderRepository->ordersAll();
            return view("admin.order.index",compact("orders"));
        }

        public function orderSuccess(OrderRepository $orderRepository)
        {
            $orders = $orderRepository->ordersSuccess();
            return view("admin.order.success-order-list",compact("orders"));
        }

        public function orderCancel(OrderRepository $orderRepository)
        {
            $orders = $orderRepository->ordersCancel();
            return view("admin.order.cancel-order-list",compact("orders"));
        }

        public function success($id,OrderService $orderService)
        {
            $orderService->success($id);
            Session::flash("durum" , self::SUCCESS);
            return redirect("admin/orders/index");
        }

        public function cancel($id,OrderService $orderService)
        {
            $orderService->cancel($id);
            Session::flash("durum" , self::SUCCESS);
            return redirect("admin/orders/index");
        }

        public function delete($id,OrderService $orderService)
        {
            $orderService->delete($id);
            return $this->response();
        }


    }