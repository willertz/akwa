<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse|null
    {
        $method = empty($request->input('apiMethod')) ? null : $request->input('apiMethod');
        switch ($method) {
            case 'sendMail':
                $this->sendMessage($request);

                return redirect('/');
            case 'sendCart':
                $this->sendCart($request);
                break;
            case 'loadItem':
                $this->loadItem($request);
                break;
            case 'saveItem':
                $this->saveItem($request);
                break;
            case 'deleteItem':
                $this->deleteItem($request);
                break;
            case 'loadCat':
                $this->loadCat();
                break;
            case 'addNewCat':
                $this->addNewCat($request);
                break;
            case 'deleteCat':
                $this->deleteCategory($request);
                break;
            case 'loadSingleCat':
                $this->loadSingleCat($request);
                break;
            case 'updateCat':
                $this->updateCategory($request);
                break;
            case 'saveNewItem':
                $this->saveNewItem(app(\App\Http\Requests\ItemRequest::class));
                break;
            case 'loadAllArticle':
                $this->loadAllArticle();
                break;
            case 'loadAllObj':
                $this->loadAllObjects();
                break;
            case 'loadNotice':
                $this->loadNotice();
                break;
            case 'addNewArt':
                $this->addNewArticle(app(\App\Http\Requests\ArticleRequest::class));
                break;
            case 'deleteArt':
                $this->deleteArt($request->input('id'));
                break;
            case 'deleteObj':
                $this->deleteObj($request->input('id'));
                break;
            case 'loadSingleArt':
                $this->loadSingleArt($request->input('id'));
                break;
            case 'updateArticle':
                $this->updateArticle(app(\App\Http\Requests\ArticleRequest::class));
                break;
            case 'apiLoadAllItems':
                $this->apiLoadAllItems();
                break;
            case 'loadSingleObj':
                $this->loadSingleObj($request->input('id'));
                break;
            case 'updateObject':
                $this->updateObject(app(\App\Http\Requests\AObjectRequest::class));
                break;
            case 'newObject':
                $this->newObject(app(\App\Http\Requests\AObjectRequest::class));
                break;
        }
        return null;

    }

    public function updateObject(\App\Http\Requests\AObjectRequest $aObjectRequest): void
    {
        /** Получаем hash */
        $hash = md5((string) time());
        $sliderController = new SliderController;
        $sliderController->addSliderByHash($aObjectRequest->input('slider'), $hash);
        $aObjectController = new AObjectController;
        $aObjectController->updateObj($aObjectRequest, $hash);
    }

    public function newObject(\App\Http\Requests\AObjectRequest $aObjectRequest): void
    {
        /** Получаем hash */
        $hash = md5((string) time());
        $sliderController = new SliderController;
        $sliderController->addSliderByHash($aObjectRequest->input('slider'), $hash);
        $aObjectController = new AObjectController;
        $aObjectController->addNewObject($aObjectRequest, $hash);
    }

    public function loadSingleObj($id): void
    {
        $aobjectController = new AObjectController;
        $sliderController = new SliderController;
        $object = $aobjectController->getObject($id);
        $slider = $sliderController->getSliderByHash($object->slider_hash);
        echo json_encode(['obj' => $object, 'slider' => $slider]);
    }

    public function apiLoadAllItems(): void
    {
        $itemController = new ItemController;
        echo $itemController->loadAllItems();
    }

    public function updateArticle(\App\Http\Requests\ArticleRequest $articleRequest): void
    {
        $articleController = new ArticleController;
        $articleController->updateArticle($articleRequest);
    }

    public function loadSingleArt($id): void
    {
        $articleController = new ArticleController;
        $articleController->loadSingleArt($id);
    }

    public function deleteArt($id): void
    {
        $articleController = new ArticleController;
        $articleController->deleteArt($id);
    }

    public function deleteObj($id): void
    {
        $aObjectController = new AObjectController;
        $aObjectController->deleteObj($id);
    }

    public function addNewArticle(\App\Http\Requests\ArticleRequest $articleRequest): void
    {
        $articleController = new ArticleController;
        $articleController->saveNewArt($articleRequest);
    }

    public function loadNotice(): void
    {
        $noticeController = new NoticeController;
        echo $noticeController->getNotice();
    }

    public function loadAllArticle(): void
    {
        $articleController = new ArticleController;
        $articleController->loadArticlesForApi();
    }

    public function loadAllObjects(): void
    {
        $aObjectController = new AObjectController;
        echo $aObjectController->getAllObjects();
    }

    public function saveNewItem(\App\Http\Requests\ItemRequest $itemRequest): void
    {
        $itemController = new ItemController;
        $itemController->addNewItem($itemRequest);
    }

    public function updateCategory(\App\Http\Requests\ShopCategoryRequest $shopCategoryRequest): void
    {
        $shopCategoryController = new ShopCategoryController;
        $shopCategoryController->updateCat($shopCategoryRequest);
    }

    public function deleteCategory(Request $request): void
    {
        $shopCategoryController = new ShopCategoryController;
        $shopCategoryController->deleteCategory($request->id);

    }

    public function addNewCat(Request $request): void
    {
        $shopCategoryController = new ShopCategoryController;
        $shopCategoryController->addNewCat($request);
    }

    public function loadCat(): void
    {
        $shopCategoryController = new ShopCategoryController;
        $shopCategoryController->getAllCategory();
    }

    public function sendMessage(Request $request): bool
    {
        $name = (string) ($request->name ?: 'Не указано');
        $phone = (string) ($request->phone ?: 'Не указано');
        $mail = (string) ($request->mail ?: 'Не указано');
        MessageController::sendMessage($name, $phone, $mail);

        return true;
    }

    public function sendCart(Request $request): void
    {

        $cartController = new CartController;
        $cartController->sendCart($request);
    }

    public function loadItem(Request $request): void
    {
        $itemController = new ItemController;
        $itemController->getItemById($request->id);
    }

    public function saveItem(Request $request): void
    {

        $itemController = new ItemController;
        $itemController->saveItem($request);
    }

    public function deleteItem(Request $request): void
    {
        $id = $request->id;
        $itemController = new ItemController;
        $itemController->deleteItem($id);
    }

    public function loadSingleCat(Request $request): void
    {
        $shopCategoryController = new ShopCategoryController;
        $shopCategoryController->loadSingleCat($request->id);
    }
}
