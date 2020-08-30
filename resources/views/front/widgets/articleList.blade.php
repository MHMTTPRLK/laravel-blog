@foreach($articles as $article)

    <div class="post-preview">
        <a href="{{route('single',[$article->get_Category->slug,$article->slug])}}">
            <h2 class="post-title">
                {{$article->title}}
            </h2>
            <img  width="450" src="{{$article->image}}"/>
            <h3 class="post-subtitle">
    {!!Str::limit($article->content,50,'..')!!}
            </h3>
        </a>
        <p class="post-meta"> Kategori:
            <a href="#">{{$article->get_Category->name}}</a>
            <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
            <br>
            <span class=" float-right" ><i class="fas fa-book-reader"><b>{{$article->hit}}</b></i></span>
        </p>

    </div>

    @if(!$loop->last)
        <hr>
    @endif
@endforeach
<br>
<div class="float-right">
    {{$articles->links()}}
</div>
