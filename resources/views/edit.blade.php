<form action="{{ url('/edit/'.$post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH')}}
    
    @include('form')
    
</form>


