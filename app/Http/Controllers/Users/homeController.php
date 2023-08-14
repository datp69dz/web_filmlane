<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::take(8)->get();

        $perPage = 8; // Số lượng mục trên mỗi trang
        $currentPage = $request->get('page', 1); // Trang hiện tại, mặc định là trang 1

        $movie = Movie::skip(($currentPage - 1) * $perPage)
            ->take($perPage)
            ->get();

        $totalMovies = Movie::count();

        $lastPage = ceil($totalMovies / $perPage);

        return view('users.page.home', compact('categories', 'movie', 'currentPage', 'lastPage'));
    }
    public function show($id){
        // gọi tất cả thông tin theo id
        $movies = Movie::findOrFail($id);
        // Hiển thị chi tiết phim
        return view('users.page/moviesdetail', compact('movies'));
    }
    
}
