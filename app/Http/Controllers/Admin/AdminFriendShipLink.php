<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FriendshipLinks;
use App\Models\Categorys;

use App\Http\Requests\Admin\FriendShipLinks\FriendShipLinksStoreRequest;

define("PERPAGENUMBER",10);

class AdminFriendShipLink extends Controller
{
    public function indexByCategory($category_id){
        $friendshipLink = FriendshipLinks::leftjoin('categorys','friendship_links.category_id','categorys.category_id')
                        ->select('friendship_links.*',
                        'categorys.category_name as category_name')
                        ->where('friendship_links.category_id',$category_id)
                        ->paginate(PERPAGENUMBER);
        if($friendshipLink) return response()->success(200,'成功',$friendshipLink);
        return response()->fail(100,'失败',null);
    }
    public function store(FriendShipLinksStoreRequest $request){
        if(Categorys::find($request->category_id)->category_index != 0) return response()->success(100,'不能添加为小路线！',null);
        $friendshipLink = new FriendshipLinks;
        $friendshipLink->friendship_link_title = $request->friendship_link_title;
        $friendshipLink->friendship_link_click_url = $request->friendship_link_click_url;
        $friendshipLink->category_id = $request->category_id;
        if($friendshipLink->save()) return response()->success(200,'添加成功',$friendshipLink);
        return response()->fail(100,'添加失败',null);
    }
    public function update(FriendShipLinksStoreRequest $request, $id){
        if(Categorys::find($request->category_id)->category_index != 0) return response()->success(100,'不能修改为小路线！',null);
        $friendshipLink = FriendshipLinks::find($id);
        if(!$friendshipLink) return response()->fail(100,'未找到该id',null);
        $friendshipLink->friendship_link_title = $request->friendship_link_title;
        $friendshipLink->friendship_link_click_url = $request->friendship_link_click_url;
        $friendshipLink->category_id = $request->category_id;
        if($friendshipLink->save()) return response()->success(200,'修改成功',$friendshipLink);
        return response()->fail(100,'修改失败',null);
    }
    public function destroy($id){
        if(FriendshipLinks::destroy($id)) return response()->success(200,'删除成功',null);
        return response()->fail(100,'删除失败,未找到指定友情链接！',null);
    }
}
