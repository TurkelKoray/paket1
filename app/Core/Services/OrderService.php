<?php
    namespace App\Core\Services;

    use App\Core\Models\Orders;

    class OrderService
    {
        private $orders;

        public function __construct(Orders $orders)
        {
            $this->orders = $orders;
        }

        public function create(array $data)
        {
            $createData = [
                "product_id" => $data["productId"] ,
                "name"       => $data["orderName"] ,
                "email"      => $data["orderEmail"] ,
                "phone"      => $data["orderPhone"] ,
                "address"    => $data["orderAddress"] ,
                "state"      => 0
            ];
            $this->orders->newModelQuery()->create($createData);
        }

        public function update($id , $data)
        {

        }

        public function delete($id)
        {
            $order            = $this->orders->newModelQuery()->find($id);
            $order['deleted'] = 1;
            $order->save();
        }

        public function destroy($id)
        {
            $order = $this->orders->newModelQuery()->find($id);
            $order->delete();
        }
    }