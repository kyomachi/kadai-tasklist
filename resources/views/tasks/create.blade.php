@extends('layouts.app')

@section('content')

<h1>メッセージ新規作成ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status', ['' => '選択してください','完了' => '完了', '進行中' => '進行中', '未完了' => '未完了']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection