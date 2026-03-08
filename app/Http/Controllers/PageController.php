<?php

namespace App\Http\Controllers;

use App\Article;
use App\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /** Метод для отображения главной страницы */
    public function showIndexPage() {
        $h1 = 'Монтаж систем отопления в Воронеже';
        $aobjectController = new AObjectController();
        $objects = $aobjectController->get4Object();
        return view('site.test',[
            'h1' => $h1,
            'title' => 'Монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Наша компания выполнит монтаж систем отопления в Воронеже под ключ в квартире, коттедже или частном доме.',
            'objects' => $objects
        ]);
    }

    public function showIndexTestPage()
    {
        $aobjectController = new AObjectController();
        $objects = $aobjectController->get4Object();
        return view('site.test',[
            'title' => 'Монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Наша компания выполнит монтаж систем отопления в Воронеже под ключ в квартире, коттедже или частном доме.',
            'objects' => $objects
        ]);
    }

    /** Метод для отображения списка объектов */
    public function showObjectsListPage() {
        $h1 = 'НАШИ ОБЪЕКТЫ.';
        $objectsController = new AObjectController();
        $objects = $objectsController->getAllObjects();
        return view('site.objects',[
            'h1' => $h1,
            'title' => 'Выполненные работы по монтажу отопления в коттеджах – компания Аквагарант',
            'description' => 'Выполняем монтаж отопления под ключ в Воронеже. Посмотреть примеры выполненных работ по монтажу отопления в частном доме.',
            'objects' => $objects
        ]);
    }

    /** Метод для отображения страницы объекта */
    public function showObjectPage($id) {
        $aobjectController = new AObjectController();
        $sliderController = new SliderController();
        $object = $aobjectController->getObject($id);
        $slider = $sliderController->getSliderByHash($object->slider_hash);
        return view('site.object',[
            'h1' => $object->name,
            'title' => 'Выполнен монтаж отопления на объекте "' . $object->name .'" – компания Аквагарант',
            'description' => mb_strimwidth(strip_tags($object->content),0,160,'...'),
            'object' => $object,
            'slider' => $slider,
            'topText' => 'Если вы хотели бы заказать монтаж отопления в коттедже, частном доме или квартире как на объекте
            "' . $object->name. '", позвоните по номеру +7(473)251-64-10 или воспользуйтесь формой расчета стоимости.'
        ]);
    }

    /** Метод для отображения списка статей */
    public function showArticlesListPage() {
        $h1 = 'НАШИ СТАТЬИ.';
        $articleController = new ArticleController();
        $articles = $articleController->getAllArticles();
        return view('site.articles',[
            'h1' => $h1,
            'title' => 'Статьи по отоплению, водопроводу и канализации – компания Аквагарант',
            'description' => 'Вы можете прочитать статьи по отоплению, водопроводу и канализации перед тем, как заказать монтаж отопления под ключ в Воронеже',
            'articles' => $articles,
            'topText' => 'Если вы хотели бы заказать монтаж отопления в коттедже, частном доме или квартире, позвоните по номеру +7(473)251-64-10 или воспользуйтесь формой расчета стоимости.'
        ]);
    }

    /** Метод для отображения статьи */
    public function showArticlePage(Article $article) {
        if ($article) {
            $h1 = $article->name;
            return view('site.article',[
                'h1' => $h1,
                'title' => $h1 . ' - компания Аквагарант',
                'description' => mb_strimwidth(strip_tags($article->content),0,160,'...'),
                'article' => $article,
                'topText' => 'Появились вопросы после прочтения нашей статьи "' . $article->name . '"? Позвоните по номеру +7(473)251-64-10 или воспользуйтесь формой расчета стоимости.'
            ]);
        } else {
            abort(404);
        }

    }

    /** Метод для отображения прайс-листа */
    public function showPricePage() {
        $h1 = 'ПРАЙС-ЛИСТ';
        return view('site.price',[
            'h1' => $h1,
            'title' => 'Цены на монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Цены на монтаж отопления и водопровода в Воронеже. Цена на проектирование систем отопления',
        ]);
    }

    /** Метод для отображения страницы контактов */
    public function showContactPage() {
        $h1 = 'КОНТАКТЫ.';
        return view('site.contact',[
            'h1' => $h1,
            'title' => 'Контакты и реквизиты – компания Аквагарант',
            'description' => 'Позвоните по номеру: +7(473)251-64-10 и узнайте подробности о стоимости монтажа и установки систем отопления в компании Аквагарант',
        ]);
    }

    /** Метод для отображения главной страницы магазина */
    public function showShopHeadPage() {
    $h1 = 'ИНТЕРНЕТ-МАГАЗИН';
    $shopCategoriesController = new ShopCategoryController();
    $cats =  $shopCategoriesController->getRootCategory();
        return view('site.shophead',[
            'h1' => $h1,
            'title' => 'Интернет магазин сантехники – компания Аквагарант',
            'description' => 'Тут вы можете купить котлы, радиаторы, водонагреватели и другие товары по отоплению, водопроводу и канализации.',
            'categories' => $cats,
            'topText' => 'Затрудняетесь с выбором комплектующих для отопления, водопровода или канализации? Позвоните по номеру +7(473)251-64-10 и мы поможем вам с выбором.'
        ]);
    }

    /** Метод для отображения страницы категорий магазина */
    public function showCategoryPage() {
        /** Получаем последнюю категорию */
        $uri = preg_replace("~\?.*~",'',$_SERVER['REQUEST_URI']);

        $sections = explode('/',$uri);


         unset($sections[0]);
         unset($sections[1]);
         $categoryController = new ShopCategoryController();
         $categoryData = $categoryController->getCategoryByArray($sections);


         if (!$categoryData) {
             abort(404);
         }
         $h1 = $categoryData['name'];


         $categories = $categoryController->getCategoryByParentId($categoryData['id']);
         if (count($categories) == 0) {
             $itemController = new ItemController();
             $items = $itemController->getItemsByCatId($categoryData['id']);
             $items = $itemController->parseItems($items);

             return view('site.itemlist',[
                 'h1' => $h1,
                'items' => $items,
                 "title" => "Купить \"{$h1}\" в интернет-магазине – компания Аквагарант",
                 "description" => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Большой ассортимент.",
                 "topText" => "Затрудняетесь с выбором товара в категории \"{$h1}\" ? Позвоните по номеру +7(473)251-64-10 и мы поможем вам с выбором."
             ]);
         }
         $url = [];
         foreach ($categories as $category) {
             $url[$category->id] = $categoryController->getUrlByCode($category->parent_id,$category->slug);
         }
        $itemController = new ItemController();
        $items = $itemController->getItemsByCatId($categoryData['id']);
        $items = $itemController->parseItems($items);
        return view('site.categorylist',[
            'h1' => $h1,
            'title' => "Товары в категории \"{$h1}\" - компания Аквагарант",
            'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Большой ассортимент.",
            "topText" => "Затрудняетесь с выбором товара в категории \"{$h1}\" ? Позвоните по номеру +7(473)251-64-10 и мы поможем вам с выбором.",
            'categories' => $categories,
            'urls' => $url,
            'items' => $items,
        ]);

    }

    /** Метод, для отображения страницы товара */
    public function showItemPage(Item $item) {


        $itemControner = new ItemController();
        if (!$item) {
            abort(404);
            die();
        }
         $category = $item->category;
          $categoryController = new ShopCategoryController();

        $h1 = $item->name;
        $subitems = null;
        if ($item->main_item == 1) {
            $subitems = $itemControner->getChildById($item->id);

            return view('site.itempage',[
                'h1' => $h1,
                'item' => $item,
                'subitems' => $subitems,
                'title' => "Купить \"{$h1}\"  – компания Аквагарант",
                'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Качественный товар",
                'topText' => "Интересуют подробности о товаре \"{$h1}\"? Позвоните по номеру +7(473)251-64-10 и мы предоставим вам всю интересующую вас информацию."
            ]);
        } else {
            return view('site.detailitempage',[
                'h1' => $h1,
                'item' => $item,
                'title' => "Купить \"{$h1}\"  – компания Аквагарант",
                'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Качественный товар",
                'topText' => "Интересуют подробности о товаре \"{$h1}\"? Позвоните по номеру +7(473)251-64-10 и мы предоставим вам всю интересующую вас информацию."
            ]);
        }

    }

    /** Метод, для отображения корзины */
    public function showCart() {
        $h1 = 'Корзина';
        return view('site.cart',[
            'h1' => $h1,
            'title' => $h1,
            'description' => 'Монтаж систем отопления. Монтаж котельных.
            Управление отоплением через интернет. Энергосберегающая система отопления Воронеж. Установка котлов. Монтаж отопления в Воронеже',
        ]);
    }

    /** Метод для отображения страницы спасибо за заказ */
    public function showThanks() {
        $h1 = "Успешное оформление заказа.";
        return view('site.thanks',[
            'h1' => $h1,
            'title' => $h1,
            'description' => 'Монтаж систем отопления. Монтаж котельных.
            Управление отоплением через интернет. Энергосберегающая система отопления Воронеж. Установка котлов. Монтаж отопления в Воронеже',
        ]);
    }

    public function showVideo() {
        $h1 = "Видео о нас.";
        return view('site.video',[
            'h1' => $h1,
            'title' => $h1,
            'description' => 'Монтаж систем отопления. Монтаж котельных.
            Управление отоплением через интернет. Энергосберегающая система отопления Воронеж. Установка котлов. Монтаж отопления в Воронеже',
        ]);
    }
}
