<div class="flex mt-2 items-center">

  <form action="/tweets/{{$tweet->id}}/like" method="post">
    @csrf
    <div class="flex items-center mr-2">
      <button type="submit" class="text-xs text-gray-500 flex items-center">
        <img
        width="30"
        height="30"
        src="https://www.svgrepo.com/show/13661/like.svg"
        alt="Like free icon"
        title="Like free icon"
        class="loaded {{$tweet->isLikedBy(auth()->user()) ? 'bg-green-300' : 'bg-gray-300'}} p-1 rounded">
        {{$tweet->likes ?: 0 }}
      </button>
    </div>
  </form>

  <form action="/tweets/{{$tweet->id}}/like" method="post">
    @csrf
    @method('DELETE')
    <div class="flex items-center mr-2">
      <button type="submit" class="text-xs text-gray-500 flex items-center">
        <img
        width="30"
        height="30"
        src="https://www.svgrepo.com/show/157010/dislike.svg"
        alt="Dislike free icon"
        title="Dislike free icon"
        class="loaded {{$tweet->isDislikedBy(auth()->user()) ? 'bg-red-300' : 'bg-gray-300'}} p-1 rounded">
        {{$tweet->dislikes?: 0 }}
      </button>
    </div>
  </form>
  <div>

  </div>
</div>
