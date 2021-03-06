<x-layout>
    <x-slot name="title">
    編集画面
    </x-slot>
    <div class="heading">
    <h1>編集画面</h1>
    <p class="msg">{{$msg}}</p>
    </div>
    <form action="{{route('posts.update',['id' => $users -> id])}}" method="post">

        @csrf
        @error('name')
            <span><td>※{{$message}}</td></span>
        @enderror

        <p>name:<input type="text" name="name" value="{{$users -> name}}"></input></p><br/>
        @error('mail')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>mail:<input type="text" name="mail" value="{{$users -> mail}}"></input></p><br/>
        @error('age')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>age:<input type="text" name="age" value="{{$users -> age}}"></input></p><br/>
        @error('gender')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>gender:<input type="radio" name="gender"  value=0 @if($users -> gender === 0)checked @endif>男性</input>
            　 <input type="radio" name="gender"  value=1 @if($users -> gender === 1)checked @endif>女性</input></p><br/>
        <input type="submit"></input><br/>
    </form>

    <a  class="re-list" href="{{route('posts.index')}}">一覧に戻る</a>
</x-layout>


