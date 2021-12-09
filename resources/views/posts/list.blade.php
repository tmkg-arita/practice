<x-layout>
    <x-slot name="title">
    一覧画面
    </x-slot>
    <div class="heading">
    <h1>一覧画面</h1>
    <a href="{{route('posts.create')}}"><button>新規登録</button></a>
    </div>

<table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>mail</th>
            <th>age</th>
            <th>gender</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <!-- <tr>ここにデータベースから抽出したデータをforelseで流す</tr> -->
        @foreach ($users as $user)

        <tr>
                    <td>{{$user -> id}}</td>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> mail}}</td>
                    <td>{{$user -> age}}</td>
                    @if ($user -> gender === 0)
                    <td>男性</td>
                    @else
                    <td>女性</td>
                    @endif
                    <td><a href="{{route('posts.edit',$user->id)}}">編集</a></td>
                    <td class="delete"><a href="">削除</a></td>
                    </form>
        </tr>
        @endforeach


    </table>

</x-layout>
