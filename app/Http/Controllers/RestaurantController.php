<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form;
use App\Models\Category;
use App\Models\Category_tag;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;

class RestaurantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $restaurants = Restaurant::paginate(7);
        $count = DB::table('restaurants')->count();
        $categories = Category::get();
        $categoryTags = Category_tag::get();
        $list = 'list';
        $search = '';
        $msg = '';

        return view('gourmetLog.shopIndex', [
            'user' => $user,
            'restaurants' => $restaurants,
            'categories' => $categories,
            'categoryTags' => $categoryTags,
            'count' => $count,
            'list' => $list,
            'search' => $search,
            'msg' => $msg,
            
        ]);
    }

    public function show(Request $request, string $id)
    {
        $user = Auth::user();
        $restaurant = Restaurant::find($id);
        $cate_name = $request->cate_name;
        $length = strlen($restaurant->map_url);
        $map = substr($restaurant->map_url, 0, $length - 1);

        return view('gourmetLog.shopShow', ['user' => $user, 'restaurant' => $restaurant, 'cate_name' => $cate_name, 'map' => $map]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $categories = Category::get();
        $count = DB::table('categories')->count();
        if ($count > 0) {
            session()->forget('form_data');
            return view('gourmetLog.shopCreate', ['user' => $user, 'categories' => $categories]);
        } else {
            $msg = 'カテゴリーがありません。最初にお店の「カテゴリーを作成してください';
            return view('gourmetLog.categoryIndex', ['user' => $user, 'msg' => $msg]);
        }
    }

    public function createResult(Form $request)
    {
        // 画像ファイル以外のフォームデータを取得
        $data = $request->except('food_picture');

        if ($request->file('food_picture')) { // 画像データがあれば
            $data['food_picture'] = '/storage/img/tentative/tentative.jpg';

            //前の仮画像があれば一旦削除
            if (Storage::disk('public')) {
                Storage::disk('public')->delete('img/tentative/tentative.jpg');
            }

            // ディレクトリ名
            $dir = 'img/tentative';

            // ファイル名変更
            $file_name = 'tentative.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $request->file('food_picture')->storeAs('public/' . $dir, $file_name);
        } elseif (session()->has('form_data')) {

            $formData = session('form_data');
            $data['food_picture'] = null;

            if (isset($formData['food_picture'])) {
                $data['food_picture'] = $formData['food_picture'];
            }
        }

        if (isset($request->map_url)) {

            $length = strlen($request->map_url);
            $map_url = substr($request->map_url, 13, $length - 23);
            $data['map_url'] = $map_url;
        } elseif (session()->has('form_data')) {

            $formData = session('form_data');
            $data['map_url'] = $formData['map_url'];
        }

        // セッション保存と取得
        session()->put('form_data', $data);
        $formData = session('form_data');
        $user = Auth::user();
        return view('gourmetLog.shopCreateResult', ['user' => $user, 'formData' => $formData]);
    }

    public function store(Request $request)
    {

        if ($request->submit == 0) { // 新規を修正

            // セッション取得
            $formData = session('form_data');
            $categories = Category::get();
            $user = Auth::user();
            return view('gourmetLog.shopCreate', [
                'formData' => $formData,
                'user' => $user,
                'categories' => $categories,
            ]);
        }

        if ($request->submit == 1) { //新規登録
            // セッション取得
            $formData = session('form_data');

            $restaurant = new Restaurant();
            $restaurant->user_id = Auth::id();
            $restaurant->name = $formData['name'];
            $restaurant->name_katakana = $formData['name_katakana'];
            $restaurant->review = $formData['review'];
            $restaurant->map_url = $formData['map_url'];
            $restaurant->tel = $formData['tel'];
            $restaurant->comment = $formData['comment'];
            $restaurant->save();

            if (isset($formData['food_picture'])) {
                // 画像の保存
                // 今、作成したお店データを取得
                $restaurant = Restaurant::orderBy('id', 'desc')->first();

                $newFile = 'rest' . $restaurant->id . '.jpg';
                Storage::copy('public/img/tentative/tentative.jpg', 'public/img/tentative/' . $newFile);
                $restaurant->food_picture = '/storage' . '/img/tentative/' . $newFile;
                $restaurant->save();
            }

            //カテゴリータグの作成
            $categoryTag = new Category_tag();
            $restaurant = Restaurant::orderBy('id', 'desc')->first();
            $categoryTag->restaurant_id  = $restaurant->id;
            $category = Category::where('name', $formData['category_name'])->first();
            $categoryTag->category_id = $category->id;
            $categoryTag->save();

            // セッションデータを消す
            session()->forget('form_data');

            return redirect()->route('shop');
        }
    }

    public function delete(Request $request, string $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->route('shop');
    }

    public function edit(Request $request, string $id)
    {
        // 前回のセッションデータを消す
        session()->forget('form_data');

        $user = Auth::user();
        $restaurant = Restaurant::find($id);
        $categories = Category::get();

        $cate_id = $restaurant->category_tags->category_id;
        $category_name = Category::find($cate_id)->name;

        $restaurant['category_name'] = $category_name;
        // ここでセッション作る
        session()->put('form_data', $restaurant);
        $formData = session('form_data');
        return view('gourmetLog.shopEdit', [
            'user' => $user,
            'formData' => $formData,
            'categories' => $categories,
        ]);
    }

    public function editResult(Form $request, string $id)
    {
        // 画像ファイル以外のフォームデータを取得
        $data = $request->except('food_picture');
        $data['id'] = $id;
        $formData = session('form_data');

        if ($request->file('food_picture')) { // 新しい画像データがあれば
            $data['food_picture'] = '/storage/img/tentative/tentative.jpg';

            //前の仮画像があれば一旦削除
            if (Storage::disk('public')) {
                Storage::disk('public')->delete('img/tentative/tentative.jpg');
            }

            // ディレクトリ名
            $dir = 'img/tentative';

            // ファイル名変更
            $file_name = 'tentative.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $request->file('food_picture')->storeAs('public/' . $dir, $file_name);
        } elseif (session()->has('form_data')) { // セッションに値があるとき

            $formData = session('form_data');  // セッションの値を呼び出し
            $data['food_picture'] = null;  // 画像の値は一旦null

            if (isset($formData['food_picture'])) { // セッションの値に画像があれば
                $data['food_picture'] = $formData['food_picture']; // 画像の値はセッションの値に上書き。なければnullのまま。
            }
        }

        if (isset($request->map_url)) {

            $length = strlen($request->map_url);
            $map_url = substr($request->map_url, 13, $length - 23);
            $data['map_url'] = $map_url;
        } elseif (session()->has('form_data')) {

            $formData = session('form_data');
            $data['map_url'] = $formData['map_url'];
        }

        // セッション保存と取得
        session()->put('form_data', $data);
        $formData = session('form_data');
        $user = Auth::user();
        return view('gourmetLog.shopEditResult', ['user' => $user, 'formData' => $formData]);
    }

    public function editStore(Request $request, string $id)
    {


        if ($request->submit == 0) { // 編集を修正
            // セッション取得
            $formData = session('form_data');
            $categories = Category::get();
            $user = Auth::user();
            // dd($formData['id']);
            return view('gourmetLog.shopEdit', [
                'formData' => $formData,
                'user' => $user,
                'categories' => $categories,
            ]);
        }
        if ($request->submit == 1) { //編集登録update
            // セッション取得
            $formData = session('form_data');
            $restaurant = Restaurant::find($id);
            $restaurant->user_id = Auth::id();
            $restaurant->name = $formData['name'];
            $restaurant->name_katakana = $formData['name_katakana'];
            $restaurant->review = $formData['review'];
            $restaurant->food_picture = $formData['food_picture'];
            $restaurant->map_url = $formData['map_url'];
            $restaurant->tel = $formData['tel'];
            $restaurant->comment = $formData['comment'];
            $restaurant->save();

            //カテゴリータグの作成
            $categoryTag = $restaurant->category_tags;
            $category = Category::where('name', $formData['category_name'])->first();
            $categoryTag->category_id = $category->id;
            $categoryTag->save();

            // セッションデータを消す
            session()->forget('form_data');

            return redirect()->route('shop');
        }
    }

    public function search(Request $request)
    {

        // 店名の一覧を取得
        if (isset($request->key)) {
            $search = Restaurant::where('name', 'like', '%' . $request->key . '%')->orwhere('comment', 'like', '%' . $request->key . '%')
                ->distinct()->get();
            $msg = '';
            $list = 'search';
        } else {
            $search = '';
            $msg = '検索結果：店舗名は存在しません';
            $list = 'no';
        }

        $user = Auth::user();
        $restaurants = Restaurant::get();
        $count = DB::table('restaurants')->count();
        $categories = Category::get();
        $categoryTags = Category_tag::get();
        return view('gourmetLog.shopIndex', [
            'user' => $user,
            'restaurants' => $restaurants,
            'categories' => $categories,
            'categoryTags' => $categoryTags,
            'count' => $count,
            'list' => $list,
            'search' => $search,
            'msg' => $msg,
        ]);
    }
}
