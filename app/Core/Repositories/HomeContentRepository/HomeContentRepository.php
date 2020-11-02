<?php
    namespace App\Core\Repositories\HomeContentRepository;

    use App\Core\Models\HomeContent;
    use App\Core\Repositories\AbstractRepository;
    use App\Core\Repositories\RepositoryInterface;

    class HomeContentRepository extends AbstractRepository implements RepositoryInterface
    {

        protected function getDefaultModel(): string
        {
            return HomeContent::class;
        }

        public function getHomeContents()
        {
            $result = $this->getQueryInstance()->orderBy("orders","asc")->get();
            return $result;
        }

        public function getTypeHomeContent($type)
        {
            $result = $this->getQueryInstance()->where("type",$type)->orderBy("orders","asc")->get();
            return $result;
        }

    }