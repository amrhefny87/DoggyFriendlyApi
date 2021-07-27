Create posts
<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
@csrf

@include('form')
    
    

</form>
