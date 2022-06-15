<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<x-app-layout>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <a class="btn btn-info mb-2" href="/update">modifier le profil</a>
            
            </br>
       <b> ici  tu a la liste des annonces </b>
</br>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
<div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('posts.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search">Rechercher</span> 
                            </button>
                        </span>
                        <input type="text" class="form-control mr-9" name="term" placeholder="Search projects" id="term">
                        <a href="{{ route('posts.index') }}" class=" mt-10"> 
                            <span class="input-group-btn">
                                <button class="btn btn-danger mr-9" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt">refresh</span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
</br>
</br>
</br>
        <div class="col-lg-12 margin-tb">
       
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Article</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
           <th>Proriety</th>
            <th>Image</th>
            <th>Title</th>
            <th>price €</th>
            <th>Description</th>
            <th>create</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
        <td>{{ $post->name }}</td>
            <td><img src="{{ ($post->image) }}" height="75" width="75" alt="{{ ($post->image) }}" /></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->price }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $posts->links() !!}
</body>