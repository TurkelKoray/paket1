<?php
    namespace App\Core\Repositories\OrderRepository;

    use App\Core\Models\Orders;
    use App\Core\Repositories\AbstractRepository;

    class OrderRepository extends AbstractRepository
    {

        protected function getDefaultModel(): string
        {
            return Orders::class;
        }

        public function ordersAll()
        {
            return $this->getQueryInstance()->where("state",0)->orderByDesc("id")->paginate(50);
        }

        public function ordersSuccess()
        {
            return $this->getQueryInstance()->where("state",1)->orderByDesc("id")->paginate(50);
        }

        public function ordersCancel()
        {
            return $this->getQueryInstance()->where("state",3)->orderByDesc("id")->paginate(50);
        }


    }