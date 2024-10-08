@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Post  --}}
    <div class="post">

        <div class="row mt-3">

            <div class="card w-100">
                <div class="row no-gutters" style="height: 598px;">

                    <!-- Card Image -->
                    <div class="col-md-8 h-100">
                        <img src="{{ asset("storage/$post->image") }}" class="w-100 h-100">
                    </div>

                    <div class="col-md-4 h-100">
                        <div class="d-flex flex-column h-100">

                            <!-- Card Header -->
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <a href="/profile/{{$post->user->username}}" style="width: 32px; height: 32px;">
                                        <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                                    </a>
                                    <a href="/profile/{{$post->user->username}}" class="my-0 ml-3 text-dark text-decoration-none">
                                        <strong> {{ $post->user->name }}</strong>
                                    </a>
                                    <p class="my-0 ml-1 text-dark"> <strong> - Following </strong></p>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body px-2" style="overflow-y: auto; overflow-x: hidden;">

                                <!-- Post Caption  -->
                                <div class="row">
                                    <div class="col-2">
                                        <a href="/profile/{{$post->user->username}}">
                                            <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/{{$post->user->username}}" class="my-0 text-dark text-decoration-none">
                                                <strong> {{ $post->user->name }}</strong>
                                            </a>
                                            {{ $post->caption }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Comments --}}
                                @foreach ($post->comments as $comment)
                                    <div class="row my-3">
                                        <div class="col-2">
                                            <a href="/profile/{{$comment->user->username}}">
                                                <img src="{{ asset($comment->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                                            </a>
                                        </div>
                                        <div class="col-10 pl-0">
                                            <p class="m-0 text-dark">
                                                <a href="/profile/{{$comment->user->username}}" class="my-0 text-dark text-decoration-none">
                                                    <strong> {{ $comment->user->name }}</strong>
                                                </a>
                                                {{ $comment->body }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer align-self-end w-100 p-0 border-top-0">
                                <!-- Post State -->
                                <div class="py-2 px-3 border">
                                    <div class="d-flex flex-row">
                                        {{-- Like Btn --}}
                                        <button type="submit" class="btn pl-0">
                                            <i class="far fa-heart fa-2x"></i>
                                        </button>

                                        {{-- Comment Btn --}}
                                        <button name="msg" value="0" type="button" class="btn pl-0">
                                            <i class="far fa-comment fa-2x"></i>
                                        </button>



                                        <!-- Modal -->
                                        <div class="modal fade" id="sharebtn{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                            </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Post Likes --}}
                                    @if ($post->likes > 0)
                                        <p class="m-0"><strong>{{ $post->likes }} likes</strong></p>
                                    @endif

                                    {{-- Post Date --}}
                                    <p class="m-0"><small class="text-muted">{{ strtoupper($post->created_at->diffForHumans()) }}</small></p>
                                </div>

                                <!-- Add Comment -->
                                <form action="{{ action('CommentController@store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-0 text-muted">
                                        <div class="input-group is-invalid">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="redirect" value="show">
                                            <textarea class="form-control py-2 px-3" id="body" name='body' rows="1" placeholder="Tambah Coment..."></textarea>
                                            <div class="input-group-append">
                                                <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- More Posts --}}
    @if ($posts->count() > 0)

        <hr class="my-5">

        <div class="more">
                <h6 class="text-muted">Postingan lainnya dari
                    <a href="/profile/{{$post->user->username}}" class="text-dark text-decoration-none">
                        <strong> {{ $post->user->name }}</strong>
                    </a>
                </h6>

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-4 col-md-4 mb-2  align-self-stretch">
                            <a href="/p/{{ $post->id }}">
                                <img class="img rounded" height="300" src="{{ asset("storage/$post->image") }}">
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
    @endif

</div>
@endsection

@section('exscript')
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>
@endsection
