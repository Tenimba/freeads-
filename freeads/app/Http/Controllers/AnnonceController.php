<?php
  
namespace App\Http\Controllers;
   
use App\Models\Annonce;
use Illuminate\Http\Request;
  
class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts=Annonce::Where([
            ['name', "!=",NULL],
            [function($query) use ($request){
                if(($term = $request->term )){
                    $query->where('name','like','%'.$term.'%')->get();
                }
                }]
        ])->orderby('name','asc')
        ->paginate(5);
    
return view('annonces.index',compact('posts'))
-> with('i', (request()->input('page', 1) - 1) * 5);

    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required',
            'description' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $post = new Annonce;
        $post->name = $request->name;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->image = $path;
        $post->save();
     
        return redirect()->route('posts.index')
                        ->with('success','Annonce has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $post)
    {
        return view('annonces.show',compact('post'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $post)
    {
        return view('annonces.edit',compact('post'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\annonce  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        
        $post = Annonce::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->price = $request->price;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('posts.index')
        ->with('succes','Annonce updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index')
                ->with('succes','Annonce updated successfully');
    }

    
}