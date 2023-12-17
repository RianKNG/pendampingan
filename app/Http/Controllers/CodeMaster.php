<?php



class DilController extends Controller
{
    public function index(Request $request)
    {
        $coba = DB::table('tbl_dil')
            ->select(DB::raw('SUBSTRING(id, 1, 2) as Cabang'))
            ->where('status', '=', 1)
            ->get();
   }
   ///contoh else if blade
   @if (count($posts) == 1)
    You have a post!
@elseif(count($posts)>1)
    You have more than one posts!
@else
    You don't have a post!
@endif;


@if (count($posts))
    You have a post!
@else
    You don't have a post!
@endif
}
