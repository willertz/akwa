<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AObject;
use App\Models\Article;
use App\Models\Item;
use App\Models\ShopCategory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private const string CONTACT_PHONE = '+7(473)251-64-10';

    private const string CONTACT_CTA = 'Позвоните по номеру '.self::CONTACT_PHONE.' или воспользуйтесь формой расчета стоимости.';

    private const string DEFAULT_META_DESCRIPTION = 'Монтаж систем отопления. Монтаж котельных. Управление отоплением через интернет. Энергосберегающая система отопления Воронеж. Установка котлов. Монтаж отопления в Воронеже';

    /** Метод для отображения главной страницы */
    public function showIndexPage(): View
    {
        return view('site.index', [
            'h1' => 'Монтаж систем отопления в Воронеже',
            'title' => 'Монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Наша компания выполнит монтаж систем отопления в Воронеже под ключ в квартире, коттедже или частном доме.',
            'objects' => AObject::select('id', 'name', 'preview_pict')->getLatest4()->get(),
        ]);
    }

    public function showIndexTestPage(): View
    {
        return view('site.test', [
            'title' => 'Монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Наша компания выполнит монтаж систем отопления в Воронеже под ключ в квартире, коттедже или частном доме.',
            'objects' => AObject::getLatest4()->get(),
        ]);
    }

    /** Метод для отображения списка объектов */
    public function showObjectsListPage(): View
    {
        return view('site.objects', [
            'h1' => 'НАШИ ОБЪЕКТЫ.',
            'title' => 'Выполненные работы по монтажу отопления в коттеджах – компания Аквагарант',
            'description' => 'Выполняем монтаж отопления под ключ в Воронеже. Посмотреть примеры выполненных работ по монтажу отопления в частном доме.',
            'objects' => AObject::orderBy('id', 'desc')->get(),
        ]);
    }

    /** Метод для отображения страницы объекта */
    public function showObjectPage(AObject $aObject): View
    {
        return view('site.object', [
            'h1' => $aObject->name,
            'title' => 'Выполнен монтаж отопления на объекте "'.$aObject->name.'" – компания Аквагарант',
            'description' => mb_strimwidth(strip_tags((string) $aObject->content), 0, 160, '...'),
            'object' => $aObject,
            'slider' => $aObject->getSliderUrls(),
            'topText' => 'Если вы хотели бы заказать монтаж отопления в коттедже, частном доме или квартире как на объекте "'.$aObject->name.'", '.self::CONTACT_CTA,
        ]);
    }

    /** Метод для отображения списка статей */
    public function showArticlesListPage(): View
    {
        return view('site.articles', [
            'h1' => 'НАШИ СТАТЬИ.',
            'title' => 'Статьи по отоплению, водопроводу и канализации – компания Аквагарант',
            'description' => 'Вы можете прочитать статьи по отоплению, водопроводу и канализации перед тем, как заказать монтаж отопления под ключ в Воронеже',
            'articles' => Article::orderBy('id', 'desc')->get(),
            'topText' => 'Если вы хотели бы заказать монтаж отопления в коттедже, частном доме или квартире, '.self::CONTACT_CTA,
        ]);
    }

    /** Метод для отображения статьи */
    public function showArticlePage(Article $article): View
    {
        $h1 = $article->name;

        return view('site.article', [
            'h1' => $h1,
            'title' => $h1.' - компания Аквагарант',
            'description' => mb_strimwidth(strip_tags((string) $article->content), 0, 160, '...'),
            'article' => $article,
            'topText' => 'Появились вопросы после прочтения нашей статьи "'.$article->name.'"? '.self::CONTACT_CTA,
        ]);
    }

    /** Метод для отображения прайс-листа */
    public function showPricePage(): View
    {
        return view('site.price', [
            'h1' => 'ПРАЙС-ЛИСТ',
            'title' => 'Цены на монтаж отопления в Воронеже – компания Аквагарант',
            'description' => 'Цены на монтаж отопления и водопровода в Воронеже. Цена на проектирование систем отопления',
        ]);
    }

    /** Метод для отображения страницы контактов */
    public function showContactPage(): View
    {
        return view('site.contact', [
            'h1' => 'КОНТАКТЫ.',
            'title' => 'Контакты и реквизиты – компания Аквагарант',
            'description' => 'Позвоните по номеру: '.self::CONTACT_PHONE.' и узнайте подробности о стоимости монтажа и установки систем отопления в компании Аквагарант',
        ]);
    }

    /** Метод для отображения главной страницы магазина */
    public function showShopHeadPage(): View
    {
        return view('site.shophead', [
            'h1' => 'ИНТЕРНЕТ-МАГАЗИН',
            'title' => 'Интернет магазин сантехники – компания Аквагарант',
            'description' => 'Тут вы можете купить котлы, радиаторы, водонагреватели и другие товары по отоплению, водопроводу и канализации.',
            'categories' => ShopCategory::getRootCategories(),
            'topText' => 'Затрудняетесь с выбором комплектующих для отопления, водопровода или канализации? Позвоните по номеру '.self::CONTACT_PHONE.' и мы поможем вам с выбором.',
        ]);
    }

    /** Метод для отображения страницы категорий магазина */
    public function showCategoryPage(string $any): View
    {
        $path = explode('/', $any);
        $category = ShopCategory::resolveByPath($path);

        if (! $category instanceof ShopCategory) {
            abort(404);
        }

        $h1 = $category->name;
        $itemsGrouped = Item::getGroupedByCategory($category->id);

        if ($category->children->isEmpty()) {
            return view('site.itemlist', [
                'h1' => $h1,
                'items' => $itemsGrouped,
                'title' => "Купить \"{$h1}\" в интернет-магазине – компания Аквагарант",
                'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Большой ассортимент.",
                'topText' => "Затрудняетесь с выбором товара в категории \"{$h1}\" ? Позвоните по номеру ".self::CONTACT_PHONE.' и мы поможем вам с выбором.',
            ]);
        }

        return view('site.categorylist', [
            'h1' => $h1,
            'title' => "Товары в категории \"{$h1}\" - компания Аквагарант",
            'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Большой ассортимент.",
            'topText' => "Затрудняетесь с выбором товара в категории \"{$h1}\" ? Позвоните по номеру ".self::CONTACT_PHONE.' и мы поможем вам с выбором.',
            'categories' => $category->children,
            'urls' => $category->children->mapWithKeys(fn ($child): array => [$child->id => $child->getUrl()]),
            'items' => $itemsGrouped,
        ]);
    }

    /** Метод, для отображения страницы товара */
    public function showItemPage(Item $item): View
    {
        $h1 = $item->name;
        $commonData = [
            'h1' => $h1,
            'item' => $item,
            'title' => "Купить \"{$h1}\"  – компания Аквагарант",
            'description' => "Купить \"{$h1}\" в интернет-магазине. Выгодные цены. Качественный товар",
            'topText' => "Интересуют подробности о товаре \"{$h1}\"? Позвоните по номеру ".self::CONTACT_PHONE.' и мы предоставим вам всю интересующую вас информацию.',
        ];

        if ($item->main_item == 1) {
            return view('site.itempage', array_merge($commonData, [
                'subitems' => $item->children,
            ]));
        }

        return view('site.detailitempage', $commonData);
    }

    /** Метод, для отображения корзины */
    public function showCart(): View
    {
        $h1 = 'Корзина';

        return view('site.cart', [
            'h1' => $h1,
            'title' => $h1,
            'description' => self::DEFAULT_META_DESCRIPTION,
        ]);
    }

    /** Метод для отображения страницы спасибо за заказ */
    public function showThanks(): View
    {
        $h1 = 'Успешное оформление заказа.';

        return view('site.thanks', [
            'h1' => $h1,
            'title' => $h1,
            'description' => self::DEFAULT_META_DESCRIPTION,
        ]);
    }

    public function showVideo(): View
    {
        $h1 = 'Видео о нас.';

        return view('site.video', [
            'h1' => $h1,
            'title' => $h1,
            'description' => self::DEFAULT_META_DESCRIPTION,
        ]);
    }
}
