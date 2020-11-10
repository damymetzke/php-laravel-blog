@extends('layout')

@section('content')
    <h1>PHP Laravel Blog</h1>
    <div id="root-layout">
        <div id="summary">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id placeat laudantium itaque saepe, dolorem nisi unde consequatur accusantium ratione amet, delectus officia odio aspernatur recusandae eum! Ex adipisci fugiat dolor blanditiis inventore rem nam nisi accusantium quos earum. Et similique nihil assumenda neque? Maxime repellendus possimus sapiente amet, architecto omnis vero illo quasi quod minus ad dicta facilis. Quo, natus!</p>
            <p>Totam rerum voluptate, suscipit autem, et id provident sunt minima nisi sequi sit, corporis non. Est enim, vel expedita nesciunt quam cum voluptatibus eaque voluptatem ipsam quis incidunt ratione unde explicabo reprehenderit! Voluptates deserunt voluptatem necessitatibus dolorum ducimus repellat distinctio quo velit illo, neque aliquid ea praesentium beatae dolore accusantium error hic consequuntur quaerat, similique excepturi porro molestiae ipsum? Accusamus.</p>
            <p>Obcaecati natus deleniti delectus molestiae tempore eveniet fugit quis, ipsam iusto a, commodi dolore ea repellendus dolores ab magnam necessitatibus beatae aspernatur minus neque numquam labore ipsa consequuntur velit. Architecto earum rem aliquam blanditiis nemo assumenda delectus, optio natus possimus? Reprehenderit, omnis ex et hic aspernatur maxime dolores magni accusantium iusto pariatur vitae neque ipsa harum! Iste officia aperiam mollitia.</p>
            <p>Ipsam aspernatur repellendus nostrum, commodi quasi non adipisci, veritatis nihil natus dicta soluta corporis. Deleniti officiis, laudantium commodi quisquam dolorem ducimus quibusdam perferendis quae! Quia maxime eos enim error eius ab quo non ipsam eligendi, cum, nesciunt minus itaque, ut voluptate culpa consequatur id beatae sit alias repellat. Maiores quas nesciunt quod. Id incidunt molestiae ab expedita, rerum modi optio.</p>
            <p>Non assumenda ea est sint molestiae ducimus deleniti ut quis commodi. Dolor, perspiciatis blanditiis! Odio deserunt consequuntur possimus similique dolor reprehenderit cum debitis. Possimus in nemo sint aliquid quibusdam et quos reiciendis fuga culpa rem veniam aut illum omnis itaque quo sequi repudiandae sapiente voluptatem, placeat labore unde autem. Qui perspiciatis quibusdam consequatur voluptates. Amet officiis magnam molestias. Ut, magni.</p>
        </div>
    
        <div id="posts">
            <h2>Latest Posts</h2>
            <ol>
                @foreach (($posts) as $post)
                    <li>
                        <a href="/post/{{$post->slug}}">
                            <h3>{{$post->title}}</h3>
                            <p>{{substr($post->body, 0, 100)}}...</p>
                            <p>Click to read more</p>
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection

@section('resources')
    <link rel="stylesheet" href="res/css/index.css">
@endsection