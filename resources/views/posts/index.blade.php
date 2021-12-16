<x-layout>
    <x-slot name="title">
    登録画面
    </x-slot>
    <div class="heading">
    <h1>登録画面</h1>
    <p class="msg">{{$msg}}</p>
    </div>
    <h3>新規登録</h3>
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        @error('name')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>name:<input type="text" name="name" value="{{old('name')}}"></input></p><br/>
        @error('mail')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>mail:<input type="text" name="mail" value="{{old('mail')}}"></input></p><br/>
        @error('age')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>age:<input type="text" name="age" value="{{old('age')}}"></input></p><br/>
        @error('gender')
            <span><td>※{{$message}}</td></span>
        @enderror
        <p>gender:<input type="radio" name="gender"  value=0  @if(old('gender') == 0) checked @endif>男性</input>
            　 <input type="radio" name="gender"  value=1 @if(old('gender') == 1) checked @endif>女性</input></p><br/>
        <input type="submit"></input><br/>
    </form>
    <a  class="re-list" href="{{route('posts.index')}}">一覧に戻る</a>
</x-layout>
