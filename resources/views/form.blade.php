    <label for="title">Title</label>
    <input type="text" name="title" id="title" value = "{{isset($post->title)?$post->title:''}}">
    <br>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value = "{{isset($post->description)?$post->description:''}}">
    <br>

    <label for="date">Date</label>
    <input type="datetime" name="date" id="date" value = "{{isset($post->date)?$post->date:''}}">
    <br>

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value = "{{isset($post->name)?$post->name:''}}">
    <br>

    <label for="comments">Comments</label>
    <input type="text" name="comments" id="comments" value = "{{isset($post->comments)?$post->comments:''}}">
    <br>

    <label for="image">Image</label>
    @if(isset($post->image))
    <img src="{{ asset('storage').'/'.$post->image }}" width="100" alt="">
    @endif
    <input type="file" name="image" id="image" value = "">
    <br>

    <input type="submit" name="Create">