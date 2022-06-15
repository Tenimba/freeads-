<form action="/search" method="POST" role="search"> 
    {{ csrf_field() }} 
    <div class="input-group"> 
        <input type="text" class="form-control" name="q" 
            placeholder="Rechercher des utilisateurs"> <span class="input-group-btn"> 
            <button type="submit" class="btn btn-danger"> 
                <span class="glyphicon glyphicon-search pull-right mb-2">Rechercher</span> 
            </button> 
          

        </span> 
    </div> 
</form>