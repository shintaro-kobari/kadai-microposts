@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded-circle" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="mr-0 media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', __('messages.view_prof'), ['user' => $user->id]) !!}</p>
                    </div>
                    <div style="display:flex">
                        @if (Auth::id() != $user->id)
                        @if (Auth::user()->is_following($user->id))
                            {{-- アンフォローボタンのフォーム --}}
                            {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                {!! Form::submit(__('messages.unfollow'), ['class' => "btn btn-danger btn-sm"]) !!}
                            {!! Form::close() !!}
                        @else
                            {{-- フォローボタンのフォーム --}}
                            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                {!! Form::submit(__('messages.follow'), ['class' => "btn btn-primary btn-sm"]) !!}
                            {!! Form::close() !!}
                        @endif
                    @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif