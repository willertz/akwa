<?php

namespace App\Http\Controllers;

use App\ShopCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request) {
        if (!empty($request->apiMethod)) {
            $method = $request->apiMethod;
        } else {
            $method = null;
        }
        switch ($method) {
            case 'sendMail':
                $this->sendMessage($request);
                return redirect('/');
                break;
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
                $this->saveNewItem($request);
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
                $this->addNewArticle($request);
                break;
            case 'deleteArt':
                $this->deleteArt($request->id);
                break;
            case 'deleteObj':
                $this->deleteObj($request->id);
                break;
            case 'loadSingleArt':
                $this->loadSingleArt($request->id);
                break;
            case 'updateArticle':
                $this->updateArticle($request);
                break;
            case 'apiLoadAllItems':
                $this->apiLoadAllItems();
                break;
            case 'loadSingleObj':
                $this->loadSingleObj($request->id);
                break;
            case 'updateObject':
                $this->updateObject($request);
                break;
            case 'newObject':
                $this->newObject($request);
                break;
        }

    }

    public function updateObject($request) {
        /** Получаем hash */
        $hash = md5(time());
        $slider = new SliderController();
        $slider->addSliderByHash($request->slider,$hash);
        $objectC = new AObjectController();
        $objectC->updateObj($request,$hash);
    }

    public function newObject($request) {
        /** Получаем hash */
        $hash = md5(time());
        $slider = new SliderController();
        $slider->addSliderByHash($request->slider,$hash);
        $objectC = new AObjectController();
        $objectC->addNewObject($request,$hash);
    }

    public function loadSingleObj($id) {
        $aobjectController = new AObjectController();
        $sliderController = new SliderController();
        $object = $aobjectController->getObject($id);
        $slider = $sliderController->getSliderByHash($object->slider_hash);
        echo json_encode(['obj' => $object,'slider'=>$slider]);
    }
    public function apiLoadAllItems() {
        $items = new ItemController();
        echo $items->loadAllItems();
    }

    public function updateArticle($request) {
        $article = new ArticleController();
        $article->updateArticle($request);
    }
    public function loadSingleArt($id) {
        $articleController = new ArticleController();
        $articleController->loadSingleArt($id);
    }
    public function deleteArt($id) {
        $article = new ArticleController();
        $article->deleteArt($id);
    }
    public function deleteObj($id) {
        $article = new AObjectController();
        $article->deleteObj($id);
    }
    public function addNewArticle($request) {
        $articleController = new ArticleController();
        $articleController->saveNewArt($request);
    }
    public function loadNotice() {
        $notice = new NoticeController();
        echo $notice->getNotice();
    }
    public function loadAllArticle() {
        $articleController = new ArticleController();
        $articleController->loadArticlesForApi();
    }
    public function loadAllObjects() {
        $articleController = new AObjectController();
        echo $articleController->getAllObjects();
    }

    public function saveNewItem($request) {
        $itemController = new ItemController();
        $itemController->addNewItem($request);
    }

    public function updateCategory($request) {
        $categoryController = new ShopCategoryController();
        $categoryController->updateCat($request);
    }

    public function deleteCategory(Request $request) {
        $categoryController = new ShopCategoryController();
        $categoryController->deleteCategory($request->id);

    }

    public function addNewCat(Request $request) {
        $categoryController = new ShopCategoryController();
        $categoryController->addNewCat($request);
    }

    public function loadCat() {
        $categoryController = new ShopCategoryController();
        $categoryController->getAllCategory();
    }

    public function sendMessage(Request $request) {
        $name = $request->name ? : 'Не указано';
        $phone = $request->phone ? : 'Не указано';
        $mail = $request->mail ? : 'Не указано';
        MessageController::sendMessage($name,$phone,$mail);
        return true;
    }

    public function sendCart(Request $request) {

        $cartController = new CartController();
        $cartController->sendCart($request);
    }

    public function loadItem(Request $request) {
        $itemController = new ItemController();
        $itemController->getItemById($request->id);
    }

    public function saveItem(Request $request) {

        $itemController = new ItemController();
        $itemController->saveItem($request);
    }

    public function deleteItem(Request $request) {
        $id = $request->id;
        $itemController = new ItemController();
        $itemController->deleteItem($id);
    }

    public function loadSingleCat(Request $request) {
        $categoryController = new ShopCategoryController();
        $categoryController->loadSingleCat($request->id);
    }
}
